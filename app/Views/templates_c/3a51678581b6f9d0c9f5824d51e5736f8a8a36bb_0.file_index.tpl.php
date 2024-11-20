<?php
/* Smarty version 5.4.1, created on 2024-11-20 20:50:45
  from 'file:dashboard/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e4ba5923b07_97082479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a51678581b6f9d0c9f5824d51e5736f8a8a36bb' => 
    array (
      0 => 'dashboard/index.tpl',
      1 => 1732073861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e4ba5923b07_97082479 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\dashboard';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2111930948673e4ba5922e36_48047504', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_2111930948673e4ba5922e36_48047504 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\dashboard';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Dashboard</h1>
            <p>Bem-vindo, <?php echo $_smarty_tpl->getValue('usuario_nome');?>
!</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Gerenciar cursos do sistema.</p>
                    <a href="/cursos" class="btn btn-primary">Ver Cursos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alunos</h5>
                    <p class="card-text">Gerenciar alunos do sistema.</p>
                    <a href="/alunos" class="btn btn-primary">Ver Alunos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Matrículas</h5>
                    <p class="card-text">Gerenciar matrículas do sistema.</p>
                    <a href="/matriculas" class="btn btn-primary">Ver Matrículas</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
