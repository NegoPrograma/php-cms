<?php

include_once("../utils/db-credentials.php");
include_once("../models/Model.php");

class Category extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function setCategory()
    {
        date_default_timezone_set("America/Sao_Paulo");
        $date = strftime("%d/%m/%Y às %H:%M",time());
        $this->db->query();
    }
}
