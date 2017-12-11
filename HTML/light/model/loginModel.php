<?php

function getUsers($email, $mdp){
    global $bdd;
    $user = $bdd->prepare("SELECT * FROM salarie WHERE email=:email AND mdp=:mdp");
    $user->bindValue(':email',$email,PDO::PARAM_STR);
    $user->bindValue(':mdp',$mdp,PDO::PARAM_STR);
    $user->execute();
    return $user->fetchAll();
}

function getId($auth){
    global $bdd;
    $user = $bdd->prepare("SELECT * FROM salarie WHERE id_s=:id_s");
    $user->bindValue(':id_s',$auth[0],PDO::PARAM_INT);
    $user->execute();
    return $user->fetch();
}
