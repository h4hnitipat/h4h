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
    // if (!isset($_SESSION['username'])) {
    //     header('location: login');
    // }

    // // Admin log out //
    // if (isset($_POST['admin_logout'])) {
    //     session_destroy();
    //     header('location: login');
    // }

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Connection Blog Database --->///
    $blog = new db_connection();

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Function --->///
    
    //<--- Add Category --->///
    if (isset($_POST['category_add_submit'])) {

        // Input Validation
        $category_title = $blog->__construct()->real_escape_string($_POST['category_add']);

        // Add Category
        $blog->addCategory($category_title);

    }

    //<--- Delete Category --->///
    if (isset($_GET['category_del'])) {

        // Get Category ID to delte
        $categoryId = $_GET['category_del'];

        // Delete Category
        $blog->delCategory($categoryId);

    }

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

    <!-- Blog - Category -->

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

                    <!------------------------------------------------------------------------------------------------------------------------>

                    <!-- Add Categorty Title -->

                    <!-- Box -->
                    <div class="col-md-6 m-4">

                        <!-- Form -->
                        <form method="post">
                            <!-- Box Card -->
                            <div class="card box_card">
                                <!-- Box Card Header -->
                                <div class="card-header bg-dark text-light">
                                    <strong>Category Title</strong>
                                </div>
                                <!-- End Box Card Header -->
                                <!-- Box Card Body -->
                                <div class="card-body d-flex justify-content-center">
                                    <!-- Add Category Title (Input) -->
                                    <input type="text" name="category_add" class="d-block mx-2" value="" placeholder="Category Title" required>
                                    <!-- Add Category Title (Submit Button)-->
                                    <button type="submit" name="category_add_submit" class="btn btn-dark box_btn" > Add Category </button>
                                </div>
                                <!-- Box Card Body -->
                            </div>
                            <!-- End Box Card -->
                        </form>
                        <!-- End Form -->

                    </div>
                    <!-- End Box -->

                    <!-- End Add Categorty Title -->

                    <!------------------------------------------------------------------------------------------------------------------------>

                    <!-- Categorty Title Table -->

                    <!-- Box -->
                    <div class="col-md-5 m-4 overflow-auto">
                        <div class="table-responsive min_width_max_content">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                    <th>#ID</th>
                                    <th>Category Title</th>
                                    <th>Delete</th>
                                </thead>
                                <!-- Form (Use for delete) -->
                                <form method="get">
                                <tbody>
                                    <?php $blog->displayCategory() ?>
                                </tbody>
                                </form>
                                <!-- End Form -->
                            </table>
                        </div>
                    </div>
                    <!-- End Box -->

                    <!-- End Categorty Title Table -->

                    <!------------------------------------------------------------------------------------------------------------------------>

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
    