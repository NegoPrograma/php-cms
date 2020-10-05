<?php

namespace Model;

use Model\ModelTemplate;
use \PDO;

class Post extends ModelTemplate
{

    private $authorName;
    private $categoryName;
    private $postTitle;
    private $postContent;
    private $postImage;
    private $imagePath;


    function __construct($authorName = "", $categoryName = "", $postTitle = "", $postContent = "", $postImage = "")
    {
        parent::__construct();
        $this->authorName = $authorName;
        $this->categoryName = $categoryName;
        $this->postContent = $postContent;
        $this->postTitle = $postTitle;
        $this->postImage = $postImage;

        $this->imagePath = "../uploads/" . basename($postImage);
    }

    public function getPost($id)
    {
        $query = "SELECT * FROM posts WHERE id = :id";
        $result = $this->db->prepare($query);
        $result->bindValue(":id", $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }
    public function editPost($id)
    {
        if ($this->postImage != "") {
            $query =
                    "UPDATE posts 
                    SET category = :category,
                    title = :title,
                    image = :image, 
                    content = :content 
                    WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindValue(":id", $id);
            $result->bindValue(":category", $this->categoryName);
            $result->bindValue(":title", $this->postTitle);
            $result->bindValue(":image", $this->postImage);
            $result->bindValue(":content", $this->postContent);
            move_uploaded_file($_FILES['image']['tmp_name'], $this->imagePath);
        }
        //caso o usuário queira editar o conteúdo sem trocar o banner.
        else {
            $query =    
                    "UPDATE posts 
                    SET category = :category,
                    title = :title,
                    content = :content 
                    WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindValue(":id", $id);
            $result->bindValue(":category", $this->categoryName);
            $result->bindValue(":title", $this->postTitle);
            $result->bindValue(":content", $this->postContent);
        }
        return $result->execute();
    }
    public function getPosts($queryString = "")
    {
        if ($queryString == "") {
            $query = "SELECT * FROM posts ORDER BY id DESC";
            $result = $this->db->query($query);
        } else {
            $query = "SELECT * FROM posts WHERE 
            datetime LIKE :queryString OR 
            category LIKE :queryString OR 
            content LIKE :queryString OR 
            title LIKE :queryString OR 
            author LIKE :queryString  
            ORDER BY id DESC";
            $result = $this->db->prepare($query);
            //porcentagem envolve a querystring para indicar que é uma busca de substring
            $result->bindValue(":queryString", '%' . $queryString . '%');
            $result->execute();
        }
        return $result->fetchAll();
    }

    public function deletePost($id)
    {
        $query =
            "DELETE FROM posts WHERE id = :id";
        $result = $this->db->prepare($query);
        $result->bindValue(":id", $id);
        return $result->execute();
    }

    public function addPost()
    {
        date_default_timezone_set("America/Sao_Paulo");
        $date = strftime("%d/%m/%Y às %H:%M", time());
        $author = $this->authorName;
        $category = $this->categoryName;
        $title = $this->postTitle;
        $content = $this->postContent;
        $image = $this->postImage;
        $query = "INSERT INTO posts(author,title,content,category,image,datetime)";
        $query .= "VALUES(:author,:title,:content,:category,:image,:date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":author", $author);
        $stmt->bindValue(":category", $category);
        $stmt->bindValue(":content", $content);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":date", $date);
        $stmt->bindValue(":image", $image);
        $result = $stmt->execute();
        move_uploaded_file($_FILES['image']['tmp_name'], $this->imagePath);
        return $result;
    }
}
