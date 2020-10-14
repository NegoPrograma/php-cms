<?php
include_once("../vendor/autoload.php");
if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else {
    header("location:login.php");
}
$image = "default-user-image.png";
if($_SESSION['admin']['profile_image'] != $image)
    $image =$_SESSION['admin']['profile_image'];


?>

<!-- HEADER start -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><span class="fa fa-user"></span>Perfil de
                    <?echo $_SESSION['admin']['nickname']?>.</h1>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->



<section class="container py-2 mt-4 mb-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h3>
                        <?echo $_SESSION['admin']['username']?>
                    </h3>
                </div>
                <div class="card-body">
                    <img src="../uploads/<?php echo $image?>" alt="" class="block img-fluid mb-3">
                    <small><?php echo $_SESSION['admin']['occupation']?></small>
                    <p><?php echo $_SESSION['admin']['bio']?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
        <div class="card text-dark">
                <div class="card-header bg-dark text-light">
                    <h4 class="display-4 text-warning">Editar Perfil</h4>
                </div>
                <div class="card-body ">
                    <form action="../routes/editProfile.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <p>Novo Apelido</p>
                            <input class="form-control " type="text" name="nickname" value="<?php echo $_SESSION['admin']['nickname']?>"placeholder="Novo apelido">
                        </div>

                        <div class="form-group">
                            <p>O que você faz?</p>
                            <input class="form-control" type="text" name="occupation" value="<?php echo $_SESSION['admin']['occupation']?>" placeholder="Seu foco principal. e.g: escritor, engenheiro, programador... etc.">

                            <span class="text-danger">Não aceitamos mais que 50 caractéres.</span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                            <div class="custom-file">
                                <label class="form-control  custom-file-label" for="image">Foto de perfil: </label>
                                <input class="form-control custom-file-input" type="file" name="image" id="image">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <small>Imagem atual:</small>
                                <img class="image-list-limit" src="<?php echo "../uploads/".$image;?>" alt="">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bio">Sua descrição:</label>
                            <textarea name="bio" id="bio" class="form-control textarea"  placeholder="Escreva um pouco sobre você."><?php echo $_SESSION['admin']['bio'];
                            ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <a class="btn btn-warning btn-block mt-3" href="/php-cms/views/dashboard.php"><span class="fa fa-arrow-left"></span>Voltar ao quadro adminstrativo</a>
                            </div>

                            <div class="col-lg-6">
                                <button class="btn btn-success btn-block mt-3 " type="submit"><span class="fa fa-check"></span>Salvar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- 
<section class="container">
    <div class="row">

        <div class="offset-md-1 col-md-10 my-5">

            <div class="card text-dark">
                <div class="card-header bg-dark text-light">
                    <h4 class="display-4 text-warning">Editar Perfil</h4>
                </div>
                <div class="card-body ">
                    <form action="../routes/editProfile.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <p>Novo Apelido</p>
                            <input class="form-control " type="text" name="nickname" value="<?php echo $_SESSION['admin']['nickname']?>"placeholder="Novo apelido">
                        </div>

                        <div class="form-group">
                            <p>O que você faz?</p>
                            <input class="form-control" type="text" name="occupation" value="<?php echo $_SESSION['admin']['occupation']?>" placeholder="Seu foco principal. e.g: escritor, engenheiro, programador... etc.">

                            <span class="text-danger">Não aceitamos mais que 50 caractéres.</span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                            <div class="custom-file">
                                <label class="form-control  custom-file-label" for="image">Foto de perfil: </label>
                                <input class="form-control custom-file-input" type="file" name="image" id="image">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <small>Imagem atual:</small>
                                <img class="image-list-limit" src="<?php echo "../uploads/".$image;?>" alt="">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bio">Sua descrição:</label>
                            <textarea name="bio" id="bio" class="form-control textarea"  placeholder="Escreva um pouco sobre você."><?php echo $_SESSION['admin']['bio'];
                            ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <a class="btn btn-warning btn-block mt-3" href="/php-cms/views/dashboard.php"><span class="fa fa-arrow-left"></span>Voltar ao quadro adminstrativo</a>
                            </div>

                            <div class="col-lg-6">
                                <button class="btn btn-success btn-block mt-3 " type="submit"><span class="fa fa-check"></span>Salvar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section> -->


<?php include_once("partials/footer.php") ?>