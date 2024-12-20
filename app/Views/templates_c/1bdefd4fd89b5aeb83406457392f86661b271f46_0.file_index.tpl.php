<?php
/* Smarty version 5.4.2, created on 2024-11-21 18:14:52
  from 'file:alunos/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_673f789c793556_40216214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bdefd4fd89b5aeb83406457392f86661b271f46' => 
    array (
      0 => 'alunos/index.tpl',
      1 => 1732199781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673f789c793556_40216214 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\alunos';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_663310178673f789c786ed7_58135116', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_663310178673f789c786ed7_58135116 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\alunos';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/dashboard" class="btn btn-primary"> Voltar </a>
        <h1>Alunos</h1>
        <a href="/alunos/novo" class="btn btn-primary">Novo Aluno</a>
    </div>

    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
    <?php }?>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_smarty_tpl->getValue('alunos')) {?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('alunos'), 'aluno');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('aluno')->value) {
$foreach0DoElse = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->getValue('aluno')->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('aluno')->getNome();?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('aluno')->getEmail();?>
</td>
                                <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('aluno')->getDataNascimento(),"%d/%m/%Y");?>
</td>
                                <td class="text-center">
                                    <a href="/alunos/toggle-status/<?php echo $_smarty_tpl->getValue('aluno')->getId();?>
" 
                                       class="btn btn-sm <?php if ($_smarty_tpl->getValue('aluno')->isAtivo()) {?>btn-success<?php } else { ?>btn-danger<?php }?>"
                                       onclick="return confirm('Deseja alterar o status deste aluno?')">
                                        <?php if ($_smarty_tpl->getValue('aluno')->isAtivo()) {?>Ativo<?php } else { ?>Inativo<?php }?>
                                    </a>
                                    <a href="/alunos/editar/<?php echo $_smarty_tpl->getValue('aluno')->getId();?>
" class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil-fill"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhum aluno cadastrado.</td>
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
