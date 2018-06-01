<?php



function displayFormation(){
    global $bdd;
    $req = $bdd->prepare("SELECT f.contenu, f.img, DATE_FORMAT(f.date_deb,'%d/%m/%Y')
                                      as date_deb, f.nb_j, f.id_f, f.credit, p.nom_p, p.prenom_p, a.rue, a.commune, a.numero, a.cp
                                      FROM formation f, prestataire p, adresse a
                                      WHERE f.id_f
                                      NOT IN(
                                      SELECT id_f
                                      FROM participer
                                      WHERE id_s = ".$_SESSION['id_s'].")
                                      AND p.id_p = f.id_p
                                      AND f.id_a = a.id_a");

    $req->execute();
    return $req->fetchAll();
}

function currentCredit(){
    global $bdd;
    $req = $bdd->prepare("SELECT credit,nbj FROM salarie WHERE id_s =".$_SESSION['id_s']);
    $req->execute();
    return $req->fetch();
}

function formationCost($id_f){
    global $bdd;
    $req = $bdd->prepare("SELECT credit,nb_j FROM formation WHERE id_f=".$id_f);
    $req->execute();
    return $req->fetch();
}

function addFormation($id_s, $id_f, $etat){
    global $bdd;
    $req = $bdd->prepare("INSERT INTO participer VALUES (:id_s, :id_f, :etat)");
    $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
    $req->bindValue(":id_f", $id_f, PDO::PARAM_INT);
    $req->bindValue(":etat", $etat, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
}

function updateCredit($credit, $nbj){
    global $bdd;
    $req = $bdd->prepare("UPDATE salarie SET credit = :credit, nbj = :nbj WHERE id_s=".$_SESSION['id_s']);
    $req->bindValue(":credit", $credit, PDO::PARAM_INT);
    $req->bindValue(":nbj", $nbj, PDO::PARAM_INT);
    $req->execute();
}

