<?php

namespace Controller;

use Utils\OperationResult;
use Model\Admin;

class AdminController
{


    private $AdminModel;
    private $AdminName;
    private $validInput;

    function __construct($AdminName = "")
    {
        $this->validInput = true;
        $this->AdminName = $AdminName;
    }

    public function getCategories()
    {
        $this->AdminModel = new Admin();
        return $this->AdminModel->getCategories();
    }

    public function setAdmin()
    {
        if ($this->validInput) {
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            $mockAuthor = "Isaac";
            $this->AdminModel = new Admin($mockAuthor, $this->AdminName);
            $result = $this->AdminModel->setAdmin();
            if ($result) {
                $errorHandler->addMessage("Categoria salva com successo.");
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
        if (empty($this->AdminName))
            $errorHandler->addMessage("Não é permitido uma categoria sem nome.");

        if (strlen($this->AdminName) < 3 || strlen($this->AdminName) > 49)
            $errorHandler->addMessage("O nome da categoria deve conter de 3 até o máximo de 50 caractéres");

        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
        }
    }
}
