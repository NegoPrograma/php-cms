<?php

namespace Controller;

use Utils\OperationResult;
use Model\Admin;

class AdminController
{


    private $AdminModel;
    private $username;
    private $password;
    private $password_confirm;
    private $nickname;
    private $validInput;

    function __construct($username = "", $nickname = "", $password = "", $password_confirm = "")
    {
        $this->validInput = true;
        $this->username = $username;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }

    // public function getCategories()
    // {
    //     $this->AdminModel = new Admin();
    //     return $this->AdminModel->getCategories();
    // }

    public function setAdmin()
    {
        if ($this->validInput) {
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            $this->AdminModel = new Admin($this->username, $this->password,$this->nickname);
            $result = $this->AdminModel->setAdmin();
            if ($result) {
                $errorHandler->addMessage("Adminstrador adicionado com successo.");
            } else {
                $errorHandler->addMessage("Erro ao salvar dados, tente novamente.");
                $errorHandler->setSuccess(false);
            }
            $errorHandler->renderResult();
        }
    }

    function validateAdmin()
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if (empty($this->username) || empty($this->password) || empty($this->password_confirm))
            $errorHandler->addMessage("Você não preencheu todos os dados necessários.");

        if ($this->password_confirm != $this->password)
            $errorHandler->addMessage("As senhas não coincidem.");
        else if (strlen($this->password) < 8 || strlen($this->password) > 59)
            $errorHandler->addMessage("As senhas devem conter no mínimo 8 caractéres até o máximo de 60 caractéres.");

        if (strlen($this->username) < 3 || strlen($this->username) > 49)
            $errorHandler->addMessage("O nome de usuário deve conter de 3 até o máximo de 50 caractéres");

        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
            return false;
        }
        return true;
    }
}
