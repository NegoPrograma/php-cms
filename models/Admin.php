<?php

namespace Model;
Use Model\ModelTemplate;

class Admin extends ModelTemplate
{

    private $username;
    private $password;
    private $nickname;

    function __construct($username = "", $password = "",$nickname = "")
    {
        parent::__construct();
        $this->username = $username;
        $this->nickname = $nickname;
        $this->password = $password;
    }

    public function getAdmins(){
        $query = "SELECT * FROM admins";
        $result = $this->db->query($query);
        return $result->fetchAll();
    }
    
    public function setAdmin()
    {
        date_default_timezone_set("America/Sao_Paulo");
        $date = strftime("%d/%m/%Y às %H:%M", time());
        $username = $this->username;
        $password = md5($this->password);
        $nickname = $this->nickname;
        $added_by = "Isaac";
        $query = "INSERT INTO admins(username,password,datetime,nickname,addedby)";
        $query .= " VALUES(:username,:password,:date,:nickname,:added_by)";
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
