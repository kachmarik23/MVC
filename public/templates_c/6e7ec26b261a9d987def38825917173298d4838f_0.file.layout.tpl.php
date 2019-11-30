<?php
/* Smarty version 3.1.33, created on 2019-11-24 15:21:16
  from 'D:\php\domains\MVC\views\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dda75bc9b9be2_65792873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e7ec26b261a9d987def38825917173298d4838f' => 
    array (
      0 => 'D:\\php\\domains\\MVC\\views\\layout.tpl',
      1 => 1574598064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda75bc9b9be2_65792873 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" href="#"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/them.css">

    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18826054705dda75bc9a2a02_67324303', 'title');
?>
</title>
</head>
<body>
<header class="vbar-togglerbar">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Pattern MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">

                </li>

            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/cart">Cart (<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cart_count']->value)===null||$tmp==='' ? "0" : $tmp);?>

                        )</a>
                </li>
                <?php if (!empty($_SESSION['user']['id'])) {?>
                <li class="nav-item active">
                    <a class="nav-link" href="/order/all">Список заказов</a>
                </li>

                <li class="nav dropdown dropleft">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user']['login'];?>
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <?php if ($_SESSION['user']['login'] === 'admin') {?>                            <a class="dropdown-item" href="/admin">Администрирование</a>
                            <div class="dropdown-divider"></div>
                        <?php }?>
                        <a class="dropdown-item" href="/users/logout">LogOut</a>
                    </div>
                </li>
                <?php } else { ?>

                <li class="nav-item active">
                    <a class="nav-link" href="/users/login">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/registr">Register </a>
                </li>
            </ul>

            <?php }?>
        </div>
    </nav>

    </header>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6947831865dda75bc9b9124_18586768', 'body');
?>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'title'} */
class Block_18826054705dda75bc9a2a02_67324303 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_18826054705dda75bc9a2a02_67324303',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_6947831865dda75bc9b9124_18586768 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6947831865dda75bc9b9124_18586768',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
}
