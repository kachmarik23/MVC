<?php


class SearchModel
{
    const CECHE_TTL=86400;
    /**
     * @param $text
     * @return array
     * поиск по БД items
     */
    public static function search($text)
    {
        if (empty($text)){ // если пустой запрос
            return [];
        }
        $key = 'search_'.$text;//ключ имя в кеше
        $cache_search = Cache::get($key);// получим данные из кеша
        if ($cache_search){
            return [
                'cache'=>'true',// это что бы видеть в консоле из кеша анные или нет
                'data'=>$cache_search
            ];
        }
        $text='%'.$text.'%'; //переменную получаем из searchController/make
        $query = "SELECT * FROM `items` WHERE  `name` LIKE ? LIMIT 10";
        $dbh=DB::getInstance();
        $res=$dbh->prepare($query);
        $res->execute([$text]);
        $search=$res->fetchAll(PDO::FETCH_ASSOC);
        Cache::set($key,$search,self::CECHE_TTL);//записываем данные в кеш
        return [
            'cache'=>'false',// это что бы видеть в консоле из кеша анные или нет
            'data'=>$search
        ];
    }
}