<?php


session_start();
$_SESSION = array();
session_destroy();

$bdd = NULL;

header('Location: index.php?page=IndexMain');


?>