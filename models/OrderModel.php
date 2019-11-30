<?php


class OrderModel
{
    /**
     * @param $user_id
     * @param $items
     * @return bool
     * Сохраним в БД табл. order данные о заказе
     */
    public static function setOrders($user_id, $items)
    {
        $query = "INSERT INTO `orders` SET `user_id` = '.$user_id.', `items` = '.$items.'";
        $dbh = DB::getInstance();
        $dbh->query($query);
        if ($dbh->lastInsertId()) {
            return true;//если удачно то возвращаем ок в OrderController -> index
        }
        return false;
    }

    /**
     * @param null $user_id
     * @return array
     * Извлекаем из базы все заказы пользователя
     */

    public static function getOrders($user_id = null)// $user_id = null для того чтобы получать заказы
        // всех пользователей из админки
    {
        $dbh=DB::getInstance();
        $query = 'SELECT * FROM `orders`';
        if ($user_id){
            $query.=' WHERE `user_id` = ?';
        }
        $res=$dbh->prepare($query);
        $res->execute([$user_id]);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}