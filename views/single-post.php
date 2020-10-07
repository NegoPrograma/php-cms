<?php
include_once("../vendor/autoload.php");
include_once("../routes/getPost.php");
include_once("../routes/getComments.php");
session_start();
if (isset($_SESSION['admin']))
   include_once("partials/admin-header.php");
else
   include_once("partials/public-header.php");


?>

<header class="bg-warning  py-3">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-6">Aproveite a leitura!</h1>
            </div>
        </div>
    </div>

</header>
<!-- HEADER end -->

<!-- CONTENT -->
<section class="container">
    <div class="row">
        <div class="col-sm-8 ">
            <div class="card my-4">
                <img class="image-fluid card-img-top post-header-img" src="<?php echo "../uploads/" . $post['image'] ?>" alt="">
                <div class="card-header ">

                    <form class="form-inline" action="../" method="post">
                        <h3 class="card-title ">
                            <?php echo $post['title']; ?> <button class="btn btn-info btn-small" name="query" value="<?php echo $post['category'];?>"><?php echo $post["category"]; ?></button>
                        </h3>
                    </form>
                    <small class="text-muted">Escrito por <?php echo $post['author'] . ", " . $post['datetime'] . "."; ?>

                    </small>

                    <span class="badge post-card-badge"> Qtd. de comentários: <?php echo count($comments)?></span>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $post['content']; ?></p>
                </div>
            </div>

            <div class="card my-3">
                <h3 class="card-header display-6">Comentários</h3>
                <?php foreach($comments as $comment): ?>
                <div class="card-body bg-dark">
                    <div class=" text-white my-2">
                        <div class="row">
                        <h6 class="lead col-md-12"><?php echo $comment['name']?>,<span class="text-primary small"><?php echo $comment['datetime']?></span></h6>
                        </div>
                        <p class="text"> <?php echo $comment['content']?></p>
                        
                    </div>
                </div>
                <? endforeach;?>
            </div>
<!--COMMENT -->


            <form action="../routes/addComment.php?id=<?php echo $post['id']; ?>" method="post">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Comente sua opinião!</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" placeholder="Seu nome" name="name" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Seu email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Comente aqui."cols="80" rows="8" name="comment" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </form>
            <!--COMMENT END-->
        </div>
        <div class="col-sm-4 ">

        </div>
    </div>
</section>


<!-- END CONTENT -->

<?php include_once("partials/footer.php"); ?>