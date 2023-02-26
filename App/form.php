<?php

use App\DataBase;


$dataBase = new DataBase();

if (isset($_GET['add-project'])) {
    $param = [
        'client' => $_GET['client'],
        'industry' => $_GET['industry'],
        'title' => $_GET['title'],
        // 'services_1' => $_GET['services_1'],
        // 'services_2' => $_GET['services_2'],
        // 'services_3' => $_GET['services_3'],
        // 'services_4' => $_GET['services_4'],
        // 'year' => $_GET['year'],
        // 'link' => $_GET['link'],
        // 'video' => $_GET['video'],
        // 'orientation' => $_GET['orientation'],
        // 'home_page' => $_GET['home_page'],
        // 'video_1' => $_GET['video_1'],
        // 'video_2' => $_GET['video_2'],
        // 'video_3' => $_GET['video_3'],
        // 'video_4' => $_GET['video_4'],
        // 'img_project' => $_GET['img_project'],
        // 'img_2_orientation' => $_GET['img_2_orientation'],
        // 'img_3_orientation' => $_GET['img_3_orientation'],
        // 'img_4_orientation' => $_GET['img_4_orientation'],
        // 'img_5_orientation' => $_GET['img_5_orientation'],
        // 'img_6_orientation' => $_GET['img_6_orientation'],
        // 'img_7_orientation' => $_GET['img_7_orientation'],
        // 'img_8_orientation' => $_GET['img_8_orientation'],
        // 'img_9_orientation' => $_GET['img_9_orientation'],
        // 'img_10_orientation' => $_GET['img_10_orientation'],
        // 'img_11_orientation' => $_GET['img_11_orientation'],
    ];

    $dataBase->DataBaseInsert($param);

    // if ($query == true) {
    //     header("Location: /home-page");
    //     exit();
    // } else {
    //     print 'все плохо';
    // }

    print_r($param);
}


if (isset($_GET['delete-project'])) {
    $param = [
        'id' => $_GET['id']
    ];
    header("Location: /");
    $dataBase->DataBaseDelete($param);

}