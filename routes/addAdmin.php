<?php
include_once("../vendor/autoload.php");
Use Controller\AdminController;

$adminController = new AdminController($_POST['username'],$_POST['nickname'],$_POST['password'],$_POST['password-confirm']);
if($adminController->validateAdmin())
    $adminController->setAdmin();
?>