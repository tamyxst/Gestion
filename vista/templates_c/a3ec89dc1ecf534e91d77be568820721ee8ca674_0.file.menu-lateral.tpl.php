<?php
/* Smarty version 3.1.30, created on 2017-05-26 21:12:38
  from "/var/www/html/gestion/vista/templates/menu-lateral.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59287e267d6465_60567068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3ec89dc1ecf534e91d77be568820721ee8ca674' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/menu-lateral.tpl',
      1 => 1495825954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59287e267d6465_60567068 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="sidebar-menu">
    <li class="header">Registros</li>
    <li>
      <a href="gestion-incidencias.php">
        <i class="fa fa-edit"></i> <span>Incidencias</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-red"><?php echo $_smarty_tpl->tpl_vars['numIncidencias']->value;?>
</small>
        </span>
      </a>
    </li>
    <li>
      <a href="gestion-pedidos.php">
        <i class="fa fa-edit"></i> <span>Pedidos</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow"><?php echo $_smarty_tpl->tpl_vars['numPedidos']->value;?>
</small>
        </span>
      </a>
    </li>
    <li>
      <a href="gestion-registros.php">
        <i class="fa fa-edit"></i> <span>Otros</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-blue"><?php echo $_smarty_tpl->tpl_vars['numReg']->value;?>
</small>
        </span>
      </a>
    </li>
    <li class="header">Contactos</li>
    <li class="treeview">
      <a href="gestion-clientes.php">
        <i class="fa fa-table"></i> <span>Clientes</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-aqua"><?php echo $_smarty_tpl->tpl_vars['numClientes']->value;?>
</small>
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="gestion-proveedores.php">
        <i class="fa fa-table"></i> <span>Proveedores</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green"><?php echo $_smarty_tpl->tpl_vars['numProveedores']->value;?>
</small>
        </span>
      </a>
    </li>
    <li class="header">Panel Administración</li>
    <li>
      <a href="gestion-mensajes.php">
        <i class="fa fa-envelope"></i> <span>Mensajes</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow"></small>
        </span>
      </a>
    </li>
</ul><?php }
}
