<?php


if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['admin']))
   include_once("views/partials/admin-header.php");
else
   include_once("views/partials/public-header.php");

include_once("./vendor/autoload.php");
include_once("./routes/getCategories.php");
include_once("./routes/getPosts.php");
//paginação do index.
$totalPostPerPage = 5;
$page=null;
$totalPosts = count($posts);
$totalPages = ceil($totalPosts/$totalPostPerPage);


if(isset($_POST['query'])){
    $totalPostPerPage = count($posts);
    
}

if($totalPostPerPage > $totalPosts){
    $totalPages = 1;
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page < 1 || !is_numeric($page))
        $page = 1;
    $start = $totalPostPerPage*($page-1);
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
        for ($i=2; $i < $totalPages && $i <= 5 ; $i++) { 
            $result  .="<a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./index.php?page=$i\">$i</a>";
        }
    }else if($page > $totalPages){
            $result = "<h1>Página não existente.</h1>";
            $result .= "<a class=\"btn btn-warning \" href=\"./index.php?page=1\">Voltar a página inicial.</a>";
            return $result;
    }else{
        $result  .="<a class=\"btn btn-warning col-sm-1 ml-5 mx-1 my-2 \" href=\"./index.php?page=$min\">$min</a>";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$before\">$before</a> ";
        $result .=" <a class=\"btn btn-primary col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$page\"> $page</a> ";
        if($page+1 <= $totalPages)
            $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$after\"> $after</a> ";
        if($page+2 <= $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./index.php?page=$max\"> $max</a> ";
    }
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
            <?php if(isset($_POST['query'])) echo "<h1 class=\"display-3\">Resultado:</h1><br><br>";?>
            <?php for($i = 0;$i < $totalPostPerPage && $start < $totalPosts;$i++,$start++ ): ?>
                <div class="card my-4">
                    <img class="image-fluid card-img-top post-header-img" src="<?php echo "./uploads/". $posts[$start]['image']?>" alt="">
                    <div class="card-header ">
                    <?php echo $posts[$start]['id']?>
                    
                <h3 class="card-title ">
                    <?php echo $posts[$start]['title'];?> 
                    <a class="btn btn-info btn-small" href="./views/post-search-by-category.php?page=1&category=<?php echo $posts[$start]['category'];?>"><?php echo $posts[$start]['category'];?></a>
                </h3>
            </a>
                        <p class="text-muted">Escrito por <a class="text-primary" href="views/profile.php?username=<?php echo $posts[$start]['author']?>"><?php echo $posts[$start]['author']?></a>, <?php echo$posts[$start]['datetime'].".";?>
                        
            </p>
     
                    <span class="badge post-card-badge"><?php echo $posts[$start]['approved_comments'];?> comentários</span>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><?php echo htmlentities(substr($posts[$start]['content'],0,50)."...");?></p>
                        <a href="<?php echo './views/single-post.php?id='.$posts[$start]["id"];?>" class="btn btn-warning">Ler mais</a>
                    </div>
                </div>
            <?php endfor; ?>


            <!--Dynamic pagination-->
            <?php if(!isset($_POST['query'])) echo showPages($page,$totalPages)?>

            <?php if(isset($_POST['query'])) echo "<a class=\"btn btn-warning \" href=\"./index.php?page=1\">Voltar a página inicial.</a>";?>
        </div>

        <div class="col-sm-4 ">
                <div class="card mt-4 my-4">
                    <div class="card-body">
                        <img src="assets/images/sidebanner.png" alt="" class="d-block img-fluid mb-3">
                        <div class="text-center">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus non beatae fugiat magnam doloremque quibusdam qui ratione, alias officia, esse placeat vero porro? Adipisci porro minima incidunt omnis, repellat quia.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique ab voluptatem unde dicta porro. Voluptatem, impedit possimus, ex nemo, vero asperiores quisquam quaerat enim veniam dolore ducimus? Optio.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae aliquam laborum error nisi, maiores aperiam neque ea vel assumenda? Soluta fugiat suscipit in itaque mollitia quibusdam dolorum dolores, tenetur ea?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ex hic earum iure tempora perferendis, ullam iste fugit assumenda vitae ipsa odit deleniti consequuntur quod sed dolor magni culpa corrupti?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 my-4">
                    <div class="card-header bg-dark text-light">
                        <h2 class="lead">Faça sua assinatura!</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-block text-center text" name="button">Registrar-se</button>
                        <a  href="views/login.php"><button class="btn mt-3 btn-primary btn-block text-center text" name="button">Login</button></a>
                    </div>

                <div class="card mt-4">
                    <div class="card-header bg-dark text-light">
                        <h2 class="lead">Tags de postagem</h2>
                        </div>
                    <div class="card-body">
                    <?php foreach($categories as $category):?>
                        <a class="badge badge-primary" href="./views/post-search-by-category.php?page=1&category=<?php echo $category['name'];?>"><?php echo $category['name'];?></a>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header bg-warning">
                        <h2 class="lead">Postagens recentes</h2>
                    </div>
                    <div class="card-body">
                        <?php if($recentPosts == []) $recentPosts = $posts;?>
                    <?php for($i = 0; $i < 5 && $i < count($recentPosts); $i++): ?>
                <div class="media my-2">
                    <img src="<?php echo "./uploads/". $recentPosts[$i]['image']?>" alt="" class="rounded-circle d-block img-fluid image-list-limit align-self-start">
                    <div class="media-body ml-2">
                        <a href="<?php echo './views/single-post.php?id='.$recentPosts[$i]["id"];?>" target="_blank" class="btn-link" ><?php echo $recentPosts[$i]['title']?>, </a>
                        <small><?php echo $recentPosts[$i]['datetime']?></small>
                    </div>
                </div>
                <hr>
                <?php endfor;?>
                    </div>
                </div>

        </div>
    </div>
</section>


<!-- END CONTENT -->
<?php include("views/partials/footer.php"); ?>
