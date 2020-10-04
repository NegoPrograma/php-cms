<?php
include_once("../models/Category.php");
include_once('../utils/OperationResult.php');
class CategoryController
{


    private $categoryModel;
    private $categoryName;
    private $validInput;

    function __construct($categoryName)
    {
        $this->validInput = true;
        $this->categoryName = $categoryName;
    }

    function setCategory()
    {
        if ($this->validInput) {
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            $mockAuthor = "Isaac";
            $this->categoryModel = new Category($mockAuthor,$this->categoryName);
            $result = $this->categoryModel->setCategory();
            if($result){
                $errorHandler->addMessage("Categoria salva com successo.");
            }else{
                $errorHandler->addMessage("Erro ao salvar dados, tente novamente.");
                $errorHandler->setSuccess(false);
            }
            $errorHandler->renderResult();
        }
    }

    function validateCategory()
    {
        $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
        if (empty($this->categoryName))
            $errorHandler->addMessage("Não é permitido uma categoria sem nome.");

        if (strlen($this->categoryName) < 3 || strlen($this->categoryName) > 49)
            $errorHandler->addMessage("O nome da categoria deve conter de 3 até o máximo de 50 caractéres");

        if (count($errorHandler->getMessages()) > 0) {
            $errorHandler->setSuccess(false);
            $this->validInput = false;
            $errorHandler->renderResult();
        }
        
    }
}
