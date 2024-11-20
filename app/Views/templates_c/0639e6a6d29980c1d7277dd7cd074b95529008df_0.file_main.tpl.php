<?php
/* Smarty version 5.4.1, created on 2024-11-20 19:11:53
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e3479a4c370_27321052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0639e6a6d29980c1d7277dd7cd074b95529008df' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1732124311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e3479a4c370_27321052 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? 'Sistema de Matrículas' ?? null : $tmp);?>
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2019971989673e3479a4b6e8_84399982', "css_login");
?>

</head>
<body>
    <div class="container">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1347138167673e3479a4bea0_60136355', "content");
?>

    </div>
    
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block "css_login"} */
class Block_2019971989673e3479a4b6e8_84399982 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
}
}
/* {/block "css_login"} */
/* {block "content"} */
class Block_1347138167673e3479a4bea0_60136355 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
}
}
/* {/block "content"} */
}
