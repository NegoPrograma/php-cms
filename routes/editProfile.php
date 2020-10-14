<?php
session_start();
include_once("../vendor/autoload.php");
Use Controller\AdminController;

$adminController = new AdminController();
$adminController->validateProfileEditing($_POST['nickname'],
$_POST['occupation'],
$_FILES['image']['name'],
$_POST['bio'],
$_SESSION['admin']['id']);
?>