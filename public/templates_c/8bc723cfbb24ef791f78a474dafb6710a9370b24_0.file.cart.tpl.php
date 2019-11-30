<?php
/* Smarty version 3.1.33, created on 2019-11-24 01:55:48
  from 'D:\php\domains\MVC\views\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd9b8f452b342_76238470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bc723cfbb24ef791f78a474dafb6710a9370b24' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\cart.tpl',
      1 => 1574549746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dd9b8f452b342_76238470 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3957804855dd9b8f4519946_11327264', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12879708085dd9b8f451a496_76758301', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_3957804855dd9b8f4519946_11327264 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3957804855dd9b8f4519946_11327264',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Корзина<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_12879708085dd9b8f451a496_76758301 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12879708085dd9b8f451a496_76758301',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <h2>Корзина:</h2>
        <div class="row">
        <?php if (!empty($_smarty_tpl->tpl_vars['items']->value)) {?>
        <table class="table  table-striped">
            <thead class="thead-dark">
            <th>Наименование</th>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Всего</th>
            <th>Удалить</th>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 ($)</td>
                    <td><a href="/cart/inc?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> + </a><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
<a
                                href="/cart/dec?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> - </a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count']*$_smarty_tpl->tpl_vars['item']->value['price'];?>
 ($)</td>
                    <td><a href="/cart/remove?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
            <div class="col-md-12">
        <div class="text-right mr-5 mb-3 ">Итого: <u><b><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ($)</b></u></div>
        <div class="text-right mr-5">
            <a href="/order/create"><button class="btn btn-success">Сделать заказ</button></a>
        </div>
            </div>
            <?php } else { ?>
            В корзине нет товаров...(
        <?php }?>
        </div>
    </div>
<?php
}
}
/* {/block 'body'} */
}
