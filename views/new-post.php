<?php include_once("../partials/header.php") ?>

<!-- HEADER start -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><span class="fa fa-plus"></span> Escreva uma nova postagem!</h1>
            </div>
        </div>
    </div>
</header>
<!-- HEADER end -->



<section class="container py-2 mt-4 mb-5">
    <div class="row">
        <!--offset é a propriedade que define de onde exatamente o bootstarp começa a contar e separar as colunas -->
        <div class="offset-lg-1 col-lg-10">
            <form action="../routes/addNewPost.php" method="post">
                <div class="card ">
                    <div class="card-header bg-white text-dark">
                        <h2>Preencha os dados necessários.</h2>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <div class="row mb-4">
                                <div class="col-6 ">

                                    <label for="title" class="text-white">Título da postagem</label>
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Digite o título da postagem">
                                </div>

                                <div class="col-6">

                                    <label for="category" class="text-white">Escolha uma categoria</label>
                                    <select class="form-control" type="text" name="category" id="author" placeholder="Digite o nome da categoria desejada">
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                        <option value="1">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row px-3 mb-3">
                                <p class="text-white">
                                    Selecione a imagem da sua postagem
                                </p>
                                <div class="col-12 form-control">
                                    <label class="custom-file-label" for="image">Pesquisar imagem...</label>
                                    <input class="custom-file-input" type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="content" class="text-white">Conteúdo</label>
                                    <textarea class="form-control col-12" id="content" name="content" rows="8" cols="80"></textarea>
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


<?php include_once("../partials/footer.php") ?>