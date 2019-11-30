<?php
/* Smarty version 3.1.33, created on 2019-11-24 01:49:38
  from 'D:\php\domains\MVC\views\order_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd9b78248d031_08062703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c01e2106dfa967c517a14c086c786666948ae12' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\order_list.tpl',
      1 => 1574549376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dd9b78248d031_08062703 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15512214595dd9b78247c768_60459965', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13838147215dd9b78247d358_21011869', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_15512214595dd9b78247c768_60459965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_15512214595dd9b78247c768_60459965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Список Заказов<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_13838147215dd9b78247d358_21011869 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_13838147215dd9b78247d358_21011869',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <h2>Список заказов:</h2>
        <div class="row">
            <?php if (!empty($_smarty_tpl->tpl_vars['orders']->value)) {?>
                <table class="table">
                    <thead class="thead-dark">
                    <th>№ п/п</th>
                    <th>Заказ</th>
                    <th>Дата</th>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['count']->value++;?>
.</td>
                            <td>
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <th>id</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>count</th>
                                    </thead>
                                    <tbody>
                                    <?php
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
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['items']->value['count'];?>
</td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
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
            <?php } else { ?>
                Вы пока не сделали не одного заказа
            <?php }?>

        </div>
    </div>
<?php
}
}
/* {/block 'body'} */
}
