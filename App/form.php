<?php
use App\DataBase2;



if (isset($_GET['btn'])) {

    $name = $_GET['name'];

    $dataBase2 = new DataBase2();
    $dataBase2->DataBaseConnect2($name);

    // if ($query == true) {
    //     header("Location: /home-page");
    //     exit();
    // } else {
    //     print 'все плохо';
    // }

    echo $name;
}