<?php
namespace Controller;

Use Model\Post;
Use Utils\OperationResult;

class PostController
{


    private $postModel;
    private $postTitle;
    private $postImage;
    private $postContent;
    private $postCategory;
    private $validInput;


    function __construct($postTitle = "", $postContent = "", $postCategory = "", $postImage = "")
    {
        $this->postTitle = $postTitle;
        $this->validInput = true;
        $this->postContent = $postContent;
        $this->postCategory = $postCategory;
        $this->postImage = $postImage;
    }
    public function getPost($id = ""){
        if($id == ""){
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
            $errorHandler->renderResult();
        }else {
            $this->postModel = new Post();
            return $this->postModel->getPost($id);
        }

    }
    public function getPosts($queryString = "")
    {
        $this->postModel = new Post();
        return $this->postModel->getPosts($queryString);
    }

    public function addPost()
    {
        if ($this->validInput) {
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            $mockAuthor = "Isaac";
            $this->postModel = new Post($mockAuthor, $this->postCategory, $this->postTitle, $this->postContent, $this->postImage);
            $result = $this->postModel->addPost();
            if ($result) {
                $errorHandler->addMessage("Nova postagem salva com successo.");
            } else {
                $errorHandler->addMessage("Erro ao salvar dados, tente novamente.");
                $errorHandler->setSuccess(false);
            }
            $errorHandler->renderResult();
        }
    }

    function validatePost()
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if (empty($this->postTitle))
            $errorHandler->addMessage("Não é permitido uma postagem sem título.");

        if (strlen($this->postTitle) < 10 || strlen($this->postTitle) > 99)
            $errorHandler->addMessage("O título da postagem deve conter de 10 até o máximo de 100 caractéres.");

        if (strlen($this->postContent) < 100 || strlen($this->postTitle) > 4999)
            $errorHandler->addMessage("O conteúdo da postagem deve conter de 100 até o máximo de 5000 caractéres.");

        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
        }
    }
}
