<?php

use \interfaces\ControllerInterfaces as Controller; //укажем алиасы что бы после implements не писать путь

class CartController implements Controller
{

    /**
     * @throws SmartyException
     * вывод корзины
     */
    public function index()
    {
        global $smarty;
        $items = CartModel::getItems();// получаем массив товаров корзины
        $total = 0;// итого
        foreach ($items as $item) {// общее кол-во товара * на цену
            $total += $item['count'] * $item['price'];
        }
        $smarty->assign('total', $total);// итого
        $smarty->assign('items', $items); // передаем в смарти массив с товарами кoрзины для отображения
        $smarty->display('cart.tpl');

    }

    /**
     * @param null $id
     * добавим товар в корзину
     * для того что бы использовать метод не только при добавлении товара с сайта методом GET, но и дать возможность
     * вызывать его из метода inc укажем необезятельный парраметр $id - add($id=null)
     */

    public function add($id = null)// не обязательный параметр. по умолчанию null
    {
        $item_id = $id ?: $_GET['id'];//(короткий тернарный if - ?:)
        //если существет $id присваеваем $id иначе получает id товаров из кнопри корзина $_GET['id']
        $cart_items = Session::get('cart', []);//создаем массив товаров корзины сессии
        // добавим id товара в корзину
        if (!isset($cart_items[$item_id]['count'])) {//группируем и считаем кол-во товара в массиве $cart_items

            $cart_items[$item_id]['count'] = 1; // если массив не не существует(т.е это первое id товара) колво
            // count =1
        } else {
            $cart_items[$item_id]['count'] += 1; // массив существует +1
        }
        Session::set('cart', $cart_items);//создадим сессию cart со значением cart_items
        header('Location:' . $_SERVER['HTTP_REFERER']);// чтоб не было видно GET параметра при добавлении товара в корзину, перенаправим
        //пользователя туда откуда он пришел, для этого используем суперглобальный массив $_SERVER
    }

    /**
     * @return int
     * считаем колво товара в корзине
     */
    public static function getItemsCount()
    {
        $items = Session::get('cart', []); //вызываем сессию cart с ее массивом []
        $count = 0;
        foreach ($items as $item) {
            $count += $item['count'];// суммируем все значения $cart_items[$item_id]['count']
        }
        return $count;
    }

    /**
     * увеличить колво товара в корзине
     */

    public function inc()
    {
        $items_id = (int)$_GET['id'];
        $item = ItemsModel::getItemById($items_id);//проверяем существует ли товар в БД
        if (!$item) {
            die('404');
        }
        $this->add($items_id);
    }

    /**
     * Уменьшить кол-во товара в корзине
     */

    public function dec()
    {
        $item_id = (int)$_GET['id'];
        $item = ItemsModel::getItemById($item_id);//проверяем существует ли товар в БД
        if (!$item) {
            die('404');
        }
        $cart_items = Session::get('cart', []);//создаем массив товаров корзины сессии
        $cart_items[$item_id]['count'] -= 1; // удалим id товара из корзины

        if ($cart_items[$item_id]['count'] < 1) {//если количество меньше 1 переходим на удаление
            $this->remove($item_id);
            return;
        } else {
            Session::set('cart', $cart_items);//иначе записываем в сессию массив корзины
            header('Location:' . $_SERVER['HTTP_REFERER']);// переход назад в корзину
        }
    }

    /**
     * @param null $id
     * удалить товар из корзины
     */

    public function remove($id = null)
    {
        $item_id = $id ?: $_GET['id'];//получаем id товара или из dec()
        $items = Session::get('cart', []);//извлекаем из сессии массив корзины
        if (!isset($items[$item_id])) {//если если товар с таким id не существует
            return;//выход
        }
        unset($items[$item_id]); //удаляем из массива карзины хранящегося в сессии товар по id
        Session::set('cart', $items);//записываем в сессию новый массив корзины
        header('Location:' . $_SERVER['HTTP_REFERER']);//переход в корзину
    }



    //тест метод товар в корзине
    public function test()
    {
        var_dump(Session::get('cart'));
    }

    public function del()
    {
        Session::remove('cart');
    }
}