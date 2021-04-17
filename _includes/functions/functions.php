<?php

    //<------------------------------------------------------------------------------------------------------------------------------>///

    class db_connection {

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- Connect to database --->///

        function __construct() {

            $conn = mysqli_connect(db_server, db_username, db_password, db_database);
            $this->connection = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: ".mysqli_connect_error();
            }
            
            return $this->connection;

        }

        //<--- End Connect to database --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- Registration and Data Validation --->///

        public function registration($username, $email, $password, $passconf) {

            global $table_user;
            
            // Error Check //
            if ($password != $passconf) {
                // Alert message //
                alrtMsg("registration", "error", "Error!", "Your passwords do not match!");
            }
            else {

                // User Duplicate Check //
                $userQuery = mysqli_query($this->connection, "SELECT username FROM $table_user WHERE username = '$username'");
                $userCount = $userQuery->num_rows;

                // Email Duplicate Check //
                $emailQuery = mysqli_query($this->connection, "SELECT email FROM $table_user WHERE email = '$email'");
                $emailCount = $emailQuery->num_rows;

                // Check if email already exist ---> emailCount > 0 //
                if ($emailCount > 0) {
                    // Alert message //
                    alrtMsg("registration", "error", "Error!", "E-mail already exists!");
                }
                // Check if username already exist ---> userCount > 0 //
                else if ($userCount > 0) {
                    // Alert message //
                    alrtMsg("registration", "error", "Error!", "Username already exists!");
                }
                else {
                    
                    // Create an Account //

                    // Encrypt the password //
                    $password_encrypt = password_hash($password, PASSWORD_DEFAULT);

                    // Generate unique token //
                    $token = bin2hex(random_bytes(50));

                    // Authorization //
                    $verified = false;
                    $auth     = false;
            
                    // Registration user account into the database //
                    $createAccount = mysqli_query($this->connection,
                    "INSERT INTO $table_user(username, email, password, token, verified, auth)
                    VALUES('$username', '$email', '$password_encrypt', '$token', '$verified', '$auth')");

                    if ($createAccount) {

                        // Sending verification e-mail //
                        //sendVerificationEmail($email, $token);

                        // Alert message then redirect to my_account //
                        alrtMsg("my_account", "info", "Your Account Created!", "Please check your email for confirm your account.");

                    }
                    else {

                        // Alert message then redirect to my_account //
                        alrtMsg("my_account", "error", "Account Created Error!", "");

                    }



                    // End Create an Account //
                }
            }
            // End Error Check //
        }

        //<--- End Registration and Data Validation --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- User Verified by token --->///

        public function verifyuser($token) {

            global $table_user;

            // Unique Token Validation //
            $tokenQuery = mysqli_query($this->connection, "SELECT token FROM $table_user WHERE token = '$token'");

            // Unique Token Valid ---> tokenQuery = 1 //
            if (mysqli_num_rows($tokenQuery) == 1) {

                // Set user verified to true ---> verified = 1 //
                mysqli_query($this->connection, "UPDATE $table_user SET verified = 1 WHERE token = '$token'");

                // Alert message //
                alrtMsg("login", "success", "Successfully!", "Your account verified!");

            }

            // Unique Token Invalid ---> tokenQuery == 0 (!= 1) //
            else {

                // Alert message //
                alrtMsg("registration", "error", "Error", "E-mail verify error!");

            }
        }

        //<--- End User Verified by token --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- Login --->///

        public function login($username, $password, $auth, $remember) {

            global $table_user;

            // User Validation //
            $userQuery = mysqli_query($this->connection, "SELECT id, username, password, verified, auth FROM $table_user WHERE username = '$username' OR email = '$username'");
            $userCount = $userQuery->num_rows;
            $userFetch = $userQuery->fetch_assoc();

            // User Exist ---> userCount = 1 //
            if ($userCount == 1) {

                // Password Validation //
                // Password Valid ---> password_verify == true //
                if (password_verify($password, $userFetch['password'])) {

                    // User Vaerify Validation //
                    // User Vaerify Valid ---> verified == 1 //
                    // Then logged in //
                    if ($userFetch['verified'] == 1) {

                        // Login from user page ---> auth == "user" //
                        if ($auth == "user") {
                            // Get userId //
                            $_SESSION['userId']   = $userFetch['id'];

                            // Get username //
                            $_SESSION['username'] = $userFetch['username'];

                            // Welcome message //
                            $_SESSION['welcome']  = "Welcome ".$_SESSION['username'];

                            // Remember me //
                            if ($remember == 1) {
                                setcookie('remember_user', $username, time()+(30*24*60*60)); // (day x hour x min x second)
                                setcookie('remember_pass', $password, time()+(30*24*60*60)); // (day x hour x min x second)
                            }
                            else {
                                setcookie('remember_user', '', time()-1);
                                setcookie('remember_pass', '', time()-1);
                            }

                            // Redirect to my account //
                            header("location: my_account");
                        }

                        // Login from admin page ---> auth == "admin" //
                        else if ($auth == "admin") {

                            // Check Authorization //
                            // Authorized ---> auth == 1 //
                            if ($userFetch['auth'] == 1) {
                                // Get userId //
                                $_SESSION['userId']   = $userFetch['id'];

                                // Get username //
                                $_SESSION['username'] = $userFetch['username'];

                                // Welcome message //
                                $_SESSION['welcome']  = "Welcome ".$_SESSION['username'];

                                if ($remember == 1) {
                                    setcookie('remember_userAdmin', $username, time()+(30*24*60*60)); // (day x hour x min x second)
                                    setcookie('remember_passAdmin', $password, time()+(30*24*60*60)); // (day x hour x min x second)
                                }
                                else {
                                    setcookie('remember_userAdmin', '', time()-1);
                                    setcookie('remember_passAdmin', '', time()-1);
                                }

                                // Redirect to my account //
                                header("location: index");
                            }
                            // No Authorized ---> auth == 0 (!=1) //
                            else if ($userFetch['auth'] != 1) {
                                // Alert message //
                                alrtMsg("login", "error", "Error", "Your account don't authorized!");
                            }

                        }
                        else {
                            // Alert message //
                            alrtMsg("my_account", "error", "Error", "Your account typr error.");       
                        }
                    }

                    // User Vaerify invalid ---> verified == 0 (!= 1) //
                    else {
                        // Alert message //
                        alrtMsg("my_account", "error", "Your account not verify!", "Please check your email for verify your account.");
                    }
                    
                }

                // Password Invalid ---> password_verify = false //
                else {
                    // Alert message //
                    alrtMsg("my_account", "error", "Error", "Password invalid!");
                }
            }

            // User no Exist ---> userCount = 0 //
            else if ($userCount == 0) {
                // Alert message //
                alrtMsg("my_account", "error", "Error", "This an account no longer exists!");
            }

            // User Exceed ---> userCount > 1 //
            else if ($userCount > 1) {
                // Alert message //
                alrtMsg("my_account", "error", "Error", "This an account have fault.");
            }

        }

        //<--- End Login --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- Add Category --->///

        public function addCategory($category_title) {

            global $table_category;

            // Add Category Validation //
            $categoryQuery = mysqli_query($this->connection, "SELECT category_title FROM $table_category WHERE category_title = '$category_title'");
            $categoryCount = $categoryQuery->num_rows;

            if ($categoryCount == 0) {

                // Add Category //
                mysqli_query($this->connection, "INSERT INTO $table_category (category_title) VALUES('$category_title')");

                // Alert message //
                alrtMsg("blog_category", "success", "Successfully!", "Add New Category Successfully!");

            }
            else if ($categoryCount == 1) {

                // Alert message //
                alrtMsg("blog_category", "error", "Error!", "Category already exists!");

            }
            else if ($categoryCount > 1) {

                // Alert message //
                alrtMsg("blog_category", "error", "Error!", "Category abnormal!");

            }

        }

        //<--- End Add Category --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- Display Category --->///

        public function displayCategory() {

            global $table_category;

            // Display Category //
            $categoryQuery = mysqli_query($this->connection, "SELECT id, category_title FROM $table_category");
    
            while ($rows = $categoryQuery->fetch_assoc()) {

                $categoryId    = $rows['id'];
                $categoryTitle = $rows['category_title'];

                echo "<tr>";
                echo "<td>{$categoryId}</td>";
                echo "<td>{$categoryTitle}</td>";
                echo "<td><a href='blog_category?category_del={$categoryId}'>Delete</a></td>";
                echo "</tr>";
                
            }

        }

        //<--- End Display Category --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

        //<--- Delete Category --->///

        public function delCategory($categoryId) {

            global $table_category;

            // Delete Category //
            mysqli_query($this->connection, "DELETE FROM $table_category WHERE id = '$categoryId'");

            // Alert message //
            alrtMsg("blog_category", "success", "Successfully!", "Delete Category Successfully!");

        }

        //<--- End Delete Category --->///

        //<------------------------------------------------------------------------------------------------------------------------------>///

    }

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Alert Message --->///

    function alrtMsg($redirect, $alrtIcon, $aletTitle, $alrtText) {

        echo    "<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon:  '$alrtIcon',
                            title: '$aletTitle',
                            text:  '$alrtText',
                        }).then(function() {
                            window.location = '$redirect';
                        });
                    }, 100);
                </script>";
    }

    //<--- End Alert Message --->///

    //<------------------------------------------------------------------------------------------------------------------------------>///

?>