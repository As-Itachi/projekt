<?php

try{

    $pdo = new PDO("mysql:host=localhost;dbname=projektbuecher;charset=utf8", "root", "");

}catch(PDOException $e){

    die("Fehler beim Verbindungsaufbau zur DB!");
}



?>