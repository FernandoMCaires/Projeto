<?php
/* Smarty version 5.4.1, created on 2024-11-20 20:19:07
  from 'file:auth/login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673e443b525843_26395108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e0b937aba6ac7240f6b1bcc952efd696332c1fa' => 
    array (
      0 => 'auth/login.tpl',
      1 => 1732125371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673e443b525843_26395108 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\auth';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_449948296673e443b520c64_13290551', "css_login");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1511513848673e443b522100_88808367', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "css_login"} */
class Block_449948296673e443b520c64_13290551 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\auth';
?>

    <link href="/css/login/login.css" rel="stylesheet">
<?php
}
}
/* {/block "css_login"} */
/* {block "content"} */
class Block_1511513848673e443b522100_88808367 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Documents\\Projeto\\app\\Views\\templates\\auth';
?>

    <div class="row justify-content-center mt-5">
        <div class="col-12 text-center">
            <h1 class='title mb-4'>Jubilut - Administrativo</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>

                        <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
                            <div class="alert alert-danger">
                                <?php echo $_smarty_tpl->getValue('error');?>

                            </div>
                        <?php }?>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
