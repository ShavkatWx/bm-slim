<?php

namespace App;

use PDO;

class DataBase2
{
    public function __construct()
    {

    }
    public function DataBaseConnect2($name)
    {
        $param = ['name'=>$name];

        $con = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
        $sql = "INSERT test_table (name) VALUE (:name)";
        $query = $con->prepare($sql);
        $query->execute($param);

    }
}