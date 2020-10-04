<?php

session_start();
if (isset($_SESSION['isAdmin']))
    include_once("./views/partials/admin-header.php");
else
    include_once("./views/partials/public-header.php");

?>


<!-- CONTENT -->
<!-- HEADER start -->
<!-- py,px,pl,pr,pb,pt. padding no eixo y(top e bottom) e no eixo x (right e left), ou individualmente
logo após vem um hifén e o valor do padding desejado. -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Bem vindo(a) ao meu blog!</h1>
            </div>
        </div>
    </div>

</header>
<!-- HEADER end -->

<!-- END CONTENT -->
<?php include_once("./views/partials/footer.php") ?>