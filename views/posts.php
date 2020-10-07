<?php
include_once("../vendor/autoload.php");
include_once("partials/admin-header.php");
include_once("../routes/getPosts.php");
?>
<!--CONTENT-->
<!-- HEADER start -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><span class="fa fa-list"></span> Postagens.</h1>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./new-post.php" class="btn btn-primary btn-block">
                    <span class="fa fa-edit"></span> Nova postagem.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./new-category.php" class="btn btn-info btn-block">
                    <span class="fa fa-plus"></span> Nova categoria.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./new-admin.php" class="btn btn-warning btn-block">
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
<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead class='thead-dark'>
                    <th>#</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Data de criação</th>
                    <th>Autor</th>
                    <th>Banner</th>
                    <th>Comentários</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <td>#</td>
                            <td><?php echo substr($post['title'],0,15) . "..." ?></td>
                            <td><?php echo $post['category'] ?></td>
                            <td><?php echo $post['datetime'] ?></td>
                            <td><?php echo $post['author'] ?></td>
                            <td><img class=" post-table-img " src="<?php echo "../uploads/" . $post['image'] ?>" alt="imagem indisponível"></td>
                            <td>Comments</td>
                            <td>
                                <a href="./edit-post.php?id=<?php echo $post['id']?>" class="btn btn-block  btn-warning">Editar</a>
                                <a href="../routes/deletePost.php?id=<?php echo $post['id']?>" class="btn btn-block btn-danger">Deletar</a>
                                <a href="./single-post.php?id=<?php echo $post['id']?>" class="btn btn-block btn-primary">Ler post</a>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!--CONTENT END-->
<?php include_once("./partials/footer.php") ?>