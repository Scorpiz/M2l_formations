<?php require "model/compteModel.php";

if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
    $info = getInfoCurrentUser();
    $participer = getCurrentParticiper();


    if (isset($_POST['submit'])) {
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars(sha1($_POST['mdp']));
            $mdpconfirm = htmlspecialchars(sha1($_POST['mdpconfirm']));

            if (!empty($_POST['mdp']) && !empty($_POST['mdpconfirm'])) {
                if($mdp == $mdpconfirm) {
                    updateInfoCurrentUser($nom, $prenom, $email, $mdp);
                }else{
                    echo "Les mots de passe ne correspondent pas";
                }
            }else{
                echo "Veuillez entrer votre mot de passe";
            }
        }
    }

    if(isset($_SESSION['estChef']) && $_SESSION['estChef'] = 1){ //Pour les chefs et admins seulement
        $salaries = getMyEmployes();
        $participer2 = getParticiper();
    }
    if (isset($_SESSION['estChef']) && $_SESSION['estChef'] = 2) { //Pour les admins seulement
        $participerAll = getParticiperAll();
    }

}else{ header("location:".BASE_URL."/login");} //redirection si non connecté
require "view/compteView.php";