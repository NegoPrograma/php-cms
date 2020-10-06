<?php

namespace Controller;

use Model\Comment;
use Utils\OperationResult;

class CommentController
{


    private $name;
    private $email;
    private $content;
    private $validInput;


    function __construct($name = "", $email = "", $content = "")
    {
        $this->name = $name;
        $this->validInput = true;
        $this->content = $content;
        $this->email = $email;
    }


    // public function getPost($id = "")
    // {
    //     $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
    //     if ($id == "") {
    //         $errorHandler->setSuccess(false);
    //         $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
    //         $errorHandler->renderResult();
    //         exit;
    //     } else {
    //         $this->commentModel = new Post();
    //         $result = $this->commentModel->getPost($id);
    //         if (!$result) {
    //             $errorHandler->setSuccess(false);
    //             $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
    //             $errorHandler->renderResult();
    //             exit;
    //         } else {
    //             return $this->commentModel->getPost($id);
    //         }
    //     }
    // }

    public function getComments($post_id = "")
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if($post_id == ""){
            $errorHandler->setSuccess(false);
            $errorHandler->addMessage("Postagem não identificada.");
            $errorHandler->renderResult();
            exit;
        }

        $this->commentModel = new Comment();
        return $this->commentModel->getComments($post_id);
    }

    public function addComment($post_id)
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if ($this->validInput) {
            
            $postComment = new Comment($this->name, $this->email, $this->content);
            $result = $postComment->addComment($post_id);
            if ($result) {
                $errorHandler->addMessage("Comentário salvo com successo, aguarde a aprovação dos admins para sua exibição.");
            } else {
                $errorHandler->addMessage("Erro ao salvar dados, tente novamente.");
                $errorHandler->setSuccess(false);
            }
            $errorHandler->renderResult();
        }
    }

    // function editPost($id = ""){
    //     $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
    //     if ($id == "") {
    //         $errorHandler->setSuccess(false);
    //         $errorHandler->addMessage("Postagem não identificável, faltam parâmetros.");
    //         $errorHandler->renderResult();
    //         exit;
    //     } else {
    //         $mockAuthor = "Isaac";
    //         $this->commentModel = new Post($mockAuthor, $this->email, $this->name, $this->content, $this->postImage);
    //         $result = $this->commentModel->editPost($id);
    //         if (!$result) {
    //             $errorHandler->setSuccess(false);
    //             $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
    //             $errorHandler->renderResult();
    //         } else {
    //             $errorHandler->addMessage("Post editado com sucesso.");
    //             $errorHandler->renderResult();
    //         }
    //     }
    // }

    // function deletePost($id =""){
    //     $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
    //     if ($id == "") {
    //         $errorHandler->setSuccess(false);
    //         $errorHandler->addMessage("Postagem não identificável, faltam parâmetros.");
    //         $errorHandler->renderResult();
    //         exit;
    //     } else {
    //         $this->commentModel = new Post();
    //         $result = $this->commentModel->deletePost($id);
    //         if (!$result) {
    //             $errorHandler->setSuccess(false);
    //             $errorHandler->addMessage("Post não encontrado, verifique se os dados estão de acordo.");
    //             $errorHandler->renderResult();
    //         } else {
    //             $errorHandler->addMessage("Post deletado com sucesso.");
    //             $errorHandler->renderResult();
    //         }
    //     }

    // }

    function validateComment($id = "")
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if (empty($this->name) || empty($this->email) || empty($this->content))
            $errorHandler->addMessage("Todos os campos devem ser preenchidos.");
        if($id == "")
            $errorHandler->addMessage("Não foi possível identificar a postagem.");
        if (strlen($this->name) < 3 || strlen($this->name) > 49)
            $errorHandler->addMessage("Seu nome deve conter no mínimo 3 caractéres e no máximo 50.");

        if (strlen($this->content) < 10 || strlen($this->name) > 499)
            $errorHandler->addMessage("O conteúdo do comentário deve conter de 10 até o máximo de 500 caractéres.");
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            $errorHandler->addMessage("O e-mail inserido é inválido.");
        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
            return false;
        }
        return true;
    }
}
