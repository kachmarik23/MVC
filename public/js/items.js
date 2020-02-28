function createItem() {
    var title = $('#title').val().trim().replace(/<[^>]+>/g, '');
    var intro = $('#intro').val().trim().replace(/<[^>]+>/g, '');
    var description = myEditor.getData(); // получаем данные из ckeditor 5  myEditor глобальная переменная в настройках ckeditor ( .then( editor =>)
    var price = $('#price').val();
    var category_id = $('#category_id').val();
    var quantity = $('#quantity').val();
    var file_data = $('#image_file').prop('files')[0];//prop - возвращает значения свойств выбранных элементов, в данном случае ('files')[0]
    var item_data = new FormData(); // создаем объект FormData для передачи через аякс данных на сервер
    item_data.append('file', file_data);// добавляем в item_data
    item_data.append('title', title);
    item_data.append('intro', intro);
    item_data.append('description', description);
    item_data.append('price', price);
    item_data.append('category_id', category_id);
    item_data.append('quantity', quantity);

    $.ajax({
        url: '/admin/item_create', /*url где обрабатываем данные*/
        type: 'POST',/*метод передачи*/
        cache: false,/*кеш не используем, нам он тут не надо*/
        processData: false,// отключаем приобразование в строку, чтобы отправить фаил. Данные передадутся как есть
        contentType: false,// при передаче данных серверу сообщает content-type. По умолчанию - application/x-www-form-urlencoded. отключаем что бы сервер не говорил что это строка
        data: item_data,

        success: function (result) {
            if (!result[0].success) {
                $('#message_itemsAdd').text(result[0].err);
                $('#itemsAdd_err').fadeIn().show();/*fadeIn() появиться плавно*/
                setTimeout(function () {
                    $('#itemsAdd_err').fadeOut();/*fadeOut() исчезнуть плавно*/
                }, 7000);
                return;
            }
            // если удачно удаляем внесенные в модаль значения
            $('#title').val('');
            $('#intro').val('');
            myEditor.setData('Описание');
            $('#price').val('');
            $('#image_file').val('');
            $('#category_id').val('Категория');
            $('#quantity').val('');
        }
    });
}

function removeItem(item_id) {
    $.post('/admin/item_remove', {
        id: item_id
    }, function (res) {
        console.log(res);
        $('#item_' + item_id).empty();//удалить строку
    });
}

function updateItemStart(item_id, cat_id) {
    var title = $('#name_' + item_id).text().trim();
    var intro = $('#intro_' + item_id).text().trim();
    var description = $('#description_' + item_id).html(); // получаем данные из ckeditor 5  myEditor глобальная переменная в настройках ckeditor ( .then( editor =>)
    var price = $('#price_' + item_id).text().trim().replace('$', '');
    var category_name = $('#category_id_' + item_id).text();
    var quantity = $('#quantity_' + item_id).text().trim();
    var item_pic = $('#pic_'+item_id).html();

    $('#id_item').val(item_id);
    $('#titleEdit').val(title);
    $('#introEdit').val(intro);
    myEditorEdit.setData(description);
    $('#priceEdit').val(price);
    var html = '<option id="cat" value="' + cat_id + '" selected>' + category_name + '</option>';
    $('#category_id_Edit').append(html);//в селект добавляем строку с выбранной категорией
    $('#quantityEdit').val(quantity);
    $('#pic').html(item_pic);
    $('#itemsEdit').modal();
}
function updateItemEnd() {
    var id =$('#id_item').val();
    var title = $('#titleEdit').text().trim().replace(/<[^>]+>/g, '');
    var intro = $('#introEdit').text().trim().replace(/<[^>]+>/g, '');
    var description = myEditorEdit.getData();// получаем данные из ckeditor 5  myEditor глобальная переменная в настройках ckeditor ( .then( editor =>)
    var price = $('#priceEdit').text().trim().replace('$', '');
    var category_id = $('#category_id_Edit').text();
    var quantity = $('#quantityEdit').text().trim();
    var file_data = $('#image_fileEdit').prop('files')[0];//prop - возвращает значения свойств выбранных элементов, в данном случае ('files')[0]

    var item_data = new FormData(); // создаем объект FormData для передачи через аякс данных на сервер
    if (file_data){
        item_data.append('file', file_data);// добавляем в item_data
    }
    item_data.append('id', id);
    item_data.append('title', title);
    item_data.append('intro', intro);
    item_data.append('description', description);
    item_data.append('price', price);
    item_data.append('category_id', category_id);
    item_data.append('quantity', quantity);


}


function catRem() {
    if ($('#cat').length) {//если елемент существует (это добавленная выбранная категория для редактирования)
        $('#cat').remove();//удаяем
        return;
    }
    return;
}
