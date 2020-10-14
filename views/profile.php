<?php
include_once("../vendor/autoload.php");
include_once("../routes/getAdmin.php");

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
                <h1><span class="fa fa-user"></span>Perfil de
                    <?echo $admin['nickname']?>.</h1>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->



<section class="container mt-5 push-footer ">
    <div class="row">
        <div class="col-md-3">
        
            <img src="../uploads/<?php echo $admin['profile_image'] ?>" alt="" class="block img-fluid mb-3 ">
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                <h3 class="display-6 text-danger"><?php echo $admin['occupation'] ?></h3>
                    <hr>
                <p class="lead"><?php echo $admin['bio'] ?></p>
                </div>
            </div>
            
            
        </div>
</section>


<?php include_once("partials/footer.php") ?>