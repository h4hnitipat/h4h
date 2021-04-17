<?php

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Database: Localhost --->///
    // define('db_server',   'localhost'); // Your Hostname
    // define('db_username', 'root');      // Database Username
    // define('db_password', '');          // Database Password
    // define('db_database', 'hhtrials_swmt');    // Database Name
    
    //<--- Database: Hosting --->///
    define('db_server',   'localhost');     // Your Hostname
    define('db_username', 'hhtrials_swmt'); // Database Username
    define('db_password', 'jKinXKUi');      // Database Password 
    define('db_database', 'hhtrials_swmt'); // Database Name 

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Mailer --->///
    define('SMTP_mail',''); // E-mail for send mail verification
    define('SMTP_pass',''); // password

    //<--- Mailer --->///
    // define('SMTP_mail','stmp@h4htrialsite.com'); // E-mail for send mail verification
    // define('SMTP_pass','DbyV1XScv1K!');          // password

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Database: Table --->///

    // Account
    $table_user              = "account_user";
    $table_profile           = "account_profile";

    // Product - Kit
    $table_kitActivate       = "kit_activate";
    $table_kitReport         = "kit_report";
    $table_kitStatus         = "kit_status";
    $table_inventory         = "inventory";
    $table_customer          = "customer";
    $table_supplier          = "supplier";
    $table_product           = "product";
    $table_productDetail     = "product_detail";

    // Product - Test
    $table_test              = "test";
    $table_testGroup         = "test_group";
    $table_explaResult       = "test_expla_result";
    $table_explaDetail       = "test_expla_detail";
    $table_explaCounsel      = "test_expla_counsel";

    // Blogging
    $table_category          = "blog_category";
    $table_post              = "blog_post";

    //<--- Database: Table --->///

    //<------------------------------------------------------------------------------------------------------------------------------>///

?>