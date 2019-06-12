<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'Kujaku', 'test');
}
 catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>