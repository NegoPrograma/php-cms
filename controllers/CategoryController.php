<?php

namespace Controller;
Use Utils\OperationResult;
Use Model\Category;
class CategoryController
{


    private $categoryModel;
    private $categoryName;
    private $validInput;
    private $author;

    function __construct($author,$categoryName = "")
    {
        $this->validInput = true;
        $this->author = $author;
        $this->categoryName = $categoryName;
    }

    public function getCategories(){
        $this->categoryModel = new Category();
        return $this->categoryModel->getCategories();
    }

    public function setCategory()
    {
        if ($this->validInput) {
            $errorHandler = new OperationResult($_SERVER['HTTP_REFERER']);
            
            $this->categoryModel = new Category($this->author,$this->categoryName);
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
