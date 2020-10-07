<?php

session_start();
if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else {
    header("location: login.php");
}
?>


<!-- CONTENT -->
<!-- HEADER start -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><span class="fa fa-user"></span> Adicionar novo adminstrador.</h1>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->
<section class="container py-2 mb-4">
    <div class="row">
        <!--offset é a propriedade que define de onde exatamente o bootstarp começa a contar e separar as colunas -->
        <div class="offset-lg-1 col-lg-10">
            <form action="../routes/addAdmin.php" method="post">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h2>Preencha os dados necessários.</h2>
                    </div>
                    <div class="card-body bg-primary">
                        <div class="form-group">
                            <div class="row my-1">
                                <div class="col-md-6 mt-1">
                                    <label for="username" class="text-white">Username</label>
                                    <input class="form-control" type="text" name="username" id="username" placeholder="Digite o seu nome de usuário." required>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="nickname" class="text-white">Apelido <small class="small text-dark">(opcional)</small></label>
                                    <input class="form-control" type="text" name="nickname" id="nickname" placeholder="Nome a ser exibido ao público.">
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-md-6 mt-1">
                                    <label for="password" class="text-white">Senha</label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Digite sua senha." required>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="password-confirm" class="text-white">Confirme sua senha.</label>
                                    <input class="form-control" type="password" name="password-confirm" id="password-confirm" placeholder="Confirme sua senha." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-warning btn-block mt-3" href="/php-cms/views/dashboard.php"><span class="fa fa-arrow-left"></span>Voltar ao quadro adminstrativo</a>
                                </div>

                                <div class="col-lg-6">
                                    <button class="btn btn-success btn-block mt-3 " type="submit"><span class="fa fa-check"></span>Salvar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- END CONTENT -->
<?php include_once("partials/footer.php") ?>