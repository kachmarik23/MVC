<?php
/* Smarty version 3.1.33, created on 2019-11-10 17:11:07
  from 'D:\php\domains\MVC\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dc81a7b58f2d1_08489204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4aa98e63cf1bc361a082416902f7b3db48151b62' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\login.tpl',
      1 => 1573389522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dc81a7b58f2d1_08489204 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8067459805dc81a7b58db56_17868424', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6646281145dc81a7b58e793_04303692', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_8067459805dc81a7b58db56_17868424 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8067459805dc81a7b58db56_17868424',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Вход<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_6646281145dc81a7b58e793_04303692 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6646281145dc81a7b58e793_04303692',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <h2>Вход на сайт</h2>

        <form action="/users/login" method="post">
            <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Логин:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин">
                </div>
            </div>
            <div class="form-group row">
                <label for="pass" class="col-sm-2 col-form-label">Пароль:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Введите пароль">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary mt-2" value="Войти">
                </div>
        </form>
    </div>
<?php
}
}
/* {/block 'body'} */
}
