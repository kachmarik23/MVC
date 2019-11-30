<?php
/* Smarty version 3.1.33, created on 2019-11-24 01:53:00
  from 'D:\php\domains\MVC\views\order_success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd9b84c62f085_58166785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91599ee51bbaa7fc975d162f525f880a53717ea9' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\order_success.tpl',
      1 => 1574544495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dd9b84c62f085_58166785 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9911982475dd9b84c62d924_47319967', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5759530095dd9b84c62e812_14107964', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_9911982475dd9b84c62d924_47319967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9911982475dd9b84c62d924_47319967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Заказ оформлен<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_5759530095dd9b84c62e812_14107964 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_5759530095dd9b84c62e812_14107964',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    Order successful created
<?php
}
}
/* {/block 'body'} */
}
