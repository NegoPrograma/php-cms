<?php


if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['admin']))
   include_once("./partials/admin-header.php");
else
   include_once("./partials/public-header.php");

include_once("../vendor/autoload.php");
include_once("../routes/getCategories.php");
include_once("../routes/getPosts.php");
include_once("../routes/getPostsByCategory.php");
//paginação do index.
$totalPostPerPage = 5;

$page=null;
$totalPosts = count($postsByCategory);

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
                    <img class="image-fluid card-img-top post-header-img" src="<?php echo "../uploads/". $postsByCategory[$i]['image']?>" alt="">
                    <div class="card-header ">
                    <? echo $postsByCategory[$i]['id']?>
                    
                <h3 class="card-title ">
                    <?php echo $postsByCategory[$i]['title'];?> 
                    <a class="btn btn-info btn-small" href="./post-search-by-category.php?page=1&category=<?php echo $postsByCategory[$i]['category'];?>"><?php echo $postsByCategory[$i]['category'];?></a>
                </h3>
            </a>
                        <small class="text-muted">Escrito por <?php echo $postsByCategory[$i]['author'].", ".$postsByCategory[$i]['datetime'].".";?>
                        
                    </small>
     
                    <span class="badge post-card-badge"><?php echo $postsByCategory[$i]['approved_comments'];?> comentários</span>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><?php echo htmlentities(substr($postsByCategory[$i]['content'],0,100)."...");?></p>
                        <a href="<?php echo './single-post.php?id='.$postsByCategory[$i]["id"];?>" class="btn btn-warning">Ler mais</a>
                    </div>
                </div>
            <? endfor; ?>


            <!--Dynamic pagination-->
            <?php echo showPages($page,$totalPages,$_GET['category'])?>
        </div>
        <div class="col-sm-4 ">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="../assets/images/sidebanner.png" alt="" class="d-block img-fluid mb-3">
                        <div class="text-center">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus non beatae fugiat magnam doloremque quibusdam qui ratione, alias officia, esse placeat vero porro? Adipisci porro minima incidunt omnis, repellat quia.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique ab voluptatem unde dicta porro. Voluptatem, impedit possimus, ex nemo, vero asperiores quisquam quaerat enim veniam dolore ducimus? Optio.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae aliquam laborum error nisi, maiores aperiam neque ea vel assumenda? Soluta fugiat suscipit in itaque mollitia quibusdam dolorum dolores, tenetur ea?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ex hic earum iure tempora perferendis, ullam iste fugit assumenda vitae ipsa odit deleniti consequuntur quod sed dolor magni culpa corrupti?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-dark text-light">
                        <h2 class="lead">Faça sua assinatura!</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-block text-center text" name="button">Registrar-se</button>
                        <a  href="./login.php"><button class="btn mt-3 btn-primary btn-block text-center text" name="button">Login</button></a>
                    </div>

                <div class="card my-4">
                    <div class="card-header bg-dark text-light">
                        <h2 class="lead">Tags de postagem</h2>
                        </div>
                    <div class="card-body">
                    <?php foreach($categories as $category):?>
                        <a class="badge badge-primary" href="./post-search-by-category.php?page=1&category=<?php echo $category['name'];?>"><?php echo $category['name'];?></a>
                        <?endforeach;?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-warning">
                        <h2 class="lead">Postagens recentes</h2>
                    </div>
                    <div class="card-body">
                    <?php for($i = 0; $i < 5; $i++): ?>
                <div class="media my-2">
                    <img src="<?php echo "../uploads/". $posts[$i]['image']?>" alt="" class="d-block img-fluid image-list-limit align-self-start">
                    <div class="media-body ml-2">
                        <a href="<?php echo './single-post.php?id='.$posts[$i]["id"];?>" target="_blank" class="btn-link" ><? echo $posts[$i]['title']?>, </a>
                        <small><? echo $posts[$i]['datetime']?></small>
                    </div>
                </div>
                <hr>
                <?endfor;?>
                    </div>
                </div>

        </div>
    </div>
</section>


<!-- END CONTENT -->
<?php include_once("./partials/footer.php"); ?>