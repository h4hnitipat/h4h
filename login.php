<?php

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Start Session --->///
    session_start();

    //<--- Language --->///
    include('_includes/lang/_lang.php'); 

    //<--- Configuration --->///
    include_once('_includes/config/config.php');

    //<--- Function --->///
    include_once('_includes/functions/functions.php');

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Redirect --->///

    // User logged in
    if (isset($_SESSION['username'])) {
        header('location: my_account');
    }

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Connection Database --->///
    $function = new db_connection();
    
    //<--- Clear Username --->///
    $username = "";

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Function --->///
    
    //<--- Verify --->///
    // E-mail Verification
    // Verify the user by token
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $function->verifyuser($token);
    }

    //<--- User Login --->///
    if (isset($_POST['login_submit'])) {

        // Input Validation
        $username  = $function->__construct()->real_escape_string($_POST['username']);
        $password  = $function->__construct()->real_escape_string($_POST['password']);
        $auth      = "user";

        // Remember me
        if (!empty($_POST['remember'])) {
            $remember = 1;
        }
        else {
            $remember = 0;
        }

        // Log in
        $function->login($username, $password, $auth, $remember);

    }
    //<--- End User Login --->///

    //<--- Remember me --->///
    if (isset($_COOKIE['remember_user']) && isset($_COOKIE['remember_pass'])) {
        $remember_user  = $_COOKIE['remember_user'];
        $remember_pass  = $_COOKIE['remember_pass'];
        $remember_check = "checked";
    }
    else {
        $remember_user  = "";
        $remember_pass  = "";
        $remember_check = "";
    }
    //<--- End Remember me --->///

    //<------------------------------------------------------------------------------------------------------------------------------>///

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Help for Health</title>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Bootstrap CSS -->
    <?php include('_includes/_bootstrap.html') ?>
    
    <!-- Fontawesome -->
    <?php include('_includes/_fontawesome.html') ?>

    <!-- Sweet Alert 2 -->
    <?php include('_includes/_sweetalert2.html') ?>

    <!-- stylesheet -->
    <link rel="stylesheet" href="_includes/css/style.css">

    <!------------------------------------------------------------------------------------------------------------------------>

</head>

<body>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Header -->
    <?php include('_includes/header.php') ?>

    <!-- Navigation Bar -->
    <?php include('_includes/navigation.php') ?>
    
    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Login -->

    <!------------------------------------------------------------------------------------------------------------------------>
    
    <!-- Login -->

    <div class="container h-100">
        <div class="d-flex justify-content-center bg_white h-100">
            <div class="user_card">

                <!-- Logo -->
                <div class="d-flex justify-content-center">
                    <div class="user_logo_container">
                        <img src="img/logo/logo_640x640.png" class="user_logo"
                            alt="Logo">
                    </div>
                </div>
                <!-- End Logo -->

                <!-- Form -->
                <div class="d-flex justify-content-center form_container">
                    <form method="post">

                        <!-- Header -->
                        <div class="mb-3">
                            <h3 class="d-flex justify-content-center"><p class="user_header"><?php echo $lang['comment_1000101']?></p></h3>
                        </div>
                        <!-- End Header -->

                        <!-- Username -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fas fa-user"></i></span>
                            </div>
                            <!-- End Icon -->

                            <!-- Input -->
                            <input type="text" name="username" class="form-control input_username" value="<?php echo $remember_user; ?>"
                                placeholder="<?php echo $lang['comment_1000102']?>" required>
                            <!-- End Input -->

                        </div>
                        <!-- End Username -->

                        <!-- Password -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fas fa-key"></i></span>
                            </div>
                            <!-- End Icon -->

                            <!-- Input -->
                            <input type="password" name="password" class="form-control input_pass" value="<?php echo $remember_pass; ?>"
                                placeholder="<?php echo $lang['comment_1000103']?>" required>
                            <!-- End Input -->
                            
                        </div>
                        <!-- End Password -->

                        <!-- Remember me & Forgot password -->
                        <div class="form-group mb-3">
                            <div>
                                <span class="custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline" <?php echo $remember_check; ?> >
                                    <span class="custom-control-label" for="customControlInline"><?php echo $lang['comment_1000104']?></span>
                                    <span class="float-end" ><a href="password_forgot"><?php echo $lang['comment_1000105']?></a></span>
                                </span> 
                            </div>
                        </div>
                        <!-- End Remember me & Forgot password -->

                        <!-- Log In Submit -->
                        <div class="d-flex justify-content-center mb-3 p-0">
                            <button type="submit" name="login_submit" class="btn user_btn"><?php echo $lang['comment_1000106']?></button>
                        </div>
                        <!-- End Log In Submit -->

                    </form>
                </div>
                <!-- End Form -->

                <!-- Create an account -->
                <div class="mb-3">
                    <div class="d-flex justify-content-center">
                        <p><a href="registration.php" class="ms-2"><?php echo $lang['comment_1000107']?></a></p>
                    </div>
                </div>
                <!-- End Create an account --> 

            </div>
        </div>
    </div>

    <!-- End Login -->

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Footer -->
    <?php include('_includes/footer.php') ?>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Bootstrap JS -->
    <?php include('_includes/_bootstrapjs.html') ?>

    <!------------------------------------------------------------------------------------------------------------------------>

</body>

</html>