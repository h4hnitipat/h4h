    <!------------------------------------------------------------------------------------------------------------------------>
    
    <!-- Navigation Bar -->
    <div class="container-fluid bg_white">
        <div class="container col-10 d-flex">
            <!-- stacks the navbar vertically on medium screen(md) -->
            <nav class="navbar navbar-expand-md navbar-light sticky-top">

                <!-- Navigation logo -->
                <!-- Logo -->
                <!-- Hide element when screen size less than medium screen(md) -->
                <a class="navbar-brand d-none d-md-block" href="index">
                    <!-- img size : 60x60 px -->
                    <img src="img/logo/logo_640x640.png" alt="" width="60" height="60">
                </a>
                <!-- End Navigation logo -->

                <!-- Navigation Toggle Button -->
                <!-- Collapse Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_navigation_menu" aria-expanded="false" aria-controls="collapse_navigation_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- End Collapse Toggler -->
                <!-- End Navigation Toggle Button -->

                <!-- Navigation Menu -->
                <!-- Collapse Items -->
                <div class="collapse navbar-collapse" id="collapse_navigation_menu">

                    <!-- Navigation Item -->
                    <ul class="navbar-nav" aria-labelledby="collapse_navigation_menu">

                        <!-- Home -->
                        <!-- Display element when screen size less than medium screen(md) -->
                        <li class="nav-item align-items-center d-md-none d-block ms-2">
                            <a class="nav-link" href="index">
                                <span class="txt_link">
                                    <!-- Icon -->
                                    <i class="fas fa-home"></i>
                                    <!-- End Icon -->
                                    <strong><?php echo $lang['comment_0000101']?></strong>
                                </span>
                            </a>
                        </li>
                        <!-- End Home -->

                        <!-- Information -->
                        <li class="nav-item dropdown align-items-center ms-2">
                            <!-- Dropdown Toggler -->
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="collapse_navigation_menu_dropdown" href="#">
                                <span class="txt_link">
                                    <!-- Icon -->
                                    <i class="fas fa-info-circle"></i>
                                    <!-- End Icon -->
                                    <strong class="p-1"><?php echo $lang['comment_0000102']?></strong>
                                </span>
                            </a>
                            <!-- End Dropdown Toggler -->

                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu p-2" aria-labelledby="collapse_navigation_menu_dropdown">
                                <a class="dropdown-menu-item txt_link" href="index"><strong class="p-1"><?php echo $lang['comment_0000101']?></strong></a><br>
                                <a class="dropdown-menu-item txt_link" href="service"><strong class="p-1"><?php echo $lang['comment_0000108']?></strong></a><br>
                                <a class="dropdown-menu-item txt_link" href="about"><strong class="p-1"><?php echo $lang['comment_0000109']?></strong></a><br>
                                <a class="dropdown-menu-item txt_link" href="faq"><strong class="p-1"><?php echo $lang['comment_0000110']?></strong></a><br>
                            </div>
                            <!-- End Dropdown Menu -->
                        </li>
                        <!-- End Information -->

                        <!-- Blog -->
                        <li class="nav-item align-items-center ms-2">
                            <a class="nav-link" href="blog">
                                <span class="txt_link">
                                    <!-- Icon -->
                                    <i class="fas fa-book"></i>
                                    <!-- End Icon -->
                                    <strong class="p-1"><?php echo $lang['comment_0000103']?></strong>
                                </span>
                            </a>
                        </li>
                        <!-- End Blog -->

                        <!-- Navigation Language -->
                        <!-- Display element when screen size less than medium screen(md) -->
                        <li class="nav-item align-items-center d-flex d-md-none d-block ms-2">
                            <!-- Icon -->
                            <i class="fas fa-globe txt_link"></i>
                            <!-- End Icon -->
                            <span class="nav-link">
                                <span class="txt_link">
                                    <a class="txt_link ms-2" href="?lang=en"><strong><?php echo $lang['lang-en']?></strong></a>
                                    <a class="txt_link"><strong>|</strong></a>
                                    <a class="txt_link" href="?lang=th"><strong><?php echo $lang['lang-th']?></strong></a>
                                </span>
                            </span>
                        </li> 
                        <!-- End Navigation Language -->
                    </ul>
                    <!-- End Navigation Item -->
                </div>
                <!-- End Collapse Items -->
                <!-- End Navigation Menu -->
            </nav>
            <!-- End Navigation Bar -->

            <!------------------------------------------------------------------------------------------------------------------------>

            <!-- Fixed Top Bar -->
            <div class="d-flex align-items-center ms-auto">

                <!-- Fixed Top Language -->
                <!-- Hide element when screen size less than medium screen(md) -->
                <span class="width_max_content d-md-block d-none m-1">
                    <!-- Icon -->
                    <i class="fas fa-globe txt_link"></i>
                    <!-- End Icon -->
                    <span class="txt_link">
                        <a class="txt_link ms-2" href="?lang=en"><strong><?php echo $lang['lang-en']?></strong></a>
                        <a class="txt_link"><strong>|</strong></a>
                        <a class="txt_link me-2" href="?lang=th"><strong><?php echo $lang['lang-th']?></strong></a>
                    </span>
                </span>
                <!-- End Fixed Top Language -->

                <!-- Shop -->
                <span class="width_max_content m-1">
                    <a class="txt_link" href="shop">
                        <!-- Icon -->
                        <i class="fas fa-shopping-cart"></i>
                        <!-- End Icon -->
                        <strong class="p-1"><?php echo $lang['comment_0000105']?></strong>
                    </a>
                </span>
                <!-- End Shop -->
            
                <!-- Sign In -->
                <!-- Display when no login -->
                <?php if (!isset($_SESSION['username'])) { ?>
                    <span class="width_max_content m-1">
                        <a class="txt_link" href="my_account">
                            <!-- Icon -->
                            <i class="fas fa-user"></i>
                            <!-- End Icon -->
                            <strong class="p-1"><?php echo $lang['comment_0000106']?></strong>
                        </a>
                    </span>
                <?php } ?>
                <!-- End Sign In -->

                <!-- My Account -->
                <!-- Display when login -->
                <?php if (isset($_SESSION['username'])) { ?>
                    <span class="width_max_content m-1">
                        <a class="txt_link" href="my_account">
                            <!-- Icon -->
                            <i class="fas fa-user"></i>
                            <!-- End Icon -->
                            <strong class="p-1"><?php echo $lang['comment_0000107']?></strong>
                        </a>
                    </span> 
                <?php } ?>
                <!-- End My Account -->
            </div>
            <!-- End Fixed Top Bar -->
        </div>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------>