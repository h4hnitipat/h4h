<?php

    //<------------------------------------------------------------------------------------------------------------------------------>///

    //<--- Language Selection --->///

    //<--- Language Default --->///
    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = "en";
    }

    //<--- Select Language --->///
    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
        
        if ($_GET['lang'] == "en"){ $_SESSION['lang'] = "en"; }
        else 
        if ($_GET['lang'] == "th"){ $_SESSION['lang'] = "th"; }

    }
    //<--- End Language Selection --->///

    //<--- Require Language --->///
    require_once $_SESSION['lang'].".php";

    //<------------------------------------------------------------------------------------------------------------------------------>///

?>