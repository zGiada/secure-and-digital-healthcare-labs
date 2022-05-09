<?php
session_start();

require "Authenticator.php";
$user_id=$_POST['id_user'];
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: login.php");
    die();
}

if(empty($user_id)){
    header("location: login.php");
}

$Authenticator = new Authenticator();

$checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

if (!$checkResult) {
    $_SESSION['failed'] = true;
    header("location: login.php");
    die();
} 
?>