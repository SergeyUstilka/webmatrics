<?php
require 'php/config.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<head></head>
<main>
    <div class="container">
        <h2>Загрузка фото</h2>
        <div class="row">
            <div class="col-md-6">
                <button id="more_photo" class="btn btn-primary">Добавить еще блок</button>
                <form id="upload_form" enctype="multipart/form-data">
                    <h4>Не все поля заполнены</h4>
                    <div class="row" id="photo_box" >
                        <div class="col col-md-6">
                            <div class="form-group"><input  name="image" required  type="file"  aria-required="true" aria-invalid="false"></div>
                            <div class="form-group"><input type="text" class="form-control" name="image_name" placeholder="Имя файла"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info" id="send_form">Загрузить</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Загруженные фото</h2>
                <div id="uploded_photo">

                </div>
            </div>
        </div>


    </div>


</main>
<footer></footer>


<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>
