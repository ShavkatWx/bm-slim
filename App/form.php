<?php

use App\DataBase;

$dataBase = new DataBase();

if (isset($_POST['add-project'])) {
    $param = [
        'client' => $_POST['client'],
        'industry' => $_POST['industry'],
        'title' => $_POST['title'],
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

    $uploadedFiles = $request->getUploadedFiles();

    // foreach ($uploadedFiles['img'] as $uploadedFile) {
        // if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            // $filename = move_uploaded_file('../img', json_encode($uploadedFile));
            // $response->write('uploaded ' . $filename . '<br/>');
    //         print_r('ok');
    //     }
    // }

    // foreach ($uploadedFiles['img'] as $uploadedFile) {   
    //     print_r($uploadedFile);
    // }

    // $dataBase->DataBaseInsert($param);
}


if (isset($_POST['delete-project'])) {
    $param = [
        'id' => $_POST['id']
    ];
    
    $dataBase->DataBaseDelete($param);
}


if (isset($_POST['update-project'])) {
    $param = [
        'id' => $_POST['id'],
        'client' => $_POST['client'],
        'industry' => $_POST['industry'],
        'title' => $_POST['title'],
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

    $dataBase->DataBaseUpdate($param);
}