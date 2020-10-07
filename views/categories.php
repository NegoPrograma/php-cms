<?php
session_start();
include_once("../routes/getCategories.php");
if (isset($_SESSION['admin']))
    include_once("partials/admin-header.php");
else {
    header("location:login.php");
}
?>


<!-- CONTENT -->
<!-- HEADER start -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><span class="fa fa-edit"></span> Adicionar nova categoria.</h1>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->

<section class="container py-2 mb-4">
    <div class="row">
        <!--offset é a propriedade que define de onde exatamente o bootstarp começa a contar e separar as colunas -->
        <div class="offset-lg-1 col-lg-10">
            <form action="../routes/addCategory.php" method="post">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h2>Preencha os dados necessários.</h2>
                    </div>
                    <div class="card-body bg-primary">
                        <div class="form-group">
                            <label for="title" class="text-white">Nome da categoria</label>
                            <input class="form-control" type="text" name="category_name" id="title" placeholder="Digite o nome da nova categoria">
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

    <div class="row my-3">
        <div class="offset-lg-1 col-lg-10">
            <h2>Categorias existentes:</h2>
            <table class="table">
                <thead class="thead-dark">
                    <th>Autor</th>
                    <th>Data de criação</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </thead>
                <tbody>

                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo substr($category['author'],0,15)."...";?></td>
                        <td><?php echo $category['datetime']?></td>
                        <td><?php echo substr($category['name'],0,20)."..";?></td>
                        <td>
                                <a href="../routes/deleteCategory.php?id=<?php echo $category['id']?>" class="btn btn-block btn-danger">Deletar</a>
                            </td>
                    </tr>
                <? endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- END CONTENT -->
<?php include_once("partials/footer.php") ?>