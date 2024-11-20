<?php
/* Smarty version 5.4.1, created on 2024-11-20 04:33:47
  from 'file:matriculas/form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673d66ab27d697_65300387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b20806d560b3c5ef96d62e6524dc9466217c8d3f' => 
    array (
      0 => 'matriculas/form.tpl',
      1 => 1732077196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673d66ab27d697_65300387 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_412380167673d66ab26b0a1_21633186', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_412380167673d66ab26b0a1_21633186 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2><?php if ((null !== ($_smarty_tpl->getValue('matricula') ?? null))) {?>Editar<?php } else { ?>Nova<?php }?> Matrícula</h2>
                </div>
                <div class="card-body">
                    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
                        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                    <?php }?>

                    <form method="POST" action="<?php if ((null !== ($_smarty_tpl->getValue('matricula') ?? null))) {?>/matriculas/update/<?php echo $_smarty_tpl->getValue('matricula')->getId();
} else { ?>/matriculas/criar<?php }?>">
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required>
                                <option value="">Selecione um aluno</option>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('alunos'), 'aluno');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('aluno')->value) {
$foreach0DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('aluno')->getId();?>
" 
                                        <?php if ((null !== ($_smarty_tpl->getValue('matricula') ?? null)) && $_smarty_tpl->getValue('matricula')->getAluno()->getId() == $_smarty_tpl->getValue('aluno')->getId()) {?>selected<?php }?>>
                                        <?php echo $_smarty_tpl->getValue('aluno')->getNome();?>

                                    </option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <select class="form-select" id="curso_id" name="curso_id" <?php if (!(null !== ($_smarty_tpl->getValue('matricula') ?? null))) {?>multiple<?php }?> required>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach1DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('curso')->getId();?>
"
                                        <?php if ((null !== ($_smarty_tpl->getValue('matricula') ?? null)) && $_smarty_tpl->getValue('matricula')->getCurso()->getId() == $_smarty_tpl->getValue('curso')->getId()) {?>selected<?php }?>>
                                        <?php echo $_smarty_tpl->getValue('curso')->getNome();?>

                                    </option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                            <?php if (!(null !== ($_smarty_tpl->getValue('matricula') ?? null))) {?>
                                <small class="form-text text-muted">Pressione CTRL para selecionar múltiplos cursos</small>
                            <?php }?>
                        </div>

                        <?php if ((null !== ($_smarty_tpl->getValue('matricula') ?? null))) {?>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Ativa" <?php if ($_smarty_tpl->getValue('matricula')->getStatus() == 'Ativa') {?>selected<?php }?>>Ativa</option>
                                    <option value="Cancelada" <?php if ($_smarty_tpl->getValue('matricula')->getStatus() == 'Cancelada') {?>selected<?php }?>>Cancelada</option>
                                </select>
                            </div>
                        <?php }?>

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
