<?php


class CategoriesController
{
    /**
     * @throws SmartyException
     * Товары по категориям
     */
    public function items()
    {
        global $params;
        $categories = CategoriesModel::countItemsCategory();//извлекаем категории и количество товаров в них
        $items = ItemsModel::itemsByCategoriesID($params[0]);//товары по категориям $params мы получаем из урл в index.php там где разделяем урл строку
        global $smarty;
        $smarty->assign('params', $params[0]);
        $smarty->assign('items', $items);
        $smarty->assign('categories', $categories);
        $smarty->display('main.tpl');
    }

}
