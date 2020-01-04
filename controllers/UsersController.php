<?php


class UsersController
{
    use ResponseTrait;
    /**
     * @throws SmartyException
     * регестрация пользователя в класс UserModel передаем
     * $user->login
     * &
     * $user->pass
     * в registrUser() происходит регистрация
     */
    public function registr()//для регистрации вызываем класс Users метод registr в урл, все через урл
    {
        if (!empty($_POST['login']) && !empty($_POST['pass'])) {
            $user = new UserModel();//создаем класс экземпляра UserModel
            $login = strip_tags(trim($_POST['login'])); //передаем логин
            $user->login=$login;
            $res = $user->getUserByLogin($user->login);
            if($res){
                $this->getResponse(['success' => false, 'err'=> ' Такой логин занят']);
            }
            $pass=strip_tags(trim($_POST['pass']));
            $err=ControlErr::users($login,$pass);
            if ($err)
            {
                $this->getResponse(['success' => false, 'err' => $err]);//если есть ошибки используя ф-цию переводим в json сообщение об ошибке
            }
            $hash = "jkjpou4689RUS78Dkhj56gyg19";
            $user->pass = md5($pass. $hash);

            $resReg = $user->registrUser();//вызываем метод registrUser из UserModel и он нам возвращает логическое
            // значение затронутых строк в базе return (bool) $res->rowCount()

            $this->getResponse(['success' => $resReg, 'err' => ' Не удалось зарегистрировать пользователя.']);
            // нет
        }

        $this->getResponse(['success' => false, 'err' => ' Поля лоин и пароль обязательны для заполнения!']);
    }

    /**
     * @throws SmartyException
     * //для авторизачии вызываем класс Users метод login в урл, все через урл
     */
    public function login()
    {
        if (!empty($_POST['login']) && !empty($_POST['pass'])) {
            $user = new UserModel();//создаем класс экземпляра UserModel
            $user->login = strip_tags(trim($_POST['login'])); //передаем логин
            $hash = "jkjpou4689RUS78Dkhj56gyg19";
            $user->pass = md5(strip_tags(trim($_POST['pass'])) . $hash);
            $res = $user->loginUser();//вызываем метод loginUser из UserModel и он нам возвращает логическое
            // значение затронутых строк в базе return (bool) $res->rowCount()
            $this->getResponse(['success' => $res, 'err'=>' Имя пользователя или пароль указаны не верно.']);
            /*   if (Session::get('user', ['login' => ''])['login'] !== 'admin') {// если пользователь админ
                   ($res) ? header('Location: /main') : die('ERROR');// проверка getUserByLogin
               }else{
                   header('Location: /admin');//переход на сраницу администрирования
               }*/
        }
            $this->getResponse(['success' => false, 'err' => ' Поля лоин и пароль обязательны для заполнения!']);
    }

    /**
     * Выход, убить сессию вызываем метод flash из session.php
     */
    public function logout()
    {
        Session::flash();
        header('Location: /main');
    }

    /**
     * @throws SmartyException
     * контроллер отображает всех пользователей
     */
   /* public function all()
    {
        $list = UserModel::userList();

        global $smarty;// смартли глобальный класс мы его в index вызвали
        $smarty->assign('users', $list);// передаем в смартли переменную $list по ключу 'users'
        $smarty->display('users.tpl');//вызываем шаблон

    }*/

    /**
     * проверяем авторизация пользователя
     */
    public function check()
    {
        if (!Session::get('user')) {
            die('non LogIn');
        };
        die('logged in');

    }



}