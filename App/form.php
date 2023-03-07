<?php

use App\DataBase;


$dataBase = new DataBase();

if (isset($_POST['add-project'])) {
    $param = [
        // 'client' => $_POST['client'],
        // 'industry' => $_POST['industry'],
        // 'title' => $_POST['title'],
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

    $images = $_FILES['img'];
    $filtered_images = [];
    $upload_images = [];

    foreach ($images as $key_name => $value) {
        foreach ($value as $key => $item) {
            $filtered_images[$key][$key_name] = $item;
        }
    }

    // foreach ($images as $key_name => $value) {
    //     foreach ($value as $key => $item) {
    //         $filtered_images[$key][$key_name] = $item;
    //         print_r($filtered_images[0]['name']);
    //         print('<br>');
    //     }
    // }

    // function can_upload($file)
    // {
    //     foreach ($file as $item) {
    //         if ($item['name'] == '')
    //             return 'Вы не выбрали файл.';
    //         if ($item['size'] == 0)
    //             return 'Файл слишком большой.';
    //         $getMime = explode('.', $item['name']);
    //         $mime = strtolower(end($getMime));
    //         $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'webp');
    //         if (!in_array($mime, $types))
    //             return 'Недопустимый тип файла.';
    //         return true;
    //     }

    // }
    function make_upload($item)
    {
        // foreach ($file as $item) {
        // $name = mt_rand(0, 10000000) . substr($item[0]['name'], 0, -3) . 'webp';
        // global $upload_images;
        // $upload_images[] = $name;

        // $jpg = imagecreatefromjpeg($item[0]['tmp_name']);
        // $w = imagesx($jpg);
        // $h = imagesy($jpg);
        // $webp = imagecreatetruecolor($w, $h);
        // imagecopy($webp, $jpg, 0, 0, 0, 0, $w, $h);
        // imagewebp($webp, '../img/' . $name, 100);
        // imagedestroy($jpg);
        // imagedestroy($webp);


        // move_uploaded_file($item['tmp_name'], "../img/" . $name);
        for ($i = 0; $i < count($item); $i++) {
            $name = mt_rand(0, 10000000) . substr($item[$i]['name'], 0, -3) . 'webp';
            // global $upload_images;
            // $upload_images[] = $name;

            $jpg = imagecreatefromjpeg($item[$i]['tmp_name']);
            $w = imagesx($jpg);
            $h = imagesy($jpg);
            $webp = imagecreatetruecolor($w, $h);
            imagecopy($webp, $jpg, 0, 0, 0, 0, $w, $h);
            imagewebp($webp, '../img/' . $name, 100);
            imagedestroy($jpg);
            imagedestroy($webp);
        }

        // }
    }

    // foreach ($filtered_images as $value) {
    // if (isset($value['name'])) {
    //     $check = can_upload($filtered_images);
    //     if ($check === true) {
    make_upload($filtered_images);
    // print_r($value['name']);

    // }
    // }
    // }


    // $images_folder = array_diff(scandir('../img/'), ['..', '.']);
    // foreach ($images_folder as $image) {
    //     $jpg = imagecreatefromjpeg('../img/' . $image);
    //     $w = imagesx($jpg);
    //     $h = imagesy($jpg);
    //     $webp = imagecreatetruecolor($w, $h);
    //     imagecopy($webp, $jpg, 0, 0, 0, 0, $w, $h);
    //     imagewebp($webp, '../img/' . substr($image, 0, -4) . '.webp', 100);
    //     imagedestroy($jpg);
    //     imagedestroy($webp);
    // }


    // $uploadedFiles = $request->getUploadedFiles();

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