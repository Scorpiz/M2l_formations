<?php
function acceptForm($id_s, $id_f)
{
    global $bdd;
    $req = $bdd->prepare("UPDATE participer SET etat = 1 WHERE id_s=:id_s AND id_f=:id_f");
    $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
    $req->bindValue(":id_f", $id_f, PDO::PARAM_INT);
    $req->execute();
}

function denyForm($id_s, $id_f)
{
    global $bdd;
    $req = $bdd->prepare("UPDATE participer SET etat = -1 WHERE id_s=:id_s AND id_f=:id_f");
    $req->bindValue(":id_s", $id_s, PDO::PARAM_INT);
    $req->bindValue(":id_f", $id_f, PDO::PARAM_INT);
    $req->execute();
}

function getCredit(){
    global $bdd;
    $req = $bdd->prepare("SELECT credit, nbj FROM salarie");
    $req->execute();
    return $req->fetchAll();
}