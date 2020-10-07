<?php
include_once("../vendor/autoload.php");
Use Controller\AdminController;
session_start();
$adminController = new AdminController($_POST['username'],"",$_POST['password'],"");
$_SESSION['admin'] = $adminController->login();
if($_SESSION['admin'] != null)
    header("location: ../index.php");
else
    $adminController->loginFailed();
?>