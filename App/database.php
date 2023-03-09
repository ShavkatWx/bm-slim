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
        $sql = "INSERT INTO project_test (client, industry, title, services_1, services_2, services_3, services_4, year, description, link, video, orientation, home_page, video_1, video_2, video_3, video_4, img_project, img_1, img_2, img_3, img_4, img_5, img_6, img_7, img_8, img_9, img_10, img_11) VALUE (:client, :industry, :title, :services_1, :services_2, :services_3, :services_4, :year, :description, :link, :video, :orientation, :home_page, :video_1, :video_2, :video_3, :video_4, :img_project, :img_1, :img_2, :img_3, :img_4, :img_5, :img_6, :img_7, :img_8, :img_9, :img_10, :img_11)";

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

        $sql = "UPDATE project_test SET client = :client, industry = :industry, title = :title, services_1 = :services_1 ,services_2 = :services_2, services_3 = :services_3 ,services_4 = :services_4, year = :year, description = :description, link = :link, video = :video, orientation = :orientation, home_page = :home_page, video_1 = :video_1, video_2 = :video_2, video_3 = :video_3, video_4 = :video_4 WHERE id = :id";

        print_r($param);

        $query = $this->pdo->prepare($sql);
        $query->execute($param);

        // if ($query == true) {
        //     header("location:javascript://history.go(-1)");
        //     exit();
        // } else {
        //     print 'Ошибка!';
        // }
    }
    public function DataBasePageUpdate($param, $page_name)
    {
        $sql = "UPDATE $page_name SET content = :content WHERE id = :id";

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