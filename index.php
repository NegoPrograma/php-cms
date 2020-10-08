<?php
if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['admin']))
   include_once("views/partials/admin-header.php");
else
   include_once("views/partials/public-header.php");

include_once("./vendor/autoload.php");
include_once("./routes/getPosts.php");
//paginação do index.
$totalPostPerPage = 5;
$page=null;
$totalPosts = count($posts);
$totalPages = $totalPosts/$totalPostPerPage;
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page < 1)
        $page = 1;
    $start = $totalPostPerPage*$page-1;
}else{
    $start = 0;
}


function showPages($page,$totalPages){
    $before = $page-1;
    $after = $page+1;
    $min = $page-2;
    $max = $page+2;
    $result ="  <a class=\"btn btn-warning  col-sm-1 ml-5 my-2 \" href=\"./index.php?page=$before\"> << </a> ";
    if($page <= 2){
        $result  ="<a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./index.php?page=1\">1</a>";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=2\">2</a> ";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=3\">3</a> ";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=4\">4</a> ";
        $result .= "<a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=5\">5</a> ";
    }else if($page > $totalPages){
            $result = "<h1>Página não existente.</h1>";
            $result .= "<a class=\"btn btn-warning \" href=\"./index.php?page=1\">Voltar a página inicial.</a>";
            return $result;
    }else{
        $result  .="<a class=\"btn btn-warning col-sm-1 ml-5 mx-1 my-2 \" href=\"./index.php?page=$min\">$min</a>";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$before\">$before</a> ";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$page\"> $page</a> ";
        if($page+1 <= $totalPages)
            $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$after\"> $after</a> ";
        if($page+2 <= $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$max\"> $max</a> ";
    }
    if($page < $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./index.php?page=$after\"> >> </a> ";
    return $result;
}

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
            <?php for($i = 0;$i < $totalPostPerPage&& $start < $totalPosts;$i++,$start++ ): ?>
                <div class="card my-4">
                    <img class="image-fluid card-img-top post-header-img" src="<?php echo "./uploads/". $posts[$start]['image']?>" alt="">
                    <div class="card-header ">
                    <? echo $posts[$start]['id']?>
                    <form class="form-inline" action="./" method="post">
                <h3 class="card-title ">
                    <?php echo $posts[$start]['title'];?> <button class="btn btn-info btn-small" name="query" value="<?php echo $posts[$start]['category'];?>"><?php echo $posts[$start]['category'];?></button>
                </h3>
                </form>
                        <small class="text-muted">Escrito por <?php echo $posts[$start]['author'].", ".$posts[$start]['datetime'].".";?>
                        
                    </small>
     
                    <span class="badge post-card-badge"><?php echo $posts[$start]['approved_comments'];?> comentários</span>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><?php echo substr($posts[$start]['content'],0,100)."...";?></p>
                        <a href="<?php echo './views/single-post.php?id='.$posts[$start]["id"];?>" class="btn btn-warning">Ler mais</a>
                    </div>
                </div>
            <? endfor; ?>


            <!--Dynamic pagination-->
            <?php echo showPages($page,$totalPages)?>
        </div>
        <div class="col-sm-4 ">

        </div>
    </div>
</section>


<!-- END CONTENT -->
<?php include_once("views/partials/footer.php"); ?>