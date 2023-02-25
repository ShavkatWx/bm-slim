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
        $param = [
            'name' => $name,
            'surname' => $name,
            'age' => $name,
            'tel' => $name
        ];

        $con = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
        $sql = "INSERT test_table (name,surname,age,tel) VALUE (:name,:surname,:age,:tel)";
        
        $query = $con->prepare($sql);
        $query->execute($param);

    }
}