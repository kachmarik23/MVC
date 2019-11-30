<?php


class AdminController
{
    /**
     * @throws SmartyException
     * функция по умолчанию. Получем список заказов всех пользователей
     */
    public function index()
    {
        global $smarty;
        $orders = OrderModel::getOrders();//не передаем $user_id пользователя что бы получить все заказы,
        // по умолчанию getOrders($user_id = null)

        foreach ($orders as &$order) {//амперсант передает по ссылке значения в $orders из $order и унас будет изменен
            // оригинал $orders через локальную копию $order.
            $order['items'] = trim($order['items'], '.');//encode ставит точки в начале и конце в JSON
            // удаляем эти точки. не знаю по чему ставит
            $order['items'] = json_decode($order['items'], true);//из json в массив, ссоциативный массив true
        }
        $smarty->assign('orders', $orders);
        $smarty->display('admin/index.tpl');
    }

    /**
     * @throws SmartyException
     * Доавить товар в админке
     *
     */

    public function items()
    {
        global $smarty;
        $categories = CategoriesModel::categoryList();//получим список категорий для формы добавления товара
        $smarty->assign('categories', $categories);
        $smarty->display('admin/items.tpl');
    }

    /**
     * Создать товар в админке передаем данные в ItemsModel для сохранения в БД и сохранения картинки товара
     */

    public function item_create()
    {
        $items = new ItemsModel();
        $items->name = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));//$items->name тат как в ItemsModel эти переменные global
        $items->description = trim($_POST['description']);
        $price = trim(filter_var($_POST['price'], FILTER_SANITIZE_STRING), ' ');
        $trans = ["," => "."];
        $items->price = floatval(strtr($price, $trans));//strtr - заменить запятую на точку,floatval- изменим тип на float
        $items->category_id = trim(filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT));
        $error = '';
        $accepted = [IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_BMP];//загружаемые файлы, только картинки
        switch (true) {//проверим передаваемые анные
            case strlen($items->name) < 3:
                $error = 'Введите наименование товара, наименование товара не может быть мение 3х символов.';
                break;
            case strlen($items->description) < 30:
                $error = 'Короткое описание';
                break;
            case $items->price < 0.1:
                $error = 'Ваш товар стоит менее 0,01 ($)';
                break;
            case !$items->category_id :
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
        if ($error != '') {
            die($error);
            exit();
        }
        $items->save() ? header('Location:' . $_SERVER['HTTP_REFERER']) : die('Error ItemsModel / save');

    }

    /**
     * @throws SmartyException
     * выведем в админке категории и количество товаров в категории
     */

    public function category()
    {
        global $smarty;
        $categories = CategoriesModel::countItemsCategory();//извлекаем категории и количество товаров в них
        $smarty->assign('categories', $categories);
        $smarty->display('admin/category.tpl');
    }

    /**
     * Добавим категории сохраним в БД используя CategoriesModel метод save()
     */

    public function category_create()
    {
        $category = new CategoriesModel();
        $category->name = trim(filter_var($_POST['category'], FILTER_SANITIZE_STRING));
        $error = '';
        switch (true) {//проверим передаваемые данные
            case strlen($category->name) < 2:
                $error = 'Категория не может быть кароче 2х символов.';
                break;
        }
        if ($error != '') {
            die($error);
            exit();
        }
        $category->save() ? header('Location:' . $_SERVER['HTTP_REFERER']) : die('error CategoriesModel / save');// если вернуло
        // true перезагрузим страницу, иначе в базу не записало ошибка
    }

    public function category_remove()
    {
        $category = CategoriesModel::find($_GET['id']);//проверим существует ли категория, если существует
        // то мы полуим экземпляр класса CategoriesModel который мы вызвали в find() из самого себя $model = new self()
        if(!$category instanceof  CategoriesModel){//является ли текущий объект экземпляром указанного класса,
            // то есть мы проверили создался или нет экземпляр класса, если да то такой id существует в базе
            die('Category not found');
        }
        $category->remove() ? header('Location:' . $_SERVER['HTTP_REFERER']) : die('error CategoriesModel / remove');// если вернуло
        // true перезагрузим страницу, иначе ошибка, не удалили ничего.
    }

}

