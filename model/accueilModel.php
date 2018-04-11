<?php
require_once "co_bdd.php";
function getParticiper() {
    global $bdd;
    $participer = $bdd->prepare("SELECT F.contenu, F.date_deb, F.nb_j  FROM participer P, salarie S, formation F WHERE P.id_s =".$_SESSION['id_s']." AND F.id_f = P.id_f;");
    $participer->execute();
    return $participer->fetchAll();
}
?>