<?php

namespace Model;
Use Model\ModelTemplate;
class Category extends ModelTemplate
{

    private $authorName;
    private $categoryName;
    function __construct($authorName = "", $categoryName = "")
    {
        parent::__construct();
        $this->authorName = $authorName;
        $this->categoryName = $categoryName;
    }


    public function deleteCategory($id)
    {
        //pegando o nome da imagem para deletar da pasta de uploads antes de deletar o post em si.
        $query = "DELETE FROM categories WHERE id = :id";
        $result =  $this->db->prepare($query);
        $result->bindValue(":id", $id);
        return $result->execute();
    }

    public function getCategories(){
        $query = "SELECT * FROM categories";
        $result = $this->db->query($query);
        return $result->fetchAll();
    }
    
    public function setCategory()
    {
        date_default_timezone_set("America/Sao_Paulo");
        $date = strftime("%d/%m/%Y às %H:%M", time());
        $author = $this->authorName;
        $category = $this->categoryName;
        $query = "INSERT INTO categories(author,name,datetime)";
        $query .= "VALUES(:author,:category,:date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":author", $author);
        $stmt->bindValue(":category", strtolower($category));
        $stmt->bindValue(":date", $date);

        $result = $stmt->execute();
       return $result;
    }
}
