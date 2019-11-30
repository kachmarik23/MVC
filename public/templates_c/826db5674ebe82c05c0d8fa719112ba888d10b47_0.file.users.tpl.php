<?php
/* Smarty version 3.1.33, created on 2019-11-23 17:20:31
  from 'D:\php\domains\MVC\views\users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd9402f676d88_00065388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '826db5674ebe82c05c0d8fa719112ba888d10b47' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\users.tpl',
      1 => 1573386885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dd9402f676d88_00065388 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2522346155dd9402f661e10_14569803', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20826650695dd9402f662af6_42721770', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_2522346155dd9402f661e10_14569803 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2522346155dd9402f661e10_14569803',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Список пользователей<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_20826650695dd9402f662af6_42721770 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20826650695dd9402f662af6_42721770',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h2>Пользователи:</h2>
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Login</th>
        </thead>
        <tbody>
        <!-- начало цикла -->
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?><!-- управляющая конструкция пишется в фигурных скобках-->
        <tr <?php if (($_smarty_tpl->tpl_vars['user']->value['id'] == ($_SESSION['user']['id']) && $_smarty_tpl->tpl_vars['user']->value['login'] === ($_SESSION['user']['login']))) {?>class="bg-info"<?php }?>>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
</td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><!-- окончание цикла -->
        </tbody>
    </table>
<?php
}
}
/* {/block 'body'} */
}
