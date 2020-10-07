<?php
include_once("../vendor/autoload.php");
include_once("../routes/getPosts.php");
session_start();
if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else {
    header("location:login.php");
}
?>
<!--CONTENT-->
<!-- HEADER start -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <h1 class="display-6"><span class="fa fa-cog text-warning"></span> Quadro Adminstrativo</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 mt-2">
                <a href="./new-post.php" class="btn btn-primary btn-block">
                    <span class="fa fa-edit"></span> Nova postagem.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./categories.php" class="btn btn-info btn-block">
                    <span class="fa fa-plus"></span> Nova categoria.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./admins.php" class="btn btn-warning btn-block">
                    <span class="fa fa-user-plus"></span> Adicionar novo adm.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./new-post.php" class="btn btn-success btn-block">
                    <span class="fa fa-check"></span> Aprovar comentários.</a>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->
<section class="container  my-4">
    <div class="row">
        <div class="col-lg-2">
            <div class="card text-center bg-dark text-white">
                <div class="card-body">
                    <h1 class="lead">Postagens</h1>
                    <h4 class="display-5">
                        <span class="fa fa-book"></span>
                        100
                    </h4>
                </div>
            </div>
            <div class="card text-center bg-dark text-white my-5">
                <div class="card-body">
                    <h1 class="lead">Categorias</h1>
                    <h4 class="display-5">
                        <span class="fa fa-folder"></span>
                        100
                    </h4>
                </div>
            </div>

            <div class="card text-center bg-dark text-white my-5">
                <div class="card-body">
                    <h1 class="lead">Admins</h1>
                    <h4 class="display-5">
                        <span class="fa fa-users"></span>
                        100
                    </h4>
                </div>
            </div>


        <div class="card text-center bg-dark text-white my-5">
                <div class="card-body">
                    <h1 class="lead">Comentários</h1>
                    <h4 class="display-5">
                        <span class="fa fa-comments"></span>
                        100
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
        </div>
    </div>
</section>


<!--CONTENT END-->
<?php include_once("./partials/footer.php") ?>