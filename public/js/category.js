
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
    var text = $('#new_name_' + category_id).val();/*для получения значения из new_name  используем .val()*/
    /*сформируем ajax запрос функции $.ajax, $.get, $.post не будут работать с версией slin.jquery всегда нужна полная*/
    $.ajax({
        url: '/admin/category_update', /*url где обрабатываем данные*/
    type: 'POST',/*метод передачи*/
    cache: false,/*кеш не используем, нам он тут не надо*/
    data: {
        'id': category_id,
            'name': text,
    },
    success: function (data) {
        if (data != '') {
            /*обрабатываем данные полученные от /admin/category_update*/
            // alert(data);/*выводим сообщения об ошибках*/
            jQuery.noConflict();// из-за конфликта jquery модалка не вылазит, jQuery.noConflict() чтобы избежать конфликта
            $('    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">' +
                '        <div class="modal-dialog modal-dialog-centered" role="document">' +
                '            <div class="modal-content">' +
                '                <div class="modal-header">' +
                '                    <h5 class="modal-title" id="exampleModalLongTitle">Ошибка</h5>' +
                '                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '                        <span aria-hidden="true">&times;</span>' +
                '                    </button>' +
                '                </div>' +
                '                <div class="modal-body">' +
                data +
                '                </div>' +
                '                <div class="modal-footer">' +
                '                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                '                </div>' +
                '            </div>' +
                '        </div>' +
                '    </div>').modal();
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
    var name = $('#new_category').val().trim();
    if (name.length < 2){
        $('#message').text(' Название категории не может содержать мение 2х символов');
        $('.alert-danger').fadeIn().show();/*fadeIn() появиться плавно*/
        setTimeout(function () {
            $('.alert-danger').fadeOut();/*fadeOut() исчезнуть плавно*/
        }, 3000);
        return;
    }

    $.ajax({
        url: '/admin/category_create', /*url где обрабатываем данные*/
    type: 'POST',/*метод передачи*/
    cache: false,/*кеш не используем, нам он тут не надо*/
    data: {
        'name': name,
    },

    success: function (result) {
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