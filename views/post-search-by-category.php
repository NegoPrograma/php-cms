<?php

use function PHPSTORM_META\type;

if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['admin']))
   include_once("./partials/admin-header.php");
else
   include_once("./partials/public-header.php");

include_once("../vendor/autoload.php");
include_once("../routes/getPostsByCategory.php");
//paginação do index.
$totalPostPerPage = 5;

$page=null;
$totalPosts = count($posts);

$totalPages = ceil($totalPosts/$totalPostPerPage);

if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page < 1 || !is_numeric($page))
        $page = 1;
    $i = $totalPostPerPage*($page-1);
}else{
    $i = 0;
}

function showPages($page,$totalPages,$category){
    $before = $page-1;
    $after = $page+1;
    $min = $page-2;
    $max = $page+2;
    $result ="  <a class=\"btn btn-warning  col-sm-1 ml-5 my-2 \" href=\"./post-search-by-category.php?page=$before&category=$category\"> << </a> ";
    if($page <= 2){
        $result  ="<a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">1</a>";
        for ($i=2; $i <= $totalPages && $i < 5 ; $i++) { 
            $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=$i&category=$category\">$i</a> ";
        }
        // $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">2</a> ";
        // $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">3</a> ";
        // $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">4</a> ";
        // $result .= "<a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">5</a> ";
    }else if($page > $totalPages){
            $result = "<h1>Página não existente.</h1>";
            $result .= "<a class=\"btn btn-warning \" href=\"./post-search-by-category.php?page=1&category=$category\">Voltar a página inicial.</a>";
            return $result;
    }else{
        $result  .="<a class=\"btn btn-warning col-sm-1 ml-5 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">$min</a>";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\">$before</a> ";
        $result .=" <a class=\"btn btn-primary col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=1&category=$category\"> $page</a> ";
        if($page+1 <= $totalPages)
            $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=$after&category=$category\"> $after</a> ";
        if($page+2 <= $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./post-search-by-category.php?page=$max&category=$category\"> $max</a> ";
    }
    if($page < $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./post-search-by-category.php?page=$after&category=$category\"> >> </a> ";
    return $result;
}

?>

<!-- HEADER i -->
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
            <?php for($limit = 0;$limit < $totalPostPerPage && $i < $totalPosts;$limit++,$i++ ): ?>
                <div class="card my-4">
                    <img class="image-fluid card-img-top post-header-img" src="<?php echo "../uploads/". $posts[$i]['image']?>" alt="">
                    <div class="card-header ">
                    <? echo $posts[$i]['id']?>
                    
                <h3 class="card-title ">
                    <?php echo $posts[$i]['title'];?> 
                    <a class="btn btn-info btn-small" href="./post-search-by-category.php?page=1&category=<?php echo $posts[$i]['category'];?>"><?php echo $posts[$i]['category'];?></a>
                </h3>
            </a>
                        <small class="text-muted">Escrito por <?php echo $posts[$i]['author'].", ".$posts[$i]['datetime'].".";?>
                        
                    </small>
     
                    <span class="badge post-card-badge"><?php echo $posts[$i]['approved_comments'];?> comentários</span>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><?php echo htmlentities(substr($posts[$i]['content'],0,100)."...");?></p>
                        <a href="<?php echo './single-post.php?id='.$posts[$i]["id"];?>" class="btn btn-warning">Ler mais</a>
                    </div>
                </div>
            <? endfor; ?>


            <!--Dynamic pagination-->
            <?php echo showPages($page,$totalPages,$_GET['category'])?>
        </div>
        <div class="col-sm-4 ">

        </div>
    </div>
</section>


<!-- END CONTENT -->
<?php include_once("./partials/footer.php"); ?>