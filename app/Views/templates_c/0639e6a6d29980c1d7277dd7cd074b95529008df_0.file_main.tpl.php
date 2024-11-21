<?php
/* Smarty version 5.4.2, created on 2024-11-21 14:40:42
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_673f466a7e1aa6_84589618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0639e6a6d29980c1d7277dd7cd074b95529008df' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1732199781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673f466a7e1aa6_84589618 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? 'Sistema de Matrículas' ?? null : $tmp);?>
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_472195559673f466a7dee98_27637586', "css_login");
?>

        <link href="css/main/main.css" rel="stylesheet">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1828696991673f466a7df685_02472291', "css_main");
?>

    
</head>
<body>
    <div class="container">
        <?php if ((null !== ($_SESSION['usuario_id'] ?? null))) {?>
            <div class="logout-button">
                <a href="/logout" class="btn-logout">Sair</a>
            </div>
        <?php }?>
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1501992259673f466a7e1574_50821378', "content");
?>

    </div>
    
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block "css_login"} */
class Block_472195559673f466a7dee98_27637586 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
}
}
/* {/block "css_login"} */
/* {block "css_main"} */
class Block_1828696991673f466a7df685_02472291 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
}
}
/* {/block "css_main"} */
/* {block "content"} */
class Block_1501992259673f466a7e1574_50821378 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\layouts';
}
}
/* {/block "content"} */
}
