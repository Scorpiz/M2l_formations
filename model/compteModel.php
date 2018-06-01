<?php
function getInfoCurrentUser(){
    global $bdd;
    $info = $bdd->prepare("SELECT * FROM salarie s, adresse a WHERE id_s =".$_SESSION['id_s'].".AND s.id_a = a.id_a");
    $info->execute();
    return $info->fetchAll();
}

function updateInfoCurrentUser($nom, $prenom, $email, $mdp){
    global $bdd;
    $info = $bdd->prepare("UPDATE salarie SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp WHERE id_s=".$_SESSION['id_s']);
    $info->bindValue(":nom", $nom, PDO::PARAM_INT);
    $info->bindValue(":prenom", $prenom, PDO::PARAM_INT);
    $info->bindValue(":email", $email, PDO::PARAM_INT);
    $info->bindValue(":mdp", $mdp, PDO::PARAM_INT);
    $info->execute();
}

function getInfoUser(){
    global $bdd;
    $info = $bdd->prepare("SELECT * FROM salarie s, adresse a WHERE id_s");
}

function getMyEmployes(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM salarie WHERE id_c =".$_SESSION['id_c']." AND id_s = id_c");
    $req->execute();
    return $req->fetchAll();
}

function getParticiper(){
    global $bdd;
    $participer2= $bdd->prepare("SELECT  s.prenom, s.nom, contenu, f.date_deb, f.nb_j, etat, f.id_f, s.id_s
                                            FROM salarie s, participer p, formation f
                                            WHERE p.etat = 0 AND estChef = 0
                                            AND s.id_s = p.id_s
                                            AND f.id_f = p.id_f
                                            AND s.id_s = ".$_SESSION['id_c']);
    $participer2->execute();
    return $participer2->fetchAll();
}

function getParticiperAll(){
    global $bdd;
    $participerAll= $bdd->prepare("SELECT  s.prenom, s.nom, contenu, f.date_deb, f.nb_j, etat, f.id_f, s.id_s
                                            FROM salarie s, participer p, formation f
                                            WHERE p.etat = 0
                                            AND s.id_s = p.id_s
                                            AND f.id_f = p.id_f");
    $participerAll->execute();
    return $participerAll->fetchAll();
}