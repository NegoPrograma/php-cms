<?php

namespace Model;

use Model\ModelTemplate;
use \PDO;

class Comment extends ModelTemplate
{

    private $name;
    private $email;
    private $content;


    function __construct($name = "", $email = "", $content = "")
    {
        parent::__construct();
        $this->name = $name;
        $this->content = $content;
        $this->email = $email;
    }

    public function getComment($id)
    {
        $query = "SELECT * FROM posts WHERE id = :id";
        $result = $this->db->prepare($query);
        $result->bindValue(":id", $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function getComments($post_id = "")
    {
        $result = null;
        if ($post_id != "") {
            $query = "SELECT * FROM comments WHERE post_id = :id AND status = 1 ORDER BY id DESC";
            $result = $this->db->prepare($query);
            $result->bindValue(":id", $post_id);
            $result->execute();
        } else {
            $query = "SELECT * FROM comments";
            $result = $this->db->query($query);
        }
        return $result->fetchAll();
    }


    public function approveComment($id)
    {
        $query = "UPDATE comments SET status = 1 WHERE id = :id";
        $result =  $this->db->prepare($query);
        $result->bindValue(":id", $id);
        return $result->execute();
    }


    public function disapproveComment($id)
    {
        $query = "UPDATE comments SET status = 0 WHERE id = :id";
        $result =  $this->db->prepare($query);
        $result->bindValue(":id", $id);
        return $result->execute();
    }

    public function deleteComment($id)
    {
        //pegando o nome da imagem para deletar da pasta de uploads antes de deletar o post em si.
        $query = "DELETE FROM comments WHERE id = :id";
        $result =  $this->db->prepare($query);
        $result->bindValue(":id", $id);
        return $result->execute();
    }

    public function addComment($post_id)
    {
        date_default_timezone_set("America/Sao_Paulo");
        $date = strftime("%d/%m/%Y às %H:%M", time());
        $name = $this->name;
        $email = $this->email;
        $content = $this->content;
        $query = "INSERT INTO comments(name,content,email,datetime,post_id)";
        $query .= "VALUES(:name,:content,:email,:date,:post_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":content", $content);
        $stmt->bindValue(":date", $date);
        $stmt->bindValue(":post_id", $post_id);
        $result = $stmt->execute();
        return $result;
    }
}
