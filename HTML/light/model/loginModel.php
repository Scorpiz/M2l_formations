<?php

require_once "../core/functions.php";
require_once "../model/co_bdd.php";

function getUsers($email, $mdp){
    global $bdd;
    $user = $bdd->prepare("SELECT * FROM salarie WHERE email=:email AND mdp=:mdp");
    $user->execute(array(
        ':email' => $email,
        ':mdp' => hash('sha1',$mdp)
    ));
    return $user->fetchAll();
}

function getId($auth){
    global $bdd;
    $user = $bdd->prepare("SELECT * FROM salarie WHERE id_s=:id_s");
    $user->bindValue(':id_s',$auth[0],PDO::PARAM_INT);
    $user->execute();
    return $user->fetch();
}
