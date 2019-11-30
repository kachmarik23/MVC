<?php
//
use \interfaces\ControllerInterfaces as Controller; //укажем алиасы что бы после implements не писать путь


class MainController  implements Controller //подключили интерфейс  implements
{
    public function index()
    {
        global $smarty;
        $categories = CategoriesModel::countItemsCategory();//извлекаем категории и количество товаров в них
        $items=ItemsModel::itemsList();//извлекаем список товаров
        $smarty->assign('items',$items);
        $smarty->assign('categories',$categories);

        $smarty->display('main.tpl');
    }

    public function items(){

    }
}
