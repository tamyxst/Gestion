<?php
/* Smarty version 3.1.30, created on 2017-06-04 17:04:31
  from "/var/www/html/gestion/vista/templates/cuenta-usuario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934217f5d14a9_94194590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e44fb20893ad41c75c9621435038157416e253ed' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/cuenta-usuario.tpl',
      1 => 1496588489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934217f5d14a9_94194590 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/icono_usuario.png" class="user-image" alt="Imagen de Usuario">
        <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
 conectado</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="../dist/img/icono_usuario.png" class="img-circle" alt="Imagen de Usuario">
            <p>Usuario conectado
                <small></small>
            </p>
        </li>
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#">Registros</a>
                </div>
            </div>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                <!--<a href="#" class="btn btn-default btn-flat">Perfil</a>-->
            </div>
            <div class="pull-right">
                <form action='logoff.php' method='post'>
                    <input type='submit' class="btn btn-default btn-flat" name='desconectar' value='Desconectar <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
                </form>  
            </div>
        </li>
    </ul>
</li><?php }
}
