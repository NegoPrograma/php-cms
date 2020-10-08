<?php
session_start();
include_once("../vendor/autoload.php");
include_once("../routes/getPosts.php");
include_once("../routes/getCategories.php");
include_once("../routes/getAdmins.php");
include_once("../routes/getComments.php");

if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else {
    header("location:login.php");
}

//em caso de ter menos de 5 postagens existentes.
$limit = 5;
if (count($posts) < $limit)
    $limit = count($posts);
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
            <div class="card text-center bg-dark text-white dashboard-posts-border">
                <div class="card-body">
                    <h1 class="lead ">Postagens</h1>
                    <h4 class="display-5">
                        <span class="fa fa-book"></span>
                        <?php echo count($posts) ?>
                    </h4>
                </div>
            </div>
            <div class="card text-center bg-dark text-white my-5 dashboard-categories-border">
                <div class="card-body">
                    <h1 class="lead">Categorias</h1>
                    <h4 class="display-5">
                        <span class="fa fa-folder"></span>
                        <?php echo count($categories) ?>
                    </h4>
                </div>
            </div>

            <div class="card text-center bg-dark text-white my-5 dashboard-admins-border">
                <div class="card-body">
                    <h1 class="lead">Admins</h1>
                    <h4 class="display-5">
                        <span class="fa fa-users"></span>
                        <?php echo count($admins) ?>
                    </h4>
                </div>
            </div>


            <div class="card text-center bg-dark text-white my-5 dashboard-comments-border">
                <div class="card-body">
                    <h1 class="lead">Comentários</h1>
                    <h4 class="display-5">
                        <span class="fa fa-comments"></span>
                        <?php echo count($comments) ?>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-lg-10">

            <table class="table table-responsive table-hover">
                <thead class='thead-dark'>
                    <th>Posts recentes</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Data de criação</th>
                    <th>Autor</th>
                    <th>Banner</th>
                    <th>Comentários</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $limit; $i++) : ?>
                        <tr>
                            <td><?php echo $posts[$i]['id'] ?></td>
                            <td><?php echo substr($posts[$i]['title'], 0, 15) . "..." ?></td>
                            <td><?php echo $posts[$i]['category'] ?></td>
                            <td><?php echo $posts[$i]['datetime'] ?></td>
                            <td><?php echo $posts[$i]['author'] ?></td>
                            <td><img class=" post-table-img " src="<?php echo "../uploads/" . $posts[$i]['image'] ?>" alt="imagem indisponível"></td>
                            <td><span class="badge badge-success">aprovados: <?php echo $posts[$i]['approved_comments']?></span>
                            <span class="badge badge-danger">reprovados: <?php echo $posts[$i]['unapproved_comments']?></span></td>
                            <td>
                                <a href="./edit-post.php?id=<?php echo $posts[$i]['id'] ?>" class="btn btn-block  btn-warning">Editar</a>
                                <a href="../routes/deletePost.php?id=<?php echo $posts[$i]['id'] ?>" class="btn btn-block btn-danger">Deletar</a>
                                <a href="./single-post.php?id=<?php echo $posts[$i]['id'] ?>" target="_blank" class="btn btn-block btn-primary">Ler post</a>
                            </td>
                            <td>

                            </td>
                        </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!--CONTENT END-->
<?php include_once("./partials/footer.php") ?>