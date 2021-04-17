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

    // Admin didn't logged in //
    if (!isset($_SESSION['username'])) {
        header('location: login');
    }

    // Admin log out //
    if (isset($_POST['admin_logout'])) {
        session_destroy();
        header('location: login');
    }

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Connection Database --->///
    $function = new db_connection();

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Function --->///

    //<------------------------------------------------------------------------------------------------------------------------------>///

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Help for Health</title>

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

    <!-- Dashboard -->

    <!------------------------------------------------------------------------------------------------------------------------>
    
    <!-- Wrapper -->
    <div class="container-fluid m-0 p-0 min_width_max_content">

        <!-- Topbar -->
        <?php include('_includes/topbar.php') ?>
        
        <!-- Wrapper Main -->
        <main class="container-fluid d-inline-flex m-0 p-0">

            <!-- Sidebar -->
            <?php include('_includes/sidebar.php') ?>

            <!-- Content -->
            <section class="min-vh-100 w-100 text-center">

                <!-- Wrapper -->
                <div class="container-fluid d-md-inline-flex min_width_max_content">

                    Dashboard

                </div>
                <!-- End Wrapper -->

            </section>
            <!-- End Content -->

        </main>
        <!-- End Wrapper Main -->
    
    </div>
    <!-- End Wrapper -->

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Footer -->
    <?php include('../_includes/footer.php') ?>

    <!------------------------------------------------------------------------------------------------------------------------>

    <!-- Bootstrap JS -->
    <?php include('../_includes/_bootstrapjs.html') ?>

    <!-- Jquery -->
    <?php include('../_includes/_jquery.html') ?>

    <!-- Script -->
    <script src="js/app.js"></script>

    <!------------------------------------------------------------------------------------------------------------------------>

</body>
</html>
    