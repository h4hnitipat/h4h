<?php

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Start Session --->///
    session_start();

    //<--- Language --->///
    include('../_includes/lang/_lang.php'); 

    //<--- Configuration --->///
    include_once('../_includes/config/config.php');

    //<--- Function --->///
    include_once('../_includes/functions/functions.php');

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Redirect --->///

    // Admin logged in
    if (isset($_SESSION['username'])) {
        header('location: index');
    }

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Connection Database --->///
    $function = new db_connection();

    //<--- Clear Username --->///
    $username = "";

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Function --->///

    //<--- Admin Login --->///
    if (isset($_POST['admin_login'])) {

        // Input Validation
        $username  = $function->__construct()->real_escape_string($_POST['username']);
        $password  = $function->__construct()->real_escape_string($_POST['password']);
        $auth      = "admin";

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
    //<--- End Admin Login --->///

    //<--- Remember me --->///
    if (isset($_COOKIE['remember_userAdmin']) && isset($_COOKIE['remember_passAdmin'])) {
        $remember_user  = $_COOKIE['remember_userAdmin'];
        $remember_pass  = $_COOKIE['remember_passAdmin'];
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
    <title>Administrator - Help for Health</title>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Bootstrap CSS -->
    <?php include('../_includes/_bootstrap.html') ?>
    
    <!-- Fontawesome -->
    <?php include('../_includes/_fontawesome.html') ?>

    <!-- Sweet Alert 2 -->
    <?php include('../_includes/_sweetalert2.html') ?>

    <!-- stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!------------------------------------------------------------------------------------------------------------------------>

</head>

<body>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Admin Login -->

    <!------------------------------------------------------------------------------------------------------------------------>
    
    <!-- Admin Login -->

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="admin_card">

                <!-- Logo -->
                <div class="d-flex justify-content-center">
                    <div class="admin_logo_container">
                        <img src="../img/logo/logo_640x640.png" class="admin_logo"
                            alt="Logo">
                    </div>
                </div>
                <!-- End Logo -->

                <!-- Form -->
                <div class="d-flex justify-content-center form_container mb-3">
                    <form method="post">

                        <!-- Header -->
                        <div class="mb-3">
                            <h3 class="d-flex justify-content-center"><p class="admin_header"><?php echo $lang['comment_9000101']?></p></h3>
                        </div>
                        <!-- End Header -->

                        <!-- Username -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text admin_input_group_text h-100"><i class="fas fa-user"></i></span>
                            </div>
                            <!-- End Icon -->

                            <!-- Input -->
                            <input type="text" name="username" class="form-control input_username" value="<?php echo $remember_user; ?>"
                                placeholder="<?php echo $lang['comment_9000102']?>" required>
                            <!-- End Input -->

                        </div>
                        <!-- End Username -->

                        <!-- Password -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text admin_input_group_text h-100"><i class="fas fa-key"></i></span>
                            </div>
                            <!-- Icon -->

                            <!-- Input -->
                            <input type="password" name="password" class="form-control input_pass" value="<?php echo $remember_pass; ?>"
                                placeholder="<?php echo $lang['comment_9000103']?>" required>
                            <!-- End Input -->

                        </div>
                        <!-- End Password -->

                        <!-- Remember me & Forgot password -->
                        <div class="form-group">
                            <div>
                                <span class="custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="adminControlInline" <?php echo $remember_check; ?> >
                                    <span class="custom-control-label" for="adminControlInline"><?php echo $lang['comment_1000104']?></span>
                                    <span class="float-end" ><a href="#"><?php echo $lang['comment_9000105']?></a></span>
                                </span> 
                            </div>
                        </div>
                        <!-- End Remember me & Forgot password -->

                        <!-- Log In button -->
                        <div class="d-flex justify-content-center mt-3 p-0">
                            <button type="submit" name="admin_login" class="btn admin_btn"><?php echo $lang['comment_9000106']?></button>
                        </div>
                        <!-- End Log In button -->

                    </form>
                </div>
                <!-- End Form -->

            </div>
        </div>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Bootstrap JS -->
    <?php include('../_includes/_bootstrapjs.html') ?>

    <!------------------------------------------------------------------------------------------------------------------------>

</body>

</html>