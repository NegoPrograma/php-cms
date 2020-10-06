<?php

namespace Model;
Use Model\ModelTemplate;

class Admin extends ModelTemplate
{

    private $authorName;
    private $adminName;
    function __construct($authorName = "", $adminName = "")
    {
        parent::__construct();
        $this->authorName = $authorName;
        $this->adminName = $adminName;
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
        $author = $this->authorName;
        $admin = $this->adminName;
        $query = "INSERT INTO admins(author,name,datetime)";
        $query .= "VALUES(:author,:admin,:date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":author", $author);
        $stmt->bindValue(":admin", $admin);
        $stmt->bindValue(":date", $date);

        $result = $stmt->execute();
       return $result;
    }
}
