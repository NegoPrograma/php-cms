<?php

namespace Controller;

use Model\Post;
use Utils\OperationResult;

class PostController
{


    private $postModel;
    private $postTitle;
    private $postImage;
    private $postContent;
    private $postCategory;
    private $validInput;
    private $author;

    function __construct($postTitle = "", $postContent = "", $postCategory = "", $postImage = "",$author = "")
    {
        $this->postTitle = $postTitle;
        $this->validInput = true;
        $this->postContent = $postContent;
        $this->author = $author;
        $this->postCategory = $postCategory;
        $this->postImage = $postImage;
    }
    public function getPost($id = "")
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if ($id == "") {
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
            $errorHandler->renderResult();
            exit;
        } else {
            $this->postModel = new Post();
            $result = $this->postModel->getPost($id);
            if (!$result) {
                $errorHandler->setSuccess(false);
                $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
                $errorHandler->renderResult();
                exit;
            } else {
                return $this->postModel->getPost($id);
            }
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
            $this->postModel = new Post($this->author, $this->postCategory, $this->postTitle, $this->postContent, $this->postImage);
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

    function editPost($id = ""){
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if ($id == "") {
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Postagem não identificável, faltam parâmetros.");
            $errorHandler->renderResult();
            exit;
        } else {
            $this->postModel = new Post($this->author, $this->postCategory, $this->postTitle, $this->postContent, $this->postImage);
            $result = $this->postModel->editPost($id);
            if (!$result) {
                $errorHandler->setSuccess(false);
                $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
                $errorHandler->renderResult();
            } else {
                $errorHandler->addMessage("Post editado com sucesso.");
                $errorHandler->renderResult();
            }
        }
    }

    function deletePost($id =""){
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if ($id == "") {
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Postagem não identificável, faltam parâmetros.");
            $errorHandler->renderResult();
            exit;
        } else {
            $this->postModel = new Post();
            $result = $this->postModel->deletePost($id);
            if (!$result) {
                $errorHandler->setSuccess(false);
                $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
                $errorHandler->renderResult();
            } else {
                $errorHandler->addMessage("Post deletado com sucesso.");
                $errorHandler->renderResult();
            }
        }

    }
    function validatePost($id = "")
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if (empty($this->postTitle))
            $errorHandler->addMessage("Não é permitido uma postagem sem título.");
        
        if (strlen($this->postTitle) < 10 || strlen($this->postTitle) > 99)
            $errorHandler->addMessage("O título da postagem deve conter de 10 até o máximo de 100 caractéres.");

        if (strlen($this->postContent) < 100 || strlen($this->postTitle) > 4999)
            $errorHandler->addMessage("O conteúdo da postagem deve conter de 100 até o máximo de 5000 caractéres.");
        if($this->postImage == "" && $id == "")
            $errorHandler->addMessage("A postagem não pode ficar sem imagens.");
        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
            return false;
        }
        return true;
    }
}
