<?php require "model/gestionMembreChefModel.php";

if(isset($_SESSION['estChef']) && $_SESSION['estChef'] > 0) {
    $id_s = $_GET['id_s'];
    $id_f = $_GET['id_f'];

    $credit = getCredit()[0];
    $nbj = getCredit()[1];
    if ($credit < 0 OR $nbj < 0) {
        echo "Pas assez de crédits ou de nombres de jours";
    }else{
        acceptForm($id_s, $id_f);
        header('location:compte');
    }
}else{
    echo "Pas l'autorisation nécessaire";}
