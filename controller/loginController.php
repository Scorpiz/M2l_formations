<?php require "../model/loginModel.php"; ?>

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
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['is_admin'] = false;
                    $_SESSION['connecte'] = true; // permet d'activer la session connectée
                    header('Location:accueilController.php');// redirection après connexion
                    break;
                case 1:
                    $_SESSION['id_s'] = $user['id_s'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['is_admin'] = true;
                    $_SESSION['connecte'] = true; // permet d'activer la session connectée
                    header("Location:adminControllers.php"); // redirection après connexion
                    break;
            }
        }
        else
        {
            echo "mauvais identifiants";
        }
    }



if(isset($_COOKIE['auth']) && !isset($_SESSION['auth'])){
    $auth = $_COOKIE['auth'];
    $auth = explode('-----',$auth);


    $donnee = getId($auth);

    $key = sha1($donnee['email'].$donnee['mdp'].$_SERVER['REMOTE_ADDR']);
    if($key == $auth[1]){
        $_SESSION['auth'] = $donnee;
        setcookie ('auth',$donnee['id_s'].'-----'.$key,time()+(3600*24*3),'/','localhost',false,true);
    }
    else{
        setcookie('auth','',time()-3600,'/','localhost',false,true);
        //A mettre aussi sur la page de deconnexion
    }
}
?>

<?php require "../view/loginView.php"; ?>

