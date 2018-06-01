<?php

function input($label, $type, $name, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<div app='form-group'>";
    $html .= "<label for='$name'>$label</label>";
    $html .= "<input type='$type' app='form-control' id='$name' name='$name' $constructor>";
    $html .= "</div>";

    return $html;
}

function submit($name, $value, $class = "btn-default"){
    $html = " <button type='submit' name='$name' id='$name' app='btn $class'>$value</button>";

    return $html;
}

function textarea($name, $row = 3, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<textarea app='form-control' name='$name' id='$name' rows='$row' $constructor></textarea>";

    return $html;
}

function select($name, $values, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<select app='form-control' $constructor name='$name' id='$name'>";
    foreach ($values as $value) {
        $html .= "<option value='$value'>$value</option>";
    }
    $html .= "</select>";

    return $html;
}

function checkbox($label, $name, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<div app='checkbox'>";
        $html .= "<label>";
            $html .= "<input name='$name' id='$name' $constructor type='checkbox'> $label";
        $html .= "</label>";
    $html .= "</div>";

    return $html;
}

function radio($label, $name, $values, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<div app='radio'> $label";
    foreach ($values as $value) {
        $html .= "<label>";
        $html .= "<input type='radio' $constructor name='$name' id='$name' value='$value' checked>";
        $html .= $value;
        $html .= "</label>";
    }
    $html .= "</div>";

    return $html;
}


function dbConnect($namebdd){
    try{
        $bdd = new PDO('mysql:host=localhost;dbname='.$namebdd.';charset=utf8', 'root', '');
        return $bdd; 
    }catch(Exception $e){
        die("Erreur de connexion à la BDD : $e->getMessage()");
    }
}

function randomMdp(){
    $mdp = "";
    $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
    for($i = 0; $i < 8;$i++){
        $mdp .= $chaine[rand(0,51)];
    }
    $mdp = str_shuffle($mdp);
    return $mdp;
}

function getLevel($estChef){
    global $bdd;
    $user = $bdd->prepare("SELECT estChef FROM salarie WHERE estChef=:estChef");
    $user->bindValue(":estChef", $estChef, PDO::PARAM_INT);
    $user->execute();
}

function getCurrentParticiper() {
    global $bdd;
    $participer = $bdd->prepare("SELECT  F.contenu, F.date_deb, F.nb_j, P.etat, Pr.nom_p, Pr.prenom_p
                                            FROM participer P, salarie S, formation F, prestataire Pr
                                            WHERE P.id_s =".$_SESSION['id_s']." 
                                            AND S.id_s = P.id_s
                                            AND F.id_f = P.id_f
                                            AND F.id_p = Pr.id_p");

    $participer->execute();
    return $participer->fetchAll();
}


