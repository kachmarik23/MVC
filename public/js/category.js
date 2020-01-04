
/*вместо onclick="" в кнопке Добавить по классу .btn-create-cat ставим слушатель это как addEventListener() */
$(".btn_create_cat").on("click", createCategory);

function updateStart(category_id) {
    /* извлекаем название категории для изменения в input
        мы обратимся к элементу с id - name_$category['id'], стиль как в CSS (#name), так как это объект,
        что бы извлечь из объекта текст мы указываем .text()*/
    var text = $('#name_' + category_id).text();

    /*создадим переменныую html в которой сформируем новый input со значением value = text*/
    var html = "<input id='new_name_" + category_id + "' class='form-control  form-control-sm' style='width: 150px' type='text' value='" + text + "' >";
    /*обращаемся к элементу по id и изменяем методом html содержимое - передаем html*/
    $('#name_' + category_id).html(html);
    $('#update_' + category_id).text('Сохранить').attr('class', 'btn btn-success btn-sm').attr('onclick', 'endUpdate(' + category_id + ')');
}
function endUpdate(category_id) {
    var text = $('#new_name_' + category_id).val().trim().replace(/<[^>]+>/g,'');/*для получения значения из new_name  используем .val()*/
    /*сформируем ajax запрос функции $.ajax, $.get, $.post не будут работать с версией slin.jquery всегда нужна полная .trim().replace удалить пробелы и теги*/
    $.ajax({
        url: '/admin/category_update', /*url где обрабатываем данные*/
    type: 'POST',/*метод передачи*/
    cache: false,/*кеш не используем, нам он тут не надо*/
    data: {
        'id': category_id,
            'name': text,
    },
    success: function (data) {
        if (data) {
             /*обрабатываем данные полученные от /admin/category_update*/
             //alert(data);/*выводим сообщения об ошибках*/
            //jQuery.noConflict(); // из-за конфликта jquery модалка не вылазит, jQuery.noConflict() чтобы избежать конфликта
            $('#messageModal').text(data[0].err);
            $('#modalErr').modal();

            var html = "<input id='new_name_" + category_id + "' class='form-control  form-control-sm' style='width: 150px' type='text' value='" + text + "' >";
            /*обращаемся к элементу по id и изменяем методом html содержимое - передаем html*/
            $('#name_' + category_id).html(html);
            $('#update_' + category_id).text('Сохранить').attr('class', 'btn btn-success btn-sm').attr('onclick', 'endUpdate(' + category_id + ')');
        }
    }
});
    $('#name_' + category_id).text(text);/*для отображения в броузере передаем новое значение категории в таблицу name*/
    $('#update_' + category_id).text('Изменить').attr('class', 'btn btn-warning btn-sm').attr('onclick', 'updateStart(' + category_id + ')');
}
function removeCategory(category_id) {
    $.ajax({
        url: '/admin/category_remove', /*url где обрабатываем данные*/
    type: 'POST',/*метод передачи*/
    cache: false,/*кеш не используем, нам он тут не надо*/
    data: {
        'id': category_id,
    },
    success: function (data) {
        $('#row_' + category_id).remove();/*удалить объект*/
    }
});
}
function createCategory() {
    $('.alert-danger').hide();
    var name = $('#new_category').val().trim().replace(/<[^>]+>/g,'');/*удалить пробелы trim() и удалить теги replace*/

    $.ajax({
        url: '/admin/category_create', /*url где обрабатываем данные*/
    type: 'POST',/*метод передачи*/
    cache: false,/*кеш не используем, нам он тут не надо*/
    data: {
        'name': name,
    },

    success: function (result) {
        /* так как result при Err возращает string отлавливаем и выводим сообщение об ошибке*/
        console.log(result);
        if (!result[0].success){
            $('#message').text(result[0].err);
            $('.alert-danger').fadeIn().show();/*fadeIn() появиться плавно*/
             setTimeout(function () {
                 $('.alert-danger').fadeOut();/*fadeOut() исчезнуть плавно*/
             }, 3000);
             return;
             }
             /*что бы получить последнее вставленное id пвозвращаем его $category_id = $category->save();
                 из /admin/category_create result - это объект*/
        var html = "<tr id='row_" + result[0].id + "'>" +
            "<td>" + result[0].id + "</td>" +
            "<td id='name_" + result[0].id + "'>" + name + "</td>" +
            "<td>0</td>" +
            "<td class='text-center'>" +
            "<button class='btn btn-warning btn-sm' id='update_" + result[0].id + "'" +
            "onclick='updateStart(" + result[0].id + ")'>Изменить</button>" +
            "</td>" +
            "<td class='text-center'>" +
            "<button onclick='removeCategory(" + result[0].id + ")' class='btn btn-danger  btn-sm'>Удалить</button>" +
            "</td></tr>";
        $('#row_holder').append(html);/*добавим в основную таблицу новую категорию*/
        $('#new_category').val('');/*очистим окно ввода*/
    }
});
}
