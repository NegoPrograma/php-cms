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
        $this->categoryModel = new Category();
        $this->categoryName = $categoryName;
    }

    function setCategory()
    {
        if ($this->validInput) {
            $mockAuthor = "Isaac";
            $this->categoryModel->setCategory($mockAuthor);
        }
    }

    function validateCategory()
    {
        $result = new OperationResult($_SERVER['HTTP_REFERER']);
        if (empty($this->categoryName))
            $result->addMessage("Não é permitido uma categoria sem nome.");

        if (strlen($this->categoryName) < 3 || strlen($this->categoryName) > 49)
            $result->addMessage("O nome da categoria deve conter de 3 até o máximo de 50 caractéres");

        if (count($result->getMessages()) > 0) {
            $result->setSuccess(false);
            $this->validInput = false;
        }
        $result->renderResult();
    }
}
