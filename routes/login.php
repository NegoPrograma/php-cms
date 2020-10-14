<?php
include_once("../vendor/autoload.php");
Use Controller\AdminController;
if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

$adminController = new AdminController($_POST['username'],"",$_POST['password'],"");
$result = $adminController->login();
if($result){
    $_SESSION['admin'] = $result;
    header("location: ../index.php");
}
else
    $adminController->loginFailed();
?>