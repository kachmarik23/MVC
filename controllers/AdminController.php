<?php


class AdminController
{
    use ResponseTrait;
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
     * Добавить товар в админке
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
        ControlErr::items($items->name, $items->description, $items->price, $items->category_id);
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
        $category->name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $err = ControlErr::categoty($category->name);//проверим введенные пользователем данные

        if ($err)
        {
            $this->getResponse(['success' => false, 'err'=>$err]);//если есть ошибки используя ф-цию переводим в json сообщение об ошибке
        }
        $category_id = $category->save(); //сохраним категорию и получим последнее вставленное id
        $this->getResponse(['success' => (bool)$category_id, 'id'=>$category_id]); //возвращаем в функцию $.ajax объект  Object { success: true, id: "16" }

    }

    public function category_update()
    {

        $category = CategoriesModel::find($_POST['id']);//проверим существует ли категория, если существует
        // то мы полуим экземпляр класса CategoriesModel который мы вызвали в find() из самого себя $model = new self()
        if (!$category) {
            $this->getResponse([
                'success' => false, 'err'=>'пусто'
            ]);
        }
        $category->name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));//передадим name из массива POST

        $err = ControlErr::categoty($category->name);
        if ($err) {
            $this->getResponse(['success' => false, 'err'=> $err]);
        }
        $res = $category->update();//в CategoriesModel обналяем категорию
        if (!$res) {
            $this->getResponse(['success' => $res,'err'=>' Не удалось обновить категорию']);
        }
    }

    public function category_remove()
    {
        $category = CategoriesModel::find($_POST['id']);//проверим существует ли категория, если существует
        // то мы полуим экземпляр класса CategoriesModel который мы вызвали в find() из самого себя $model = new self()
        if (!$category instanceof CategoriesModel) {//является ли текущий объект экземпляром указанного класса,
            // то есть мы проверили создался или нет экземпляр класса, если да то такой id существует в базе
            $this->getResponse([
                'success' => false
            ]);
        }
       $res = $category->remove();// удаляем категорию
        $this->getResponse(['success' => $res]);

    }


}

