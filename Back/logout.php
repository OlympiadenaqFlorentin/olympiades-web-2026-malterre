<?php
session_start();

$_SESSION = [];

session_destroy();

header('Location: ../Front/login.php');
exit;
?>