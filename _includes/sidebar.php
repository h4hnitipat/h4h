    <!------------------------------------------------------------------------------------------------------------------------>
    
    <!-- Wrapper Sidebar -->
    <aside class="min-vh-100 sidebar_width_content" id="sidebar_wrapper">
        
        <!-- Sidebar Main -->
        <ul class="sidebar_main h-100 m-0 p-0 bg-light">

            <div class="sidebar_main_collapsion text-center d-none d-md-block m-0 p-0">
                <img src="img/my_account/user_male.png" alt="profie pictrue" class="img-fluid rounded-circle my-2 p-1" width="100" height="100">
                <a href="" class="sidebar_main_collapsion mx-0 font-weight-bold text-nowrap" style="cursor: default;"> Name </a>
            </div>

            <!------------------------------->

            <!-- Activate -->

            <!-- Sidebar Main Item -->
            <li class="">
                <div class="sidebar_main_collapsion text-center m-2">
                    <a href="kit_activate">
                        <button type="button" class="btn btn-sm btn_activate_kit"><?php echo $lang['comment_1010101']?></button>
                    </a>
                </div>
            </li>
            <!-- End Sidebar Main Item -->

            <!------------------------------->

            <!-- Dashboard -->

            <!-- Sidebar Main Item -->
            <li class="">
                <a href="my_account">
                    <i class="fas fa-user-circle"></i>
                    <span class="sidebar_main_collapsion pe-3"><?php echo $lang['comment_1010201']?></span>
                </a>
            </li>
            <!-- End Sidebar Main Item -->

            <!------------------------------->

            <!-- Account -->
                    
            <!-- Sidebar Main Item -->
            <li class="">
                <a href="#">
                    <i class="fas fa-university"></i>
                    <span class="sidebar_main_collapsion pe-3"><?php echo $lang['comment_1010301']?></span>
                    <span class="sidebar_main_collapsion float-end"><i class="fa fa-angle-left"></i></span>
                </a>
                    
                    <!-- Sidebar Sub Item -->
                    <ul class="sidebar_sub_collapsion m-0 p-0 bg-light">
                        <li><a href="#" class="px-4"><i class="fas fa-shopping-basket"></i><span><?php echo $lang['comment_1010302']?></span></a></li>
                        <li><a href="#" class="px-4"><i class="fas fa-shipping-fast"></i><span><?php echo $lang['comment_1010303']?></span></a></li>
                        <li><a href="#" class="px-4"><i class="fas fa-address-card"></i><span><?php echo $lang['comment_1010304']?></span></a></li>
                        <li><a href="#" class="px-4"><i class="fas fa-file-invoice-dollar"></i><span><?php echo $lang['comment_1010305']?></span></a></li>
                        <li><a href="#" class="px-4"><i class="far fa-credit-card"></i><span><?php echo $lang['comment_1010306']?></span></a></li>
                    </ul>
                    <!-- End Sidebar Sub Item -->

            </li>
            <!-- End Sidebar Main Item -->

            <!------------------------------->

            <!-- Report -->

            <!-- Sidebar Main Item -->
            <li class="">
                <a href="kit_report">
                    <i class="fas fa-first-aid"></i>
                    <span class="sidebar_main_collapsion pe-3"><?php echo $lang['comment_1010401']?></span>
                </a>
            </li>
            <!-- End Sidebar Main Item -->

            <!------------------------------->

            <!-- Setting -->

            <!-- Sidebar Main Item -->
            <li class="">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="sidebar_main_collapsion pe-3"><?php echo $lang['comment_1010501']?></span>
                </a>
            </li>
            <!-- End Sidebar Main Item -->

            <!------------------------------->

            <!-- Log out -->

            <!-- Sidebar Main Item -->
            <li class="">
                <form method="post">
                    <div class="sidebar_main_collapsion text-center m-2">
                        <button type="submit" name="user_logout" class="btn btn-sm bg-danger btn_logout"><?php echo $lang['comment_1010102']?></button>
                    </div>
                </form>
            </li>
            <!-- End Sidebar Main Item -->

            <!------------------------------->

        </ul>
        <!-- End Sidebar Main -->

    </aside>
    <!-- End Wrapper Sidebar -->

    <!------------------------------------------------------------------------------------------------------------------------>