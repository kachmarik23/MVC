<?php
use \interfaces\ControllerInterfaces as Controller;

class SearchController implements Controller
{

    public function index()
    {
        global $smarty;
        $smarty->display('serch.tpl');
    }
}