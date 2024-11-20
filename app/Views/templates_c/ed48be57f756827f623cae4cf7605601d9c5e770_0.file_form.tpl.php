<?php
/* Smarty version 5.4.1, created on 2024-11-20 20:50:02
  from 'file:alunos/form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e4b7a35c020_22086642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed48be57f756827f623cae4cf7605601d9c5e770' => 
    array (
      0 => 'alunos/form.tpl',
      1 => 1732133861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e4b7a35c020_22086642 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\alunos';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1967504536673e4b7a353c57_28970536', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1967504536673e4b7a353c57_28970536 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\alunos';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2><?php if ((null !== ($_smarty_tpl->getValue('aluno') ?? null))) {?>Editar<?php } else { ?>Novo<?php }?> Aluno</h2>
                        <a href="/alunos" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
                        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                    <?php }?>

                    <form method="POST" action="<?php if ((null !== ($_smarty_tpl->getValue('aluno') ?? null))) {?>/alunos/update/<?php echo $_smarty_tpl->getValue('aluno')->getId();
} else { ?>/alunos/criar<?php }?>">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nome" 
                                   name="nome" 
                                   value="<?php if ((null !== ($_smarty_tpl->getValue('aluno') ?? null))) {
echo $_smarty_tpl->getValue('aluno')->getNome();
}?>"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   value="<?php if ((null !== ($_smarty_tpl->getValue('aluno') ?? null))) {
echo $_smarty_tpl->getValue('aluno')->getEmail();
}?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" 
                                   class="form-control" 
                                   id="data_nascimento" 
                                   name="data_nascimento" 
                                   value="<?php if ((null !== ($_smarty_tpl->getValue('aluno') ?? null))) {
echo $_smarty_tpl->getValue('aluno')->getDataNascimento()->format('Y-m-d');
}?>"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/alunos" class="btn btn-secondary">Voltar</a>
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
