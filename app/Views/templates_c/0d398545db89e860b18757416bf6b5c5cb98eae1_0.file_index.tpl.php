<?php
/* Smarty version 5.4.1, created on 2024-11-20 19:11:46
  from 'file:matriculas/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e34723ec982_22070420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d398545db89e860b18757416bf6b5c5cb98eae1' => 
    array (
      0 => 'matriculas/index.tpl',
      1 => 1732129872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e34723ec982_22070420 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1742781903673e34723e37d8_69427418', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1742781903673e34723e37d8_69427418 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\matriculas';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/dashboard" class="btn btn-secondary"> Voltar </a>
        <h1>Matrículas</h1>
        <a href="/matriculas/novo" class="btn btn-primary">Nova Matrícula</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="/matriculas" class="row g-3">
                <div class="col-md-4">
                    <input type="text" 
                           class="form-control" 
                           name="search" 
                           placeholder="Buscar por aluno ou curso..."
                           value="<?php echo (($tmp = $_smarty_tpl->getValue('search') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">Buscar</button>
                </div>
                <?php if ((null !== ($_smarty_tpl->getValue('search') ?? null)) && $_smarty_tpl->getValue('search') != '') {?>
                    <div class="col-md-2">
                        <a href="/matriculas" class="btn btn-outline-secondary w-100">Limpar</a>
                    </div>
                <?php }?>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Status do Curso</th>
                        <th>Status da Matrícula</th>
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
                                <td>
                                    <?php if ($_smarty_tpl->getValue('matricula')->getAluno()->isAtivo()) {?>
                                        <?php echo $_smarty_tpl->getValue('matricula')->getAluno()->getNome();?>

                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->getValue('matricula')->getCurso()->getNome();?>
</td>
                                <td>
                                    <span class="badge bg-<?php if ($_smarty_tpl->getValue('matricula')->getCurso()->isAtivo()) {?>success<?php } else { ?>danger<?php }?>">
                                        <?php if ($_smarty_tpl->getValue('matricula')->getCurso()->isAtivo()) {?>Ativo<?php } else { ?>Inativo<?php }?>
                                    </span>
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
