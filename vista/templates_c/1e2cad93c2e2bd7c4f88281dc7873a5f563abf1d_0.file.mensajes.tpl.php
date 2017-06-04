<?php
/* Smarty version 3.1.30, created on 2017-06-04 17:04:31
  from "/var/www/html/gestion/vista/templates/mensajes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934217f5cea16_50152306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e2cad93c2e2bd7c4f88281dc7873a5f563abf1d' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/mensajes.tpl',
      1 => 1496588637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934217f5cea16_50152306 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <?php if ($_smarty_tpl->tpl_vars['numMensajes']->value == 0) {?>
          <i class="fa fa-envelope-o"></i>
      <?php } else { ?>
          <i class="fa fa-envelope-o"></i>
         <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['numMensajes']->value;?>
</span>
      <?php }?>
    </a>
    <ul class="dropdown-menu">
        <li class="header">Tu tienes <?php echo $_smarty_tpl->tpl_vars['numMensajes']->value;?>
 mensajes</li>
            <li>
                <ul class="menu">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mensajes']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                      <li>
                                <a href="gestion-mensajes.php?id=<?php echo $_smarty_tpl->tpl_vars['m']->value->getIdMensaje();?>
">   
                          <div class="pull-left">
                            <img src="../dist/img/icono_usuario.png" class="img-circle" alt="Imagen de Usuario">
                          </div>
                          <h4>
                            <?php echo $_smarty_tpl->tpl_vars['m']->value->getNombreEmisor();?>

                            <small><i class="fa fa-clock-o"><?php echo $_smarty_tpl->tpl_vars['m']->value->getFecha();?>
</i></small>
                          </h4>
                          <p><?php echo $_smarty_tpl->tpl_vars['m']->value->getMensajeCorto();?>
</p>
                        </a>
                    </li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </li>
        <li class="footer"><a href="gestion-mensajes.php">Ver todos Mensajes</a></li>
    </ul>
</li><?php }
}
