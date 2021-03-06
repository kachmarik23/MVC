<?php


class ControlErr
{
    /**
     * @var string
     */
    public $error = '';

    /**
     *
     * @param $name
     * @param $intro
     * @param $description
     * @param $price
     * @param $category_id
     * проверка при создании товара в AdminController->item_create()
     * @return string
     */

    public static function items ($name, $intro, $description, $price,  $category_id){
        global $error;
        $accepted = [IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_BMP];//загружаемые файлы, только картинки
        switch (true) {//проверим передаваемые данные
            case strlen($name) < 3:
                $error = 'Введите наименование товара, наименование товара не может быть короче 3х символов.';
                break;
            case strlen($intro) < 3:
                $error = 'Краткое описание менее 60 символов';
                break;
            case strlen($description) < 3:
                $error = 'Описание товара менее 150 символов';
                break;
            case $price < 0.01:
                $error = 'Ваш товар стоит менее 0,01 ($)';
                break;
            case !$category_id :
                $error = 'Необходимо выбрать категорию';
                break;
            case $_FILES['file'] ['size'] > 2097152:
                $error = 'Размер файла привышает 2Мб';
                break;
            case  $_FILES['file'] ['size'] == 0:
                $error = 'Вы не выбрали картинку';
                break;
            case !in_array(exif_imagetype($_FILES['file'] ['tmp_name']), $accepted):
                //in_array — Проверяет, присутствует ли в массиве значение $accepted,
                // exif_imagetype считывает начальные байты изображения и проверяет их сигнатуру.
                $error = 'Недопустимый формат файла. Только jpeg, png, bmp и gif';
                break;
        }
        return $error;

    }

    /**
     * @param $name
     * Проверка создания карегории AdminController -> category_create();
     * @return string
     */
    public static function categoty($name){
        global $error;
        switch (true) {//проверим передаваемые данные
            case strlen($name) < 2:
                $error = ' Наименование категории не может быть короче 2х символов.';
                break;
        }
        return $error;
    }

    public static function users($name,$pass){
        global $error;
        switch (true) {//проверим передаваемые данные
            case strlen($name) < 4:
                $error = ' Логин не может быть короче 4х символов.';
                break;
            case strlen($name)>20:
                $error = ' Логин не может быть дленее 10ти символов.';
                break;
            case strlen($pass) < 6:
                $error = ' Пароль не может быть короче 6ти символов.';
                break;
        }
        return $error;

    }

    /**
     * @param $error
     */
    private function err($error){
        if ($error) {
           die ($error);
        }
    }

}