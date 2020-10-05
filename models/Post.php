<?php
namespace Model;
Use Model\ModelTemplate;

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

    public function getPosts()
    {
        $query = "SELECT * FROM posts";
        $result = $this->db->query($query);
        return $result->fetchAll();
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
