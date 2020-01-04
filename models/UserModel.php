<?php

class UserModel
{
    public $login;
    public $pass;

    /**
     * @return bool
     * регистрация пользователя
     */
    public function registrUser(){

        $user=$this->getUserByLogin($this->login);//проверяем в БД наличие пользователя

        if($user){
           //если есть в БД
            die('User exist');
        }
        //если нет в БД регистрируем
        $login=$this->login;
        $pass=$this->pass;
        $dbh=DB::getInstance();//подключаем экземпляр БД
        $res=$dbh->prepare("INSERT INTO users(login,pass, date) VALUES (?,?,?)");
        $res->execute([$login, $pass,time()]);
        $this->loginUser();//авторизуем нового пользователя должен сущемтвовать метод LoginUser
        return (bool) $res->rowCount();//что бы проверить внесен ли пользователь в БД приводим к логическому виду колличество затронутых
        // строк rowCount(). Проверку осуществляем в UsersController
    }

    /**
     * проверяем на наличие пользователя в БД getUserByLogin()
     *
     */
    public function  loginUser(){
        $user = $this->getUserByLogin($this->login);
        $pass=$this->pass;//пароль переданный пользователем
        if ($user['pass']==$pass){
            Session::set('user',$user);//записываем данные пользователя в суперглобальный массив SESSION класс Session метод set
        return true;
        }
        return false;
    }

    /**
     * @param $login
     * @return mixed
     * во время регистрации проверяем существует ли в БД данный логин
     */
    public function getUserByLogin($login){//проверяем в БД наличие пользователя
        $dbh=DB::getInstance();//подключаем БД
        $query = 'SELECT * FROM `users` WHERE `login` = :login';
        $res=$dbh->prepare($query);
        $res->execute([':login'=>$login]);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     * извлекаем список пользователей
     */
    public static function userList(){
        $dbh=DB::getInstance();
        $res = $dbh->prepare('SELECT `id`,`login` FROM `users` ');
        $res ->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}