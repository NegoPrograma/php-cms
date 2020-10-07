<?php
include_once("../vendor/autoload.php");
session_start();
//if (isset($_SESSION['isAdmin']))
//  include_once("views/partials/admin-header.php");
//else
include_once("partials/public-header.php");


?>

<!-- HEADER start -->
<!-- py,px,pl,pr,pb,pt. padding no eixo y(top e bottom) e no eixo x (right e left), ou individualmente
logo após vem um hifén e o valor do padding desejado. -->
<header class="bg-warning  py-3 mb-5">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-6">Bem vindo de volta, adminstrador.</h1>
            </div>
        </div>
    </div>

</header>
<!-- HEADER end -->

<!-- CONTENT -->
<div class="container col-md-8  push-footer">
    <div class="offset-lg-1 col-lg-10">
        <form action="../routes/login.php" method="post">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Login.</h2>
                </div>
                <div class="card-body bg-primary">
                    <div class="form-group">
                        <div class="row my-1">
                            <div class="col-md-12 mt-1">
                                <label for="username" class="text-white">Username</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="Digite o seu nome de usuário." required>
                            </div>
                        </div>


                        <div class="row my-1">
                            <div class="col-md-12 mt-1">
                                <label for="password" class="text-white">Senha</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Digite sua senha." required>
                            </div>

                            <div class="mx-auto col-lg-6">
                                <button class="btn btn-dark btn-block mt-3 " type="submit">Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END CONTENT -->
<?php include_once("partials/footer.php"); ?>