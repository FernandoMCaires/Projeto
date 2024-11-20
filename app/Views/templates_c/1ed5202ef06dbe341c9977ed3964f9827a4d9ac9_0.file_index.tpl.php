<?php
/* Smarty version 5.4.1, created on 2024-11-20 20:50:44
  from 'file:cursos/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e4ba4e75aa5_64894065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ed5202ef06dbe341c9977ed3964f9827a4d9ac9' => 
    array (
      0 => 'cursos/index.tpl',
      1 => 1732133866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e4ba4e75aa5_64894065 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\cursos';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_205704723673e4ba4e6b561_06866737', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_205704723673e4ba4e6b561_06866737 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\cursos';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/dashboard" class="btn btn-secondary">Voltar</a>
        <h1>Cursos</h1>
        <a href="/cursos/novo" class="btn btn-primary">Novo Curso</a>
    </div>

    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('success') ?? null))) {?>
        <div class="alert alert-success"><?php echo $_smarty_tpl->getValue('success');?>
</div>
    <?php }?>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Alterar</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_smarty_tpl->getValue('cursos')) {?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach0DoElse = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->getValue('curso')->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('curso')->getNome();?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('curso')->getDescricao();?>
</td>
                                <td>
                                    <a href="/cursos/toggle-status/<?php echo $_smarty_tpl->getValue('curso')->getId();?>
" 
                                       class="btn btn-sm <?php if ($_smarty_tpl->getValue('curso')->isAtivo()) {?>btn-success<?php } else { ?>btn-danger<?php }?>"
                                       onclick="return confirm('Deseja alterar o status deste curso?')">
                                        <?php if ($_smarty_tpl->getValue('curso')->isAtivo()) {?>Ativo<?php } else { ?>Inativo<?php }?>
                                    </a>
                                </td>
                                <td>
                                    <a href="/cursos/editar/<?php echo $_smarty_tpl->getValue('curso')->getId();?>
" 
                                       class="btn btn-sm btn-info">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="4" class="text-center">Nenhum curso cadastrado.</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
