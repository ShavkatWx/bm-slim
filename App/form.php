<?php

use App\DataBase;


$dataBase = new DataBase();

if (isset($_POST['add-project'])) {

    $images = $_FILES['img'];
    $filtered_images = [];
    $upload_images = [];

    foreach ($images as $key_name => $value) {
        foreach ($value as $key => $item) {
            $filtered_images[$key][$key_name] = $item;
        }
    }

    for ($i = 0; $i < count($filtered_images); $i++) {
        $name = mt_rand(0, 10000000) . substr($filtered_images[$i]['name'], 0, -3) . 'webp';
        global $upload_images;
        $upload_images[] = $name;

        $jpg = imagecreatefromjpeg($filtered_images[$i]['tmp_name']);
        $w = imagesx($jpg);
        $h = imagesy($jpg);
        $webp = imagecreatetruecolor($w, $h);
        imagecopy($webp, $jpg, 0, 0, 0, 0, $w, $h);
        imagewebp($webp, '../img/' . $name, 100);
        imagedestroy($jpg);
        imagedestroy($webp);
    }

    $param = [
        'client' => $_POST['client'],
        'industry' => $_POST['industry'],
        'title' => $_POST['title'],
        'services_1' => $_POST['services_1'],
        'services_2' => $_POST['services_2'],
        'services_3' => $_POST['services_3'],
        'services_4' => $_POST['services_4'],
        'year' => $_POST['year'],
        'description' => $_POST['description'],
        'link' => $_POST['link'],
        'video' => $_POST['video'],
        'orientation' => $_POST['orientation'],
        'home_page' => $_POST['home_page'],
        'video_1' => $_POST['video_1'],
        'video_2' => $_POST['video_2'],
        'video_3' => $_POST['video_3'],
        'video_4' => $_POST['video_4'],
        'img_project' => $_POST['img_project'],
        'img_1' => $upload_images[0],
        'img_2' => $upload_images[1],
        'img_3' => $upload_images[2],
        'img_4' => $upload_images[3],
        'img_5' => $upload_images[4],
        'img_6' => $upload_images[5],
        'img_7' => $upload_images[6],
        'img_8' => $upload_images[7],
        'img_9' => $upload_images[8],
        'img_10' => $upload_images[9],
        'img_11' => $upload_images[10],
    ];

    $dataBase->DataBaseInsert($param);
}


if (isset($_POST['delete-project'])) {
    $param = [
        'id' => $_POST['id']
    ];

    $induction = mysqli_connect('116.202.82.235', 'bmarketi_user', 'db_Bmarketing2211', 'bmarketi_database');
    $result = mysqli_query($induction, "SELECT * FROM `project_test` WHERE id = $_POST[id]");
    $projectDelImg = mysqli_fetch_assoc($result);
    $dir = '../img/';
    // unlink($dir . $projectDelImg['img_project']);
    for ($i = 1; $i < 12; $i++) {
        unlink($dir . $projectDelImg['img_' . $i]);
    }


    $dataBase->DataBaseDelete($param);
}


if (isset($_POST['update-project'])) {
    $param = [
        'id' => $_POST['id'],
        'client' => $_POST['client'],
        'industry' => $_POST['industry'],
        'title' => $_POST['title'],
        'services_1' => $_POST['services_1'],
        'services_2' => $_POST['services_2'],
        'services_3' => $_POST['services_3'],
        'services_4' => $_POST['services_4'],
        'year' => $_POST['year'],
        'description    ' => $_POST['description'],
        'link' => $_POST['link'],
        'video' => $_POST['video'],
        'orientation' => $_POST['orientation'],
        'home_page' => $_POST['home_page'],
        'video_1' => $_POST['video_1'],
        'video_2' => $_POST['video_2'],
        'video_3' => $_POST['video_3'],
        'video_4' => $_POST['video_4'],
    ];

    $dataBase->DataBaseUpdate($param);
}



if (isset($_POST['update-page-content'])) {

    $page_name = $_POST['page_name'];

    $param = [
        'id' => $_POST['id'],
        'content' => $_POST['content']
    ];


    $dataBase->DataBasePageUpdate($param, $page_name);
}