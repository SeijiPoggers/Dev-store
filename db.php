<?php
    $host="localhost";
    $user="root";
    $password="";
    $dbname="devstore";
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf-8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION)
    }catch (PDOEception $e){
        die("Falha na conexão: ". $e->getMessage());
    }
?>