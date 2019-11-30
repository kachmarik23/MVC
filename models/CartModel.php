<?php


class CartModel
{
    /**
     * @return array
     * извлекаем из базы товары которые находятся в корзине
     *
     */
    public static function getItems()
    {
        $session_items = Session::get('cart', []); // извлекаем из сессии массив корзины
        $keys = array_keys($session_items); // отколупываем ключи, т.к массив вложенный и id товара является ключем к
        // count(кол-ву) товара
        if (empty($keys)) {
            return [];
        }
        $items = ItemsModel::getCartItems($keys);//получим данные  из БД
        //склеем два массива, данные извеченные из БД и данные из сессии
        $result = [];
        foreach ($items as $index => $item) {
            $result[$index]['id'] = $item['id'];
            $result[$index]['name'] = $item['name'];
            $result[$index]['price'] = $item['price'];
            $result[$index]['count'] = $session_items[$item['id']]['count'];//
        }
        return $result;
    }

}