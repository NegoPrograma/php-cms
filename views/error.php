<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/php-cms/assets/css/style.css">
    <title>Erro encontrado!</title>
</head>
<body>
    <h1 class="alert alert-danger">Operação falhou!</h1>

    <? foreach ($this->getMessages() as $message):?>
        <p class="alert alert-danger my-3"><?php echo $message?></p>
    <? endforeach ?>    
    


    <a class="btn btn-warning"href=<?php echo $this->getPrevious_Link() ?>>Retornar à página anterior.</a>
</body>
</html>