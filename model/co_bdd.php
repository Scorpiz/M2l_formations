<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=m2l;charset=utf8', 'root', ''); //rngjesus77 for m2l
    }catch(Exception $e){
        die("Erreur de connexion à la BDD");
    }