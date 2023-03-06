<?php

namespace App;

use PDO;

class DataBase
{
    public $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=116.202.82.235;dbname=bmarketi_database;charset=utf8", "bmarketi_user", "db_Bmarketing2211");
    }
    public function DataBaseSelectAll($data)
    {
        $sql = "SELECT * FROM $data";

        $statement = $this->pdo->query($sql);

        return $statement->fetchAll();
    }

    public function DataBaseSelect($id)
    {
        $sql = "SELECT * FROM project_test WHERE id = $id";

        $statement = $this->pdo->query($sql);

        return $statement->fetchAll();
    }

    public function DataBaseInsert($param)
    {
        // $sql = "INSERT test_table (client, industry, title, services_1, services_2, services_3, services_4, year, description, link, video, orientation, home_page, video_1, video_2, video_3, video_4, img_project, img_1, img_2, img_3, img_4, img_5, img_6, img_7, img_8, img_9, img_10, img_11, img_2_orientation, img_3_orientation, img_4_orientation, img_5_orientation, img_6_orientation, img_7_orientation, img_8_orientation, img_9_orientation, img_10_orientation, img_11_orientation) VALUE (:client, :industry, :title, :services_1, :services_2, :services_3, :services_4, :year, :description, :link, :video, :orientation, :home_page, :video_1, :video_2, :video_3, :video_4, :img_project, :img_1, :img_2, :img_3, :img_4, :img_5, :img_6, :img_7, :img_8, :img_9, :img_10, :img_11, :img_2_orientation, :img_3_orientation, :img_4_orientation, :img_5_orientation, :img_6_orientation, :img_7_orientation, :img_8_orientation, :img_9_orientation, :img_10_orientation, :img_11_orientation)";

        $sql = "INSERT project_test (client, industry, title) VALUE (:client, :industry, :title)";

        $query = $this->pdo->prepare($sql);
        $query->execute($param);

        if ($query == true) {
            header("Location: /projects");
            exit();
        } else {
            print 'Ошибка!';
        }
    }
    public function DataBaseDelete($param)
    {
        $sql = "DELETE FROM project_test WHERE id = :id";

        $query = $this->pdo->prepare($sql);
        $query->execute($param);
        if ($query == true) {
            header("Location: /projects");
            exit();
        } else {
            print 'Ошибка!';
        }
    }

    public function DataBaseUpdate($param)
    {

        // $sql = "UPDATE `project_test` SET `id`=[value-1],`client`=[value-2],`industry`=[value-3],`title`=[value-4],`services_1`=[value-5],`services_2`=[value-6],`services_3`=[value-7],`services_4`=[value-8],`year`=[value-9],`description`=[value-10],`link`=[value-11],`video`=[value-12],`orientation`=[value-13],`home_page`=[value-14],`video_1`=[value-15],`video_2`=[value-16],`video_3`=[value-17],`video_4`=[value-18],`img_project`=[value-19],`img_1`=[value-20],`img_2`=[value-21],`img_3`=[value-22],`img_4`=[value-23],`img_5`=[value-24],`img_6  `=[value-25],`img_7`=[value-26],`img_8`=[value-27],`img_9`=[value-28],`img_10`=[value-29],`img_11`=[value-30],`img_2_orientation`=[value-31],`img_3_orientation`=[value-32],`img_4_orientation`=[value-33],`img_5_orientation`=[value-34],`img_6_orientation`=[value-35],`img_7_orientation`=[value-36],`img_8_orientation`=[value-37],`img_9_orientation`=[value-38],`img_10_orientation`=[value-39],`img_11_orientation`=[value-40] WHERE 1";

        $sql = "UPDATE project_test SET client = :client, industry = :industry, title = :title WHERE id = :id";

        $query = $this->pdo->prepare($sql);
        $query->execute($param);

        if ($query == true) {
            header("location:javascript://history.go(-1)");
            exit();
        } else {
            print 'Ошибка!';
        }
    }

}