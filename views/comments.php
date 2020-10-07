<?php
include_once("../vendor/autoload.php");
include_once("../routes/getComments.php");

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
        <h1 class="display-4"><span class="fa fa-comments"></span> Adminstre os comentários.</h1>
    </div>
</header>
<!-- HEADER end -->
<section class="container  ">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Comentários esperando aprovação:</h2>
            <table class="table">
                <thead class="thead-dark">
                    <th>Autor</th>
                    <th>Data de criação</th>
                    <th>Comentário</th>
                    <th>Ações</th>
                    <th>Postagem</th>
                </thead>
                <tbody>

                <?php foreach($comments as $comment): ?>
                    <?php if($comment['status'] == 0): ?>
                    <tr>
                    <td><?php echo substr($comment['name'],0,15)."...";?></td>
                        <td><?php echo $comment['datetime']?></td>
                        <td><?php echo substr($comment['content'],0,20)."..";?></td>
                        <td>
                                <a href="../routes/approveComment.php?id=<?php echo $comment['id']?>" class="btn btn-block  btn-success">Aprovar</a>
                                <a href="../routes/deleteComment.php?id=<?php echo $comment['id']?>" class="btn btn-block btn-danger">Deletar</a>
                            </td>
                            <td><a href="./single-post.php?id=<?php echo $comment['post_id']?>" target="_blank" class="btn btn-block btn-primary">Ir</a></td>
                    </tr>
                    <?endif;?>
                <? endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>Comentários aprovados:</h2>
            <table class="table ">
                <thead class="thead-dark">
                    <th>Autor</th>
                    <th>Data de criação</th>
                    <th>Comentário</th>
                    <th>Ações</th>
                    <th>Postagem</th>
                </thead>
                <tbody>

                <?php foreach($comments as $comment): ?>
                    <?php if($comment['status'] == 1): ?>
                    <tr>
                        <td><?php echo substr($comment['name'],0,15)."...";?></td>
                        <td><?php echo $comment['datetime']?></td>
                        <td><?php echo substr($comment['content'],0,20)."..";?></td>
                        <td>
                                <a href="../routes/disapproveComment.php?id=<?php echo $comment['id']?>" class="btn btn-block  btn-warning">Ocultar</a>
                                <a href="../routes/deleteComment.php?id=<?php echo $comment['id']?>" class="btn btn-block btn-danger">Deletar</a>
                            </td>
                            <td><a href="./single-post.php?id=<?php echo $comment['post_id']?>" target="_blank" class="btn btn-block btn-primary">Ir</a></td>
                    </tr>
                    <?endif;?>
                <? endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!--CONTENT END-->
<?php include_once("./partials/footer.php") ?>