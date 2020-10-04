<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/php-cms/assets/css/style.css">
    <title>Index</title>
</head>
<body>
<!--CONTENT-->
<nav class="navbar navbar-expand-lg  bg-dark">
    <!--Containers são divs que pegam cerca de 80% da tela, com margem centralizada.-->
    <div class="container">
        <a href="/php-cms/index.php" class="navbar-brand">O Web Pedreiro©</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapse">
        <span class="toggle-menu">Menu</span></button>
        <div class="collapse navbar-collapse" id="navbarcollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="/php-cms/index.php" class="nav-link"><i class="fa fa-home"></i>Home</a>
        </li>
        <li class="nav-item">
            <a href="/php-cms/views/about-us.php" class="nav-link">Sobre Nós</a>
        </li>
        <li class="nav-item">
            <a href="/php-cms/views/contacts.php" class="nav-link">Contatos</a>
        </li>
        <li class="nav-item">
            <a href="/php-cms/views/features.php" class="nav-link">Features</a>
        </li>
        
    </ul>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline " action="" method="post">
                <input type="text" name="query" placeholder="buscar posts" class="form-control">
                <!--Apenas um dos botões é exibido de acordo com o tamanho da tela. -->
                <button class="btn btn-warning  d-none d-sm-block" type="submit"><span class="fa fa-search"></span></button>
                <button class="btn btn-warning  btn-block d-block d-sm-none" type="submit"><span class="fa fa-search"></span></button>
        </form>
    </ul>
    </nav>
    <!--Navbar ended.-->

  

    