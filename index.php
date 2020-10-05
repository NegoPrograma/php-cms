<?php
include_once("./vendor/autoload.php");
include_once("./routes/getPosts.php");
session_start();
if (isset($_SESSION['isAdmin']))
    include_once("views/partials/admin-header.php");
else
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
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $post['title'];?></h4>
                        <small>Escrito por <?php echo $post['author'].", ".$post['datetime'].".";?>
                    </small>
                        <hr>
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