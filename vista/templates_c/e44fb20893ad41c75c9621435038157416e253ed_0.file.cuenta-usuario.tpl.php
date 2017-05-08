<?php
/* Smarty version 3.1.30, created on 2017-05-06 12:20:39
  from "/var/www/html/gestion/vista/templates/cuenta-usuario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590da377de1712_17207038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e44fb20893ad41c75c9621435038157416e253ed' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/cuenta-usuario.tpl',
      1 => 1494066026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590da377de1712_17207038 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
 conectado</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            <p>Usuario conectado
                <small></small>
            </p>
        </li>

        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#">Registros</a>
                </div>
            </div>
        <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <form action='logoff.php' method='post'>
                    <input type='submit' class="btn btn-default btn-flat" name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
                </form>  
            </div>
        </li>
    </ul>
</li><?php }
}
