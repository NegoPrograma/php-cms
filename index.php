<?php
include_once("./vendor/autoload.php");
include_once("./routes/getPosts.php");
session_start();
//if (isset($_SESSION['isAdmin']))
  //  include_once("views/partials/admin-header.php");
//else
   include_once("views/partials/public-header.php");


?>

<!-- HEADER start -->
<!-- py,px,pl,pr,pb,pt. padding no eixo y(top e bottom) e no eixo x (right e left), ou individualmente
logo após vem um hifén e o valor do padding desejado. -->
<header class="bg-warning  py-3">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-6">Bem vindo(a) ao meu blog!</h1>
                <h2 class="lead">Muito conteúdo de qualidade... eu acho.</h2>
            </div>
        </div>
    </div>

</header>
<!-- HEADER end -->

<!-- CONTENT -->
<section class="container">
    <div class="row">
        <div class="col-sm-8 ">
            <?php foreach($posts as $post): ?>
                <div class="card my-4">
                    <img class="image-fluid card-img-top post-header-img" src="<?php echo "./uploads/". $post['image']?>" alt="">
                    <div class="card-header ">
                    
                    <form class="form-inline"action="./" method="post">
                <h3 class="card-title ">
                    <?php echo $post['title'];?> <button class="btn btn-info btn-small" name="query" value="<?php echo $post['category'];?>"><?php echo $post['category'];?></button>
                </h3>
                </form>
                        <small class="text-muted">Escrito por <?php echo $post['author'].", ".$post['datetime'].".";?>
                        
                    </small>
     
                    <span class="badge post-card-badge">20 comentários</span>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><?php echo substr($post['content'],0,100)."...";?></p>
                        <a href="<?php echo './php-cms/views/single-post?post_id='.$post["id"];?>" class="btn btn-warning">Ler mais</a>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <div class="col-sm-4 ">

        </div>
    </div>
</section>
<!-- END CONTENT -->
<?php include_once("views/partials/footer.php"); ?>