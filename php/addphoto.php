<?php
require 'config.php';
require 'cropimg.php';
$incomeData = json_decode($_POST['data']);

$names = $_POST;
$files = $_FILES;

//print_r($names);
for ($i=0; $i< count($files); $i++){
//  Загружаем фото на сервер
    $filename =  time().$files['files'.$i]['name'];
    $imageTitle =$names['nameImg'.$i];
    $imageSize= getimagesize($files['files'.$i]['tmp_name']);
    if($imageSize[0] < 500 && $imageSize[1]< 500){
        move_uploaded_file($files['files'.$i]['tmp_name'], __DIR__.'/../img/'.$filename);
    }else{
        cropImage($files['files'.$i]['tmp_name'], __DIR__.'/../img/'.$filename, 500, 500);
    }
// Записываем данные в бд
    $sql = "INSERT INTO photo (`name`, `url`) VALUES (?,?)";
    $stm = $pdo->prepare($sql);
    $stm->execute([$imageTitle, $filename]);

    mail("ya.sg-one@yandex.by", "Загружено новое фото: ".$imageTitle, "<img src='/img/".$filename."'>");
}

