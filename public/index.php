<?php
require_once '../libs/smarty/Smarty.class.php';//подключаем шаблонизатор смарти
require_once '../interfaces/ControllerInterfaces.php';//подключим интерфейс, не проходит в автолоад не знаю по чему

/*autoload classes*/

spl_autoload_register(function ($class) {

    $patch = '../%s/' . $class . '.php';// используем sprintf в шаблон %s вставим строку %S- строка

    switch (true) {
        case strpos($class, 'Controller')://что-бы разделить классы controller и Models ищим первое вхождение в строку strpos
            $patch = sprintf($patch, 'controllers');// подставляем в шаблон аргумент controllers вместо %S
            break;
        case strpos($class, 'Model'):
            $patch = sprintf($patch, 'models');
            break;
        case strpos($class, 'Trait'):
            $patch = sprintf($patch, 'traits');
            break;


        default :
            $patch = sprintf($patch, 'classes');
            break;

    }

    (file_exists($patch)) ? require_once($patch) : die('404 ' . $class . ' not fount!');

});
/*подключим шаблонизатор smarty*/
$smarty = new Smarty();//создаем класс смарти
$smarty->setTemplateDir('../views');//указываем где будут находиться файлы шаблонизатора

/*Старт сессия*/
Session::start();
$smarty->assign('cart_count', CartController::getItemsCount());// кол-во товара в корзине


/*Роутер*/
$data = ltrim($_SERVER['REQUEST_URI'], '/');// при помощи суперглобального массива получаем URL,
// так как при использовании explode, первым элементом массива будет пустой элемен [0] => то нам нужно удалить первый слеш. ltrim
$data = array_shift(explode('?', $data));//array_shift отрезаем параметр, array_shift извлекает первый элемент массива
$data = explode('/', $data);//разделяем массив
$controller = ($data == [""] || !$data) ? 'MainController' : ucfirst(array_shift($data)) . 'Controller';
//если пустой контроллер, тогда переводим на дефолтный класс, ucfirst - делаем первую букву заглавной, т.к это класс
$action = ($data == [""] || !$data) ? 'index' : array_shift($data);
//пустой метод, переводим на дефолтный метод, дефолтный метод должен быть во всех классах
$params = ($data) ?: [];//if($data){return $data;} return [] ; $params - GET Параметр в URL
//проверка на админа
if ($controller === 'AdminController' && Session::get('user', ['login' => ''])['login'] !== 'admin') {
    //если контроллер Admin а пользователь не admin ошибка доступа 404
    die('404 - не завезли таких страниц ;)');
}
$controllerObj = new $controller();//создадим экземпляв класса контроллер
if (!method_exists($controllerObj, $action)) {//если метод $action класса $controllerObj не существует
    die('404 ' . $action . ' method not exists');
}
$controllerObj->$action();

die();