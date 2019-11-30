<?php

use \interfaces\ControllerInterfaces as Controller;

class OrderController implements Controller

{
    /**
     * @throws SmartyException
     * метод по умолчанию ля созранения заказа
     */
    public function index()
    {
        global $smarty;
        $success = $_GET['msg'];// в create создаем GET параметр msg
        if ($success === 'success') {
            $smarty->display('order_success.tpl');//msg OK

        } else {
            $smarty->display('order_error.tpl');//msg error
        }
    }

    /**
     * @throws SmartyException
     * Выведем список всех заказов пользователя
     */

    public function all()
    {
        global $smarty;
        if (!Session::checkUserOut()) {//проверим залогинен ли пользователь
            header('Location: /users/login');//если нет на логин
        }
        $user = Session::get('user');//извлекаем данные о юзвере из сессии
        $user_id = $user['id'];
        $orders = OrderModel::getOrders($user_id);
        foreach ($orders as &$order){//амперсант передает по ссылке значения в $orders из $order и унас будет изменен
            // оригинал $orders через локальную копию $order.
            $order['items'] = trim($order['items'], '.');//encode ставит точки в начале и конце в JSON
            // удаляем эти точки. не знаю по чему ставит
            $order['items']=json_decode($order['items'],true);//из json в массив, ссоциативный массив true
        }
        $count=1;
        $smarty->assign('count',$count);
        $smarty->assign('orders', $orders);
        $smarty->display('order_list.tpl');
    }

    /**
     * Создадим заказ сохраним его в БД
     */

    public function create()
    {
        if (!Session::checkUserOut()) {//проверим залогинен ли пользователь
            header('Location: /users/login');//если нет на логин
            return;
        }
        $items = Session::get('cart', []);//вытаскиваем из сессии массив корзины
        if (empty($items)) {
            die("Нет добавленных товаров");
        }
        $items = json_encode(CartModel::getItems());//получим товары корзины из базы и закодируем их в json
        $user = Session::get('user');//извлекаем данные о юзвере из сессии
        $user_id = $user['id'];
        $res = OrderModel::setOrders($user_id, $items);//запишем данные в БД и вернем из OrderModel::create true или false
        if ($res) {
            header('Location: /order/index?msg=success');
            Session::remove('cart');//если ордер в базу успено внесен, удаляем корзину
        } else {
            header('Location: /order/index?msg=error');
        }
    }
}