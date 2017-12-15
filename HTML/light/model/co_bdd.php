<?php
    try{
        $bdd = new PDO('mysql:host=172.16.0.2;dbname=tgorszczyk;charset=utf8', 'tgorszczyk', 'rngjesus77');
    }catch(Exception $e){
        die("Erreur de connexion à la BDD");
    }