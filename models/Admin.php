<?php

namespace Model;

use Model\ModelTemplate;

class Admin extends ModelTemplate
{

    private $username;
    private $password;
    private $nickname;
    private $added_by;

    function __construct($username = "", $password = "", $nickname = "", $added_by = "")
    {
        parent::__construct();
        $this->added_by = $added_by;
        $this->username = $username;
        $this->nickname = $nickname;
        $this->password = $password;
    }

    public function hasRegistered($id,$adminUsername){
        $query = "SELECT * FROM admins WHERE id = :id AND addedby = :added_by";
        $result =  $this->db->prepare($query);
        $result->bindValue(":id", $id);
        $result->bindValue(":added_by", $adminUsername);
        $result->execute();
        return $result->rowCount();
    }
    
    public function deleteAdmin($id)
    {
        $query = "DELETE FROM admins WHERE id = :id";
        $result =  $this->db->prepare($query);
        $result->bindValue(":id", $id);
        return $result->execute();
    }

    public function login()
    {
        $query = "SELECT * FROM admins WHERE username = :username AND password = :password";
        $result = $this->db->prepare($query);
        $result->bindValue(":username", $this->username);
        $result->bindValue(":password", md5($this->password));
        $result->execute();
        return $result->fetch();
    }


    public function getAdmins()
    {
        $query = "SELECT * FROM admins";
        $result = $this->db->query($query);
        return $result->fetchAll();
    }

    public function checkDuplicateUsername($username)
    {
        $query = "SELECT * FROM admins WHERE username = :username";
        $result = $this->db->prepare($query);
        $result->bindValue(":username", $username);
        $result->execute();
        return $result->rowCount();
    }

    public function setAdmin()
    {
        date_default_timezone_set("America/Sao_Paulo");
        $date = strftime("%d/%m/%Y às %H:%M", time());
        $username = $this->username;
        $password = md5($this->password);
        $nickname = $this->nickname;
        $added_by = $this->added_by;
        $query = "INSERT INTO admins (username,password,datetime,nickname,addedby)";
        $query .= " VALUES (:username,:password,:date,:nickname,:added_by)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":password", $password);
        $stmt->bindValue(":date", $date);
        $stmt->bindValue(":nickname", $nickname);
        $stmt->bindValue(":added_by", $added_by);
        $result = $stmt->execute();
        return $result;
    }
}
