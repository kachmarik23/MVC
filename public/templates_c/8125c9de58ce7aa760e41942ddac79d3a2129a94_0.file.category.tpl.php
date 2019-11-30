<?php
/* Smarty version 3.1.33, created on 2019-11-26 19:41:18
  from 'D:\php\domains\MVC\views\admin\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddd55aed6c2d9_87429090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8125c9de58ce7aa760e41942ddac79d3a2129a94' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\admin\\category.tpl',
      1 => 1574786439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddd55aed6c2d9_87429090 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16759748735ddd55aed5bf29_31161746', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2778716805ddd55aed5cf29_87583780', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "admin/layout.tpl");
}
/* {block 'title'} */
class Block_16759748735ddd55aed5bf29_31161746 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_16759748735ddd55aed5bf29_31161746',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Категории<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_2778716805ddd55aed5cf29_87583780 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2778716805ddd55aed5cf29_87583780',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="container">
        <h2>Категории:</h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-sm">
                    <thead class="thead-dark">
                    <th>ID</th>
                    <th>Названиее</th>
                    <th>Кол-во товаров</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
                            <td><?php if ((!$_smarty_tpl->tpl_vars['category']->value['0'])) {?>0<?php }
echo $_smarty_tpl->tpl_vars['category']->value['0'];?>
</td>
                            <td><a href="/admin/category_remove?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="btn btn-danger  btn-sm">Удалить</a></td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
                <h3>Добавить категорию:</h3>
                <form action="/admin/category_create" method="post">
                    <div class="form-row">
                        <div class="col-9">
                            <input class="form-control" type="text" name="category" id="category"
                                   placeholder="Введите категорию">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success ml-1" value="Добавить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'body'} */
}
