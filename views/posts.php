<?php
include_once("../vendor/autoload.php");
include_once("../routes/getPosts.php");
if (session_status() != PHP_SESSION_ACTIVE)
    session_start();
if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else {
    header("location:login.php");
}


//paginação do index.
$totalPostPerPage = 5;
$page=null;
$totalPosts = count($posts);
$totalPages = $totalPosts/$totalPostPerPage;
$filter = [];
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
    $result ="  <a class=\"btn btn-warning  col-sm-1 ml-5 my-2 \" href=\"./posts.php?page=$before\"> << </a> ";
    if($page <= 2){
        $result  ="<a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./posts.php?page=1\">1</a>";
        for ($i=2; $i < $totalPages && $i <= 5 ; $i++) { 
            $result  .="<a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./posts.php?page=$i\">$i</a>";
        }
    }else if($page > $totalPages){
            $result = "<h1>Página não existente.</h1>";
            $result .= "<a class=\"btn btn-warning \" href=\"./posts.php?page=1\">Voltar a página inicial.</a>";
            return $result;
    }else{
        $result  .="<a class=\"btn btn-warning col-sm-1 ml-5 mx-1 my-2 \" href=\"./posts.php?page=$min\">$min</a>";
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./posts.php?page=$before\">$before</a> ";
        $result .=" <a class=\"btn btn-primary col-sm-1 mx-1 my-2 \" href=\"./posts.php?page=$page\"> $page</a> ";
        if($page+1 <= $totalPages)
            $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./posts.php?page=$after\"> $after</a> ";
        if($page+2 <= $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 mx-1 my-2 \" href=\"./posts.php?page=$max\"> $max</a> ";
    }
    if($page < $totalPages)
        $result .=" <a class=\"btn btn-warning col-sm-1 ml-5 my-2 \" href=\"./posts.php?page=$after\"> >> </a> ";
    return $result;
}


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
                <a href="./categories.php" class="btn btn-info btn-block">
                    <span class="fa fa-plus"></span> Nova categoria.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./admins.php" class="btn btn-warning btn-block">
                    <span class="fa fa-user-plus"></span> Adicionar novo adm.</a>
            </div>
            <div class="col-lg-3 mt-2">
                <a href="./comments.php" class="btn btn-success btn-block">
                    <span class="fa fa-check"></span> Aprovar comentários.</a>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->
<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-responsive table-hover">
                <thead class='thead-dark'>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Data de criação</th>
                    <th>Autor</th>
                    <th>Banner</th>
                    <th>Comentários</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                <?php for($i = 0;$i < $totalPostPerPage && $start < $totalPosts;$i++,$start++ ): ?>
                        <tr>
                            <td><?php echo $posts[$start]['id'] ?></td>
                            <td><?php echo substr($posts[$start]['title'], 0, 15) . "..." ?></td>
                            <td><?php echo $posts[$start]['category'] ?></td>
                            <td><?php echo $posts[$start]['datetime'] ?></td>
                            <td><?php echo $posts[$start]['author'] ?></td>
                            <td><img class=" post-table-img " src="<?php echo "../uploads/" . $posts[$start]['image'] ?>" alt="imagem indisponível"></td>
                            <td><span class="badge badge-success">Aprovados: <?php echo $posts[$start]['approved_comments'] ?></span>
                                <span class="badge badge-danger">Ocultados: <?php echo $posts[$start]['unapproved_comments'] ?></span>
                            </td>
                            <td>
                                <a href="./edit-post.php?id=<?php echo $posts[$start]['id'] ?>" class="btn btn-block  btn-warning">Editar</a>
                                <a href="../routes/deletePost.php?id=<?php echo $posts[$start]['id'] ?>" class="btn btn-block btn-danger">Deletar</a>
                                <a href="./single-post.php?id=<?php echo $posts[$start]['id'] ?>" target="_blank" class="btn btn-block btn-primary">Ler post</a>
                            </td>

                            </td>
                        </tr>
                <?php endfor; ?>
                </tbody>
            </table>
            <?php  echo showPages($page,$totalPages)?>
        </div>
    </div>
</section>


<!--CONTENT END-->
<?php include_once("./partials/footer.php") ?>