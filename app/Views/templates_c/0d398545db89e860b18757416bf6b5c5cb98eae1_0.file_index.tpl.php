<?php
/* Smarty version 5.4.1, created on 2024-11-20 04:33:47
  from 'file:matriculas/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673d66abdebf65_90597077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d398545db89e860b18757416bf6b5c5cb98eae1' => 
    array (
      0 => 'matriculas/index.tpl',
      1 => 1732075765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673d66abdebf65_90597077 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_516843502673d66abde3f90_61905256', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_516843502673d66abde3f90_61905256 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Matrículas</h1>
        <a href="/matriculas/novo" class="btn btn-primary">Nova Matrícula</a>
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
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Data da Matrícula</th>
                        <th>Status</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_smarty_tpl->getValue('matriculas')) {?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('matriculas'), 'matricula');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('matricula')->value) {
$foreach0DoElse = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->getValue('matricula')->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('matricula')->getAluno()->getNome();?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('matricula')->getCurso()->getNome();?>
</td>
                                <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('matricula')->getDataMatricula(),"%d/%m/%Y");?>
</td>
                                <td>
                                    <span class="badge bg-<?php if ($_smarty_tpl->getValue('matricula')->getStatus() == 'Ativa') {?>success<?php } else { ?>danger<?php }?>">
                                        <?php echo $_smarty_tpl->getValue('matricula')->getStatus();?>

                                    </span>
                                </td>
                                <td>
                                    <a href="/matriculas/editar/<?php echo $_smarty_tpl->getValue('matricula')->getId();?>
" 
                                       class="btn btn-sm btn-info">
                                        Editar
                                    </a>
                                    <a href="/matriculas/excluir/<?php echo $_smarty_tpl->getValue('matricula')->getId();?>
" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Tem certeza que deseja excluir esta matrícula?')">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">Nenhuma matrícula cadastrada.</td>
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
