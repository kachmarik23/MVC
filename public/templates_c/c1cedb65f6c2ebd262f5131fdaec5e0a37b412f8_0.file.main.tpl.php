<?php
/* Smarty version 3.1.33, created on 2019-11-27 14:50:20
  from 'D:\php\domains\MVC\views\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dde62fc6037b3_26264005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1cedb65f6c2ebd262f5131fdaec5e0a37b412f8' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\main.tpl',
      1 => 1574855418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dde62fc6037b3_26264005 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8260835065dde62fc5eda51_54799483', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6639413575dde62fc5ee6f8_62248967', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_8260835065dde62fc5eda51_54799483 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8260835065dde62fc5eda51_54799483',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Товары по категориям<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_6639413575dde62fc5ee6f8_62248967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6639413575dde62fc5ee6f8_62248967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <h2>Категории:</h2>
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item<?php if (($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['params']->value)) {?> active<?php }?>">
                        <a class="list-group-item-action" href="/">Все товары</a>
                    </li>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                        <li class="list-group-item<?php if (($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['params']->value)) {?> active<?php }?>">
                            <a class="list-group-item-action" href="/categories/items/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                                (<?php if ((!$_smarty_tpl->tpl_vars['category']->value['0'])) {?>0<?php }
echo $_smarty_tpl->tpl_vars['category']->value['0'];?>
)</a>
                        </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
            <div class="col-sm-8 col-lg-9">
                <div class="row ">
                    <?php if (empty($_smarty_tpl->tpl_vars['items']->value)) {?>
                        В этой категории нет товаров...(
                        <?php }?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <div class="col-sm-12 col-lg-4 mb-4">
                        <div class="card bg-light">
                            <img src="/public/images/<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" class="card-img-top"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <div class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h5>
                                    <div class="card-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</div>
                                    <div class="card-text mb-2">Цена: <strong><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
$</strong></div>
                                    <a href="/cart/add/?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-success">Корзина</a>
                                    <a href="#" class="btn btn-primary">Инфо</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'body'} */
}
