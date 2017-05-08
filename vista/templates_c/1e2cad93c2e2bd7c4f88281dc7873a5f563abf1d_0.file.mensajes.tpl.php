<?php
/* Smarty version 3.1.30, created on 2017-04-24 18:56:05
  from "/var/www/html/gestion/vista/templates/mensajes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe2e25e5dea9_14845271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e2cad93c2e2bd7c4f88281dc7873a5f563abf1d' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/mensajes.tpl',
      1 => 1493052897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fe2e25e5dea9_14845271 (Smarty_Internal_Template $_smarty_tpl) {
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
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mensajes']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                      <li><!-- start message -->
                                <a href="gestion-mensajes.php?id=<?php echo $_smarty_tpl->tpl_vars['m']->value->getIdMensaje();?>
">   
                          <div class="pull-left">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
