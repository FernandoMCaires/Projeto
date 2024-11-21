<?php
/* Smarty version 5.4.2, created on 2024-11-21 18:21:27
  from 'file:cursos/form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_673f7a276d0c94_23317297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e54b8a3cd391266d8c3ae2b72a67050ca6dd500a' => 
    array (
      0 => 'cursos/form.tpl',
      1 => 1732199781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673f7a276d0c94_23317297 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\cursos';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1819792596673f7a276c87c6_08704974', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1819792596673f7a276c87c6_08704974 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\cursos';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2><?php if ((null !== ($_smarty_tpl->getValue('curso') ?? null))) {?>Editar<?php } else { ?>Novo<?php }?> Curso</h2>
                        <a href="/cursos" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php if ((null !== ($_smarty_tpl->getValue('curso') ?? null))) {?>/cursos/update/<?php echo $_smarty_tpl->getValue('curso')->getId();
} else { ?>/cursos/criar<?php }?>">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Curso</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nome" 
                                   name="nome" 
                                   value="<?php if ((null !== ($_smarty_tpl->getValue('curso') ?? null))) {
echo $_smarty_tpl->getValue('curso')->getNome();
}?>"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" 
                                      id="descricao" 
                                      name="descricao" 
                                      rows="3" 
                                      required><?php if ((null !== ($_smarty_tpl->getValue('curso') ?? null))) {
echo $_smarty_tpl->getValue('curso')->getDescricao();
}?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/cursos" class="btn btn-secondary">Voltar</a>
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
