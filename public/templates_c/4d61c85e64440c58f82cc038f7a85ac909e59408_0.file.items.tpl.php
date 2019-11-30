<?php
/* Smarty version 3.1.33, created on 2019-12-01 00:04:01
  from 'D:\php\domains\MVC\views\admin\items.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de2d9418a71b4_76042120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d61c85e64440c58f82cc038f7a85ac909e59408' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\admin\\items.tpl',
      1 => 1575147839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de2d9418a71b4_76042120 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20583978765de2d941896ea1_48590958', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18834471025de2d941897e97_38001026', 'body');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "admin/layout.tpl");
}
/* {block 'title'} */
class Block_20583978765de2d941896ea1_48590958 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_20583978765de2d941896ea1_48590958',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Товары<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_18834471025de2d941897e97_38001026 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_18834471025de2d941897e97_38001026',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <h2>Добавить товар</h2>
        <form action="/admin/item_create" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Наименование:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title"
                           placeholder="Введите наименование товара">
                </div>
            </div>
            <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label">Описание:</label>
                <div class="col-sm-10">
                    <textarea name="description" id="editor"></textarea>

                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Цена:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Введите цену товара">
                </div>
            </div>
            <div class="form-group  row">
                <label for="category_id" class="col-sm-2 col-form-label">Категории:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="category_id" name="category_id">
                        <option selected disabled>Выбор категории</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Картинка:</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file" placeholder="Загрузить фаил">
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <input type="submit" class="btn btn-secondary mt-2" value="Создать">
                </div>
        </form>
    </div>
    <?php echo '<script'; ?>
 src="/libs/ckeditor5-classik-full/ckeditor.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/libs/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                highlight: {
                    options: [
                        {
                            model: 'yellowMarker',
                            class: 'marker-yellow',
                            title: 'Yellow marker',
                            color: 'var(--ck-highlight-marker-yellow)',
                            type: 'marker'
                        },
                        {
                            model: 'greenMarker',
                            class: 'marker-green',
                            title: 'Green marker',
                            color: 'var(--ck-highlight-marker-green)',
                            type: 'marker'
                        },
                        {
                            model: 'pinkMarker',
                            class: 'marker-pink',
                            title: 'Pink marker',
                            color: 'var(--ck-highlight-marker-pink)',
                            type: 'marker'
                        },
                        {
                            model: 'blueMarker',
                            class: 'marker-blue',
                            title: 'Blue marker',
                            color: 'var(--ck-highlight-marker-blue)',
                            type: 'marker'
                        },
                        {
                            model: 'redPen',
                            class: 'pen-red',
                            title: 'Red pen',
                            color: 'var(--ck-highlight-pen-red)',
                            type: 'pen'
                        },
                        {
                            model: 'greenPen',
                            class: 'pen-green',
                            title: 'Green pen',
                            color: 'var(--ck-highlight-pen-green)',
                            type: 'pen'
                        }
                    ]
                },
                fontColor: {
                    colors: [
                        {
                            color: 'hsl(0, 75%, 60%)',
                            label: 'Red'
                        },
                        {
                            color: 'hsl(30, 75%, 60%)',
                            label: 'Orange'
                        },
                        {
                            color: 'hsl(60, 75%, 60%)',
                            label: 'Yellow'
                        },
                        {
                            color: 'hsl(90, 75%, 60%)',
                            label: 'Light green'
                        },
                        {
                            color: 'hsl(120, 75%, 60%)',
                            label: 'Green'
                        },
                        {
                            color: 'hsl(0, 0%, 0%)',
                            label: 'Black'
                        },
                        {
                            color: 'hsl(0, 0%, 30%)',
                            label: 'Dim grey'
                        },
                        {
                            color: 'hsl(0, 0%, 60%)',
                            label: 'Grey'
                        },
                        {
                            color: 'hsl(0, 0%, 90%)',
                            label: 'Light grey'
                        },
                        {
                            color: 'hsl(0, 0%, 100%)',
                            label: 'White',
                            hasBorder: true
                        },
                    ]
                },
                fontSize: {
                    options: [
                        'tiny',
                        'small',
                        'default',
                        'big',
                        'huge'
                    ]
                },
                alignment: {
                    options: ['left', 'right', 'center', 'justify']
                },

                ckfinder: {
                    uploadUrl: '/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                },

                toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', 'underline', 'subscript', 'superscript', '|', 'alignment', 'fontSize', 'fontColor', 'highlight', '|', 'undo', 'redo', '|', 'insertTable', 'link', '|',
                    'bulletedList', 'numberedList', 'blockQuote']
            })
            .catch(error => {
                console.error(error);
            });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'body'} */
}
