<?php
include_once("../vendor/autoload.php");

if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else
    include_once("partials/public-header.php");


?>

<!-- HEADER start -->
<header class="bg-dark text-success py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1> Muito prazer, essa é a equipe por trás desse sistema.</h1>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->



<section class="container mt-5 push-footer ">
    <div class="row my-5">

            <img src="../uploads/download.jpeg" alt="" class=" about-us-img  my-auto mx-auto">
        <div class="col-md-9">
            <div class="card m-3">
                <div class="card-body">
                    <h3 class="display-6 text-danger">El Mamaco Escritor</h3>
                    <hr>
                    <p class="lead">Todos do time já avisaram que não se escreve "mamaco", mas depois de tantos surtos de raiva dele, nós simplesmente desistimos de tentar.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">

            <img src="../uploads/crianca.jpg" alt="" class=" about-us-img  my-auto mx-auto">
        <div class="col-md-9">
            <div class="card m-3">
                <div class="card-body">
                    <h3 class="display-6 text-danger">A criança</h3>
                    <hr>
                    <p class="lead">Ninguém sabe o nome dele, e ninguém se atreve a perguntar... Não se engane por esses olhinhos, se ele olhar nos seus, é capaz de ler os mais profundos segredos da sua alma!!!</p>
                </div>
            </div>
        </div>

    </div>
    <div class="row my-5">

        <img src="../uploads/eu.jpg" alt="" class=" about-us-img  my-auto mx-auto">
        <div class="col-md-9">
            <div class="card m-3">
                <div class="card-body">
                    <h3 class="display-6 text-danger">O Intruso</h3>
                    <hr>
                    <p class="lead">Esse cara insiste em dizer que fez alguma coisa nesse site, mas nós nunca vimos ele aqui. "Eu programei tudo sozinho em casa!!!", ele fica dizendo. Coitado, talvez um dia a gente acredite.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once("partials/footer.php") ?>