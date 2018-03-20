<?php

    require "model/co_bdd.php";

    if(!isset($_SESSION['id_s'])) {

        header("Location:controller/loginController.php");
    } else {
        header("Location:controller/accueilController.php");
    }
?>