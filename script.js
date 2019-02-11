;
(function ($) {

    updateUppPhoto();
    var blocks = 0;
    var defaultFormelEment = '<div class="col col-md-6">' +
        '<div class="form-group"><input  name="image'+blocks+'"  type="file" required  aria-required="true" aria-invalid="false"></div>' +
        '<div class="form-group"><input type="text" class="form-control" name="image_name'+blocks+'" placeholder="Имя файла"></div>' +
        '</div>';


    // Кнопка добавления полей под фото/имя
    $('#more_photo').click(function (event) {
        event.preventDefault();
        $('#photo_box').append(defaultFormelEment);

         blocks++;
    });

    // очистка формы
    function clearForm(){

        $('#photo_box').html(defaultFormelEment);
    }

    // индикация нарушеной валидации
    function errorForm(){
        $('form').css('border-color','red');
        $('form h4').css('display','block');
    }



    // обработка данных из формы и отправка на сервер
    $('#send_form').click(function (event) {
        event.preventDefault();
        var imgArr = [];

        var errors = 0;

        var elements = $('#photo_box .col-md-6');
        var form_data = new FormData();
        var allInputFiles = $('input[type=file]');
        for (var i=0;i<elements.length;i++){

            var imageName  = elements.eq(i).children().eq(1).children().eq(0).val();
            if( (!elements.eq(i).children().eq(0).children().eq(0).val().length) || (!imageName.length)){
                errorForm();
                ++errors;
            }

            var file_data = allInputFiles.eq(i).prop('files')[0];
            form_data.append('files'+i, file_data);
            form_data.append('nameImg'+i,imageName);
        }
        // console.log(form_data.getAll('nameImg'));
        if(!errors){
            var tobackendData =  JSON.stringify(imgArr, null, 2);
            $.ajax({
                url:'php/addphoto.php',
                method:'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success:function (data) {
                    console.log(data);
                    clearForm();
                    updateUppPhoto();
                },
                error:function (data) {
                    console.log(data);
                }
            });

        }


    });

    function  updateUppPhoto() {

        $.ajax({
            url:'php/selectPhoto.php',
            method:'POST',
            success:function (data) {
                var    photos = JSON.parse(data);
                var i =1;
                var table = '<table class="table"><tr><td>id</td><td>img</td><td>name</td></tr>';

                for (var key in photos) {
                    table+='<tr><td>'+(i++)+'</td><td><img style="width:100px" src="img/'+photos[key]+' "></td><td>'+key+'</td></tr>'
                }
                table+='</table>';
                $('#uploded_photo').html(table);
            },
            error:function (data) {
                console.log(data);
            }
        });
    }

}(jQuery));