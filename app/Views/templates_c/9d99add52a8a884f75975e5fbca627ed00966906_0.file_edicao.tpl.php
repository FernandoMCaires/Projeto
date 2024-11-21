<?php
/* Smarty version 5.4.2, created on 2024-11-21 14:32:14
  from 'file:matriculas/edicao.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_673f446e758180_18456217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d99add52a8a884f75975e5fbca627ed00966906' => 
    array (
      0 => 'matriculas/edicao.tpl',
      1 => 1732199130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673f446e758180_18456217 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1349031852673f446e74f9d0_97853236', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1349031852673f446e74f9d0_97853236 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Editar Matrícula</h2>
                        <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
                        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                    <?php }?>

                    <form method="POST" action="/matriculas/update/<?php echo $_smarty_tpl->getValue('matricula')->getId();?>
">
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required disabled>
                                <option value="<?php echo $_smarty_tpl->getValue('matricula')->getAluno()->getId();?>
" selected>
                                    <?php echo $_smarty_tpl->getValue('matricula')->getAluno()->getNome();?>

                                </option>
                            </select>
                            <input type="hidden" name="aluno_id" value="<?php echo $_smarty_tpl->getValue('matricula')->getAluno()->getId();?>
">
                        </div>
                        
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <input type="text" class="form-control" id="curso_id" value="<?php echo $_smarty_tpl->getValue('curso')->getNome();?>
" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Ativa" 
                                    <?php if ($_smarty_tpl->getValue('matricula')->getStatus() == 'Ativa') {?>selected<?php }?>
                                    <?php if (!$_smarty_tpl->getValue('curso')->isAtivo()) {?>disabled<?php }?>>
                                    Ativa
                                </option>
                                <option value="Cancelada" 
                                    <?php if ($_smarty_tpl->getValue('matricula')->getStatus() == 'Cancelada') {?>selected<?php }?>>
                                    Cancelada
                                </option>
                            </select>
                            <?php if (!$_smarty_tpl->getValue('curso')->isAtivo()) {?>
                                <small class="text-danger">
                                    Este curso está inativo. Não é possível ativar a matrícula.
                                </small>
                            <?php }?>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
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
