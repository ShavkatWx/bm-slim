<?php

namespace App;

class DataBase
{
    public function __construct()
    {

    }
    public function DataBaseConnect($data)
    {
        $db_ip = '116.202.82.235';
        $db_login = 'bmarketi_user';
        $db_password = 'db_Bmarketing2211';
        $db_name = 'bmarketi_database';

        $induction = mysqli_connect($db_ip, $db_login, $db_password, $db_name);

        $induction->query("SET NAMES 'utf8'");
        $induction->query("SET CHARACTER SET utf8");


        if ($induction == false) {
            print "Ошибка подключения";
        }

        $induction->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

        $result = mysqli_query($induction, "SELECT * FROM `$data` ");

        while ($project = mysqli_fetch_assoc($result)) {
            $project_arr[] = $project;
        }

        $json = json_encode($project_arr);
        return $api = $json;
    }
}