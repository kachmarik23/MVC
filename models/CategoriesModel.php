<?php

class CategoriesModel
{

    public $name;
    public $id;

    const CECH_KEY ='categories';//наименование кеша
    const CECHE_TTL=86400;// установим значение $expire времени кеширования

    /**
     * @return array
     * извлекаем список категорий
     */
    public static function categoryList()
    {
        $cache_key = self::CECH_KEY;//ключ категории
        $cachedCategories = Cache::get($cache_key );//извлечем данные из кеш
        if ($cachedCategories){//если не пусто то вернем данные кеша
           return $cachedCategories;
        }
        //если нет кеша берем из БД
        $dbh = DB::getInstance();
        $res = $dbh->prepare('SELECT * FROM `categories` ORDER BY `name` ASC ');// сортировка столбца name
        // по алфавиту ORDER BY `name` ASC
        $res->execute();
        $categories = $res->fetchAll(PDO::FETCH_ASSOC);
        Cache::set($cache_key,$categories,self::CECHE_TTL);// записываем в кеш
        return $categories;//вернем данные взятые из БД
    }

    /**
     * @return array
     * извлекаем список категорий и Считаем количество товаров в категории
     */

    public static function countItemsCategory()
    {
        $categories = CategoriesModel::categoryList();//извлекаем список категорий
        $dbh = DB::getInstance();
        foreach ($categories as &$category) {//в массив $categories добавим количество находящихся товаров в данной категории
            $res = $dbh->query('SELECT COUNT(*) AS count FROM `items` WHERE `category_id` IN(' . $category['id'] . ')GROUP BY `category_id` ');
            $items = $res->fetchAll(PDO::FETCH_ASSOC);
            $category[] .= ($items[0] ['count']);
        }
        return $categories;


    }

    /**
     * @return bool
     * Внесем в БД категории
     * !!!!!!!Что бы не возникало колизий на уровне БД делаем это поле уникальным !!!!!!!!
     */

    public function save()
    {
        $query = 'INSERT INTO categories(`name`) VALUES (?)';
        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([$this->name]);//$this по тому что global
        Cache::forget(self::CECH_KEY);//очистить кеш
        return $dbh->lastInsertId();//проверим если вставило вернет 1 если нет 0
    }

    /**
     * @param $id
     * @return CategoriesModel|null
     * Поиск в БД по id имени удаляемого класса, находим и возвращаем в  AdminController
     * это важная проверка если есть удаляем, если нет осылаем))).
     * мы по id находим строку, потом  создаем экземпляр класса из самого себя передаем id и имя
     */

    public static function find($id)//id получаем из AdminController
    {
        $query = 'SELECT * FROM categories WHERE id=:id LIMIT 1';

        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([':id' => $id]);
        $res = $res->fetchAll(PDO::FETCH_ASSOC);

        if (!isset($res[0]['name'])) {
            return null;
        }
        $model = new self();//создает экземпляр класса самого себя $model (экземпляр класса внутри которого мы находимся)
        $model->name = $res[0]['name'];// прописываем имя
        $model->id = $res[0]['id'];// прописываем id
        return $model;// возвращемем назад в AdminController
    }

    /**
     * @return bool
     * Удаляем из базы категорию
     */

    public function remove()
    {

        $query = 'DELETE FROM categories WHERE id=:id LIMIT 1';//не забываем лимит
        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([':id' => $this->id]);//id == $model->id экземпляр $model созданный в find($id) через new self()
        Cache::forget(self::CECH_KEY);//очистить кеш
        return (bool)$res->rowCount();// количество строк, затронутых последним SQL-запросом, если вернуло false

    }

    public function update()
    {

        $query = 'UPDATE `categories` SET `name`=:name WHERE `id` = :id LIMIT 1';//не забываем лимит
        $dbh = DB::getInstance();
        $res = $dbh->prepare($query);
        $res->execute([':name' => $this->name, ':id' => $this->id]);//id == $model->id экземпляр $model созданный в find($id) через new self()
        Cache::forget(self::CECH_KEY);//очистить кеш
        return (bool)$res->rowCount();// количество строк, затронутых последним SQL-запросом, если вернуло false

    }
}