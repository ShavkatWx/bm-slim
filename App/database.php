<?php

namespace App;

use PDO;

class DataBase
{
    public function __construct()
    {

    }
    public function DataBaseSelect($data)
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

        $result = mysqli_query($induction, "SELECT * FROM $data ");

        while ($project = mysqli_fetch_assoc($result)) {
            $project_arr[] = $project;
        }

        $json = json_encode($project_arr);
        return $api = $json;

    }

    public function DataBaseInsert($param)
    {
        $con = new PDO("mysql:host=116.202.82.235;dbname=bmarketi_database;charset=utf8", "bmarketi_user", "db_Bmarketing2211");

        // $sql = "INSERT test_table (client, industry, title, services_1, services_2, services_3, services_4, year, description, link, video, orientation, home_page, video_1, video_2, video_3, video_4, img_project, img_1, img_2, img_3, img_4, img_5, img_6, img_7, img_8, img_9, img_10, img_11, img_2_orientation, img_3_orientation, img_4_orientation, img_5_orientation, img_6_orientation, img_7_orientation, img_8_orientation, img_9_orientation, img_10_orientation, img_11_orientation) VALUE (:client, :industry, :title, :services_1, :services_2, :services_3, :services_4, :year, :description, :link, :video, :orientation, :home_page, :video_1, :video_2, :video_3, :video_4, :img_project, :img_1, :img_2, :img_3, :img_4, :img_5, :img_6, :img_7, :img_8, :img_9, :img_10, :img_11, :img_2_orientation, :img_3_orientation, :img_4_orientation, :img_5_orientation, :img_6_orientation, :img_7_orientation, :img_8_orientation, :img_9_orientation, :img_10_orientation, :img_11_orientation)";

        $sql = "INSERT project_test (client, industry, title) VALUE (:client, :industry, :title)";

        $query = $con->prepare($sql);
        $query->execute($param);

    }
    public function DataBaseDelete($param)
    {
        $con = new PDO("mysql:host=116.202.82.235;dbname=bmarketi_database;charset=utf8", "bmarketi_user", "db_Bmarketing2211");

        $sql = "DELETE FROM project_test WHERE id = :id";

        $query = $con->prepare($sql);
        $query->execute($param);
    }
}