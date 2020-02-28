<?php

class ItemsModel
{
    /**
     * @var
     * public чтоб не переавать в функцию save ()
     */
    public $name;
    public $intro;
    public $price;
    public $description;
    public $category_id;
    public $name_pic;
    public $quantity;
    public $id;

    const CECH_KEY = 'items';
    const CECHE_TTL = 86400;// установим значение $expire времени кеширования

    /**
     * @return array
     * извлекаем список товаров
     */
    public static function itemsList()
    {
        $cacheKey = self::CECH_KEY;
        $cachedItems = Cache::get($cacheKey);
        if ($cachedItems) {
            return $cachedItems;
        }
        $dbh = DB::getInstance();
        $res = $dbh->prepare('SELECT * FROM `items` ');
        $res->execute();
        $items = $res->fetchAll(PDO::FETCH_ASSOC);
        Cache::set($cacheKey, $items, self::CECHE_TTL);
        return $items;
    }

    /**
     * @param $id
     * @return array
     * извлекаем товары по категориям ID категории берем из url $params В CategoriesController
     */
    public static function itemsByCategoriesID($id)
    {
        $dbh = DB::getInstance();
        $res = $dbh->prepare('SELECT * FROM `items` WHERE `category_id`=:id');
        $res->execute([':id' => $id]);
        return $res->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * @param $ids
     * @return array
     * Для товаров в корзине получим наименование и цену из БД
     */

    public static function getCartItems($ids)
    {//$ids это kay из getItems.
        $inQuery = implode(',', $ids);// обеденим элементы массива в строку
        $dbh = DB::getInstance();
        $res = $dbh->prepare('SELECT `id`,`name`,`price` FROM `items` WHERE id IN(' . $inQuery . ')');//IN позволяет
        // определить, совпадает ли значение объекта со значением в списке.
        $res->execute($ids);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return ItemsModel|null
     */

    public static function getItemById($id)
    {
        $dbh = DB::getInstance();
        $query = 'SELECT * FROM `items` WHERE `id` = :id LIMIT 1';
        $res = $dbh->prepare($query);
        $res->execute([':id' => $id]);
        $items = $res->fetchAll(PDO::FETCH_ASSOC);
        if (!isset($items[0]['name'])) {
            return null;
        }
        $model = new self();//создает экземпляр класса самого себя $model (экземпляр класса внутри которого мы находимся)
        $model->name_pic = $items[0]['pic'];// прописываем имя
        $model->id = $items[0]['id'];// прописываем id
        return $model;// возвращемем назад в AdminController
    }

    /**
     * Сохраним созданный товар в БД, сохраним картинку товара
     */
    public function save()
    {
        $query = "INSERT INTO items (`name`,`intro`, `description`, `price`, `category_id`,`quantity`,`pic`) VALUES (?,?,?,?,?,?,?)";
        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([$this->name, $this->intro, $this->description, $this->price, $this->category_id, $this->quantity, $this->name_pic]);//$this по тому что переменный public
        Cache::forget(self::CECH_KEY);
        Cache::clearSearch();
        return (bool)$dbh->lastInsertId(); // Последний добавленный id, проверка

    }

    public function remove()
    {
        $query = 'DELETE FROM `items` WHERE `id` = :id LIMIT 1';//не забываем лимит
        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([':id' => $this->id]);//id == $model->id экземпляр $model созданный в find($id) через new self()
        Cache::forget(self::CECH_KEY);//очистить кеш
        unlink('images/'.$this->name_pic);
        return 'images/'.$this->name_pic;// количество строк, затронутых последним SQL-запросом, если вернуло false
    }

    public function update()
    {

    }


}