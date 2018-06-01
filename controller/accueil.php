<?php

require "model/accueilModel.php";

    if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
        $participer = getCurrentParticiper();
        $form = displayFormation();

        //Souscription à une formation
        if(isset($_GET['ajouter']))
        {
            $id_f = $_GET['ajouter'];
            $formCredit = formationCost($id_f)[0];
            $credit = currentCredit()[0];
            $credit = $credit - $formCredit;

            $formNbj = formationCost($id_f)[1];
            $nbj = currentCredit()[1];
            $nbj = $nbj - $formNbj;

            if($_SESSION['estChef'] > 0){
                $etat = 1;
                if($credit < 0 OR $nbj < 0 )
                {
                    echo "Crédits ou nombre de jour restants insuffisants";
                }
                else {
                    updateCredit($credit, $nbj);
                    addFormation($_SESSION['id_s'], $id_f, $etat);

                }
            }else{
                $etat = 0;
                if($credit < 0 OR $nbj < 0 )
                {
                    echo "Crédits ou nombre de jour restants insuffisants";
                }
                else {
                    addFormation($_SESSION['id_s'], $id_f, $etat);

                }
            }


        }
    }else{ header("location:".BASE_URL."/login");} //redirection si non connecté

require "view/accueilView.php";
