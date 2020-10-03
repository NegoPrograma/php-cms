<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Index</title>
</head>
<body>
<!--CONTENT-->
<nav class="navbar navbar-expand-lg  bg-dark">
    <!--Containers são divs que pegam cerca de 80% da tela, com margem centralizada.-->
    <div class="container">
        <a href="#" class="navbar-brand">O Web Pedreiro©</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapse">
        <span class="toggle-menu">Menu</span></button>
        <div class="collapse navbar-collapse" id="navbarcollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="views/profile.php" class="nav-link"><i class="fa fa-user text-success"></i>Perfil</a>
        </li>
        <li class="nav-item">
            <a href="views/dashboard.php" class="nav-link">Quadro Adminstrativo</a>
        </li>
        <li class="nav-item">
            <a href="views/posts.php" class="nav-link">Posts</a>
        </li>
        <li class="nav-item">
            <a href="views/categories.php" class="nav-link">Categorias</a>
        </li>
        <li class="nav-item">
            <a href="views/admins.php" class="nav-link">Adminstradores</a>
        </li>
        <li class="nav-item">
            <a href="views/comments.php" class="nav-link">Comentários</a>
        </li>
        <li class="nav-item ml-auto"><a href="views/logout.php" class="nav-link text-danger"><i class="fa fa-user-times "></i>logout</a></li>
    </ul>
    </nav>
    <!--Navbar ended.-->