<?php

use \interfaces\ControllerInterfaces as Controller;

class SearchController implements Controller
{

    public function index()
    {
        global $smarty;
        $smarty->display('search.tpl');
    }

    public function make()
    {
        $text = htmlspecialchars(trim($_POST['text']));// получаем из search.tpl
        header('Content-Type: application/json');
        $res = SearchModel::search($text);
        die(json_encode($res));
    }

    /**
     * cURL вместо аякса используем cURL обращаемся к search/make
     * в функции make()  нужно заменить POST на GET так как в test у нас GET запрос
     */
    public function test()
    {
        // create curl resource
        $ch = curl_init();

// set url https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11
        curl_setopt($ch, CURLOPT_URL, "http://mvc/search/make?text=теле");

//return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
        $output = curl_exec($ch);

// close curl resource to free up system resources
        curl_close($ch);

        header('Content-Type: application/json');
        die($output);
    }

    /**
     * CURLOPT_POSTFIELDS
     * передача данных етором ПОСТ в виде массива
     */
    public function curlpost()
    {
        // cоздаем ресус cURL
        $ch = curl_init();

// set url
        curl_setopt($ch, CURLOPT_URL, "http://mvc/search/make");

//return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// TRUE для использования обычного HTTP POST
        curl_setopt($ch, CURLOPT_POST, 1);
// 	Все данные, передаваемые в HTTP POST-запросе. Этот параметр может быть передан как в качестве
// url-закодированной строки, наподобие 'para1=val1&para2=val2&...', так и в виде массива,
// ключами которого будут имена полей, а значениями - их содержимое.
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['text' => 'теле']);

// $output contains the output string
        $output = curl_exec($ch);

// close curl resource to free up system resources
        curl_close($ch);
        $data = json_decode($output, true);
        print_r($data);
        die();
    }

    /**
     * Это грабер
     */
    public function curltest()
    {
header('Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        print_r($output);
        die();
    }

    /**
     * простой способ получить контент
     * пригоден только для GET
     */

    public function test2()
    {
        $data = file_get_contents("https://qna.habr.com/");
        die($data);
    }


}