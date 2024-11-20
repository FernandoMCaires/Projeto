<?php
/* Smarty version 5.4.1, created on 2024-11-20 20:50:48
  from 'file:matriculas/form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e4ba8dd17f5_81894418',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b20806d560b3c5ef96d62e6524dc9466217c8d3f' => 
    array (
      0 => 'matriculas/form.tpl',
      1 => 1732135781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e4ba8dd17f5_81894418 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1677950323673e4ba8dc77c4_09699091', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1677950323673e4ba8dc77c4_09699091 extends \Smarty\Runtime\Block
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
                        <h2>Nova Matrícula</h2>
                        <a href="/matriculas" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
                        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                    <?php }?>

                    <form method="POST" action="/matriculas/criar">
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('alunos'), 'aluno');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('aluno')->value) {
$foreach0DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('aluno')->getId();?>
"><?php echo $_smarty_tpl->getValue('aluno')->getNome();?>
</option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <select class="form-select" id="curso_id" name="curso_id[]" multiple required>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach1DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('curso')->getId();?>
"><?php echo $_smarty_tpl->getValue('curso')->getNome();?>
</option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                            <small class="text-danger">
                                Selecione pelo menos um curso, ou aperte CRTL para selecionar mais de um.
                            </small>
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
