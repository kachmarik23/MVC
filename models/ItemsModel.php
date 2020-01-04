<?php

class ItemsModel
{
    /**
     * @var
     * public чтоб не переавать в функцию save ()
     */
    public $name;
    public $price;
    public $description;
    public $category_id;

    const CECH_KEY ='items';
    const CECHE_TTL=86400;// установим значение $expire времени кеширования

    /**
     * @return array
     * извлекаем список товаров
     */
    public static function itemsList()
    {
        $cacheKey = self::CECH_KEY;
        $cachedItems = Cache::get($cacheKey);
        if ($cachedItems){
            return $cachedItems;
        }
        $dbh = DB::getInstance();
        $res = $dbh->prepare('SELECT * FROM `items` ');
        $res->execute();
        $items = $res->fetchAll(PDO::FETCH_ASSOC);
        Cache::set($cacheKey,$items,self::CECHE_TTL);
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
     * @return false|PDOStatement
     * проверка существует ли добавляемый/уменьшаемый товар в cart для CartController inc
     */

    public static function getItemById($id)
    {
        $query = 'SELECT * FROM items WHERE id= ' . $id . ' LIMIT 1';
        $dbh = DB::getInstance();
        return $dbh->query($query, PDO::FETCH_ASSOC);

    }

    /**
     * Сохраним созданный товар в БД, сохраним картинку товара
     */
    public function save()
    {
        // згрузка файлов

        $uploads_dir = 'images';//дериктория куда сохраняем
        if (!is_dir($uploads_dir)) mkdir($uploads_dir, 0777);
        $tmp_file = $_FILES['file']['tmp_name'];//имя временного файла, выясняем из массива $_FILES, print_r($_FILES)
        $name= $_FILES['file']['name'];
        $name_pic =Translit::cyrillic($name);
        move_uploaded_file($tmp_file, "$uploads_dir/$name_pic");//переносим файл из временного хранилища в папку images
        $query = "INSERT INTO items (`name`, `description`, `price`, `category_id`,`pic`) VALUES (?,?,?,?,?)";
        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([$this->name, $this->description, $this->price, $this->category_id, $name_pic]);//$this по тому что переменный public
        Cache::forget(self::CECH_KEY);
        return(bool)$dbh->lastInsertId(); // Последний добавленный id, проверка

    }

}