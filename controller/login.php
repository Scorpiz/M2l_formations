<?php require "model/loginModel.php";

// if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
//    header("location:".BASE_URL."/accueil");
//}?>
<?php
if(isset($_POST['submit'])){
    $email = ($_POST['email']);
    $mdp = sha1($_POST['mdp']);

    $reponse = getUsers($email, $mdp);
    if($reponse && $reponse[0])
    {
        $user = $reponse[0];
        switch($user['estChef']){
            case 0:
                $_SESSION['id_s'] = $user['id_s'];
                $_SESSION['id_c'] = $user['id_c'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['estChef'] = $user['estChef'];
                $_SESSION['is_admin'] = false;
                $_SESSION['connecte'] = true; // permet d'activer la session connectée
                header("location:".BASE_URL."/accueil");
                break;
            case 1:
                $_SESSION['id_s'] = $user['id_s'];
                $_SESSION['id_c'] = $user['id_c'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['estChef'] = $user['estChef'];
                $_SESSION['is_admin'] = false;
                $_SESSION['connecte'] = true;
                header("location:".BASE_URL."/accueil");
                break;
            case 2:
                $_SESSION['id_s'] = $user['id_s'];
                $_SESSION['id_c'] = $user['id_c'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['estChef'] = $user['estChef'];
                $_SESSION['is_admin'] = true;
                $_SESSION['connecte'] = true;
                header("location:".BASE_URL."/accueil");
                break;
        }
    }
    else
    {
        $message = "Identifiants incorrects";
        echo "mauvais identifiants";
    }
}

require "view/loginView.php"; ?>