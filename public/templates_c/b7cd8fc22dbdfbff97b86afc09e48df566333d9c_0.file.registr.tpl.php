<?php
/* Smarty version 3.1.33, created on 2019-11-10 15:38:46
  from 'D:\php\domains\MVC\views\registr.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dc804d6696b83_58172277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7cd8fc22dbdfbff97b86afc09e48df566333d9c' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\registr.tpl',
      1 => 1573389510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dc804d6696b83_58172277 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7899705235dc804d6695781_70737826', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19373768225dc804d6696453_17673217', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_7899705235dc804d6695781_70737826 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_7899705235dc804d6695781_70737826',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Регистрация на сайте<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_19373768225dc804d6696453_17673217 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_19373768225dc804d6696453_17673217',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <h2>Регистрация на сайте:</h2>
        <form action="/users/registr" method="post">
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
                    <input type="submit" class="btn btn-secondary mt-2" value="Регистрация">
                </div>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block 'body'} */
}
