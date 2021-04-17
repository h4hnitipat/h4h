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

    // Require Function SMTP (Sending Email verify) ---> PHPMailer
    require_once '_includes/functions/SMTP/email_verify.php';

    //<--- Clear Username --->///
    $username = "";

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Function --->///

    //<--- User Sing-up --->///
    if (isset($_POST['signup_submit'])) {

        // Input Validation
        $username  = $function->__construct()->real_escape_string($_POST['username']);
        $email     = $function->__construct()->real_escape_string($_POST['email']);
        $password  = $function->__construct()->real_escape_string($_POST['password']);
        $passconf  = $function->__construct()->real_escape_string($_POST['passconf']);

        // Resgistration
        $function->registration($username, $email, $password, $passconf);

    }
    //<--- End User Sing-up --->///

    //<------------------------------------------------------------------------------------------------------------------------------>///

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Help for Health</title>

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

    <!-- Registration -->

    <!------------------------------------------------------------------------------------------------------------------------>
    
    <!-- Registration -->
    
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
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
                            <h3 class="d-flex justify-content-center"><p class="user_header"><?php echo $lang['comment_1000201']?></p></h3>
                        </div>
                        <!-- End Header -->

                        <!-- E-mail Address -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fas fa-envelope"></i></span>
                            </div>
                            <!-- End Icon -->

                            <!-- Input -->
                            <input type="email" name="email" class="form-control input_username"
                                placeholder="<?php echo $lang['comment_1000202']?>" required>
                            <!-- End Input -->

                        </div>
                        <!-- End E-mail Address -->

                        <!-- Username -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fas fa-user"></i></span>
                            </div>
                            <!-- End Icon -->

                            <!-- Input -->
                            <input type="text" name="username" class="form-control input_username"
                                placeholder="<?php echo $lang['comment_1000203']?>" required>
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
                            <input type="password" name="password" class="form-control input_pass"
                                placeholder="<?php echo $lang['comment_1000204']?>" required>
                            <!-- End Input -->

                        </div>
                        <!-- End Password -->

                        <!-- Password Confirm -->
                        <div class="input-group mb-3">

                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text h-100"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <!-- End Icon -->

                            <!-- Input -->
                            <input type="password" name="passconf" class="form-control input_pass"
                                placeholder="<?php echo $lang['comment_1000205']?>" required>
                            <!-- End Input -->

                        </div>
                        <!-- End Password Confirm -->

                        <!-- Registration Submit -->
                        <div class="d-flex justify-content-center mb-3 user_container">
                            <button type="submit" name="signup_submit" class="btn user_btn"><?php echo $lang['comment_1000206']?></button>
                        </div>
                        <!-- End Registration Submit -->

                    </form>
                </div>
                <!-- End Form -->

                <!-- Log in -->
                <!-- Make space = "&nbsp" (non-breaking space) -->
                <div class="mb-3">
                    <div class="d-flex justify-content-center">
                        <?php echo $lang['comment_1000207']?> &nbsp &nbsp <a href="login" class="ml-2"><?php echo $lang['comment_1000208']?></a>
                    </div>
                </div>
                <!-- End Log in -->

            </div>
        </div>
    </div>

    <!-- End Registration -->

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Footer -->
    <?php include('_includes/footer.php') ?>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Bootstrap JS -->
    <?php include('_includes/_bootstrapjs.html') ?>

    <!------------------------------------------------------------------------------------------------------------------------>

</body>

</html>