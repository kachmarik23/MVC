<?php
/* Smarty version 3.1.33, created on 2019-11-24 22:55:43
  from 'D:\php\domains\MVC\views\admin\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddae03fe77286_43389125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71baee4c2eeafc39394f709a4c62953597a101b2' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\admin\\index.tpl',
      1 => 1574625338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddae03fe77286_43389125 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7519838245ddae03fe64710_34142935', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12330011625ddae03fe652d1_97568268', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "admin/layout.tpl");
}
/* {block 'title'} */
class Block_7519838245ddae03fe64710_34142935 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_7519838245ddae03fe64710_34142935',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Заказы<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_12330011625ddae03fe652d1_97568268 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12330011625ddae03fe652d1_97568268',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="row">
            <table class="table ">
                <thead class="thead-dark">
                <th>Order ID</th>
                <th>User ID</th>
                <th>Items</th>
                <th>Created At.</th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['user_id'];?>
</td>

                        <td>

                            <table class="table table-bordered table-secondary">
                                <thead class="thead-dark">
                                <th>id</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Кол-во</th>
                                <th>Всего</th>
                                </thead>
                                <tbody>
                                <?php $_smarty_tpl->_assignInScope('total', 0);?>                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['items'], 'items');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['items']->value['price'];?>
 ($)</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['items']->value['count'];?>
</td>
                                        <?php $_smarty_tpl->_assignInScope('total_id', $_smarty_tpl->tpl_vars['items']->value['price']*$_smarty_tpl->tpl_vars['items']->value['count']);?>
                                        <td><?php echo $_smarty_tpl->tpl_vars['total_id']->value;?>
 ($)</td>
                                    </tr>
                                    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['total_id']->value);?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>
                            <div><strong>
                                    Итого: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 ($)
                                </strong></div>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date'];?>
</td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    </div>
<?php
}
}
/* {/block 'body'} */
}
