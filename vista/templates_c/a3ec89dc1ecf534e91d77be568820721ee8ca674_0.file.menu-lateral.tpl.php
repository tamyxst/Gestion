<?php
/* Smarty version 3.1.30, created on 2017-05-25 20:51:56
  from "/var/www/html/gestion/vista/templates/menu-lateral.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592727ccd959b1_20286626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3ec89dc1ecf534e91d77be568820721ee8ca674' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/menu-lateral.tpl',
      1 => 1495738313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592727ccd959b1_20286626 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="sidebar-menu">
    <li class="header">Registros</li>
    <li>
      <a href="gestion-incidencias.php">
        <i class="fa fa-edit"></i> <span>Incidencias</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow"></small>
          <small class="label pull-right bg-green">16</small>
          <small class="label pull-right bg-red">5</small>
        </span>
      </a>
    </li>
    <li>
      <a href="gestion-pedidos.php">
        <i class="fa fa-edit"></i> <span>Pedidos</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow"></small>
          <small class="label pull-right bg-green">16</small>
          <small class="label pull-right bg-red">5</small>
        </span>
      </a>
    </li>
    <li>
      <a href="gestion-registros.php">
        <i class="fa fa-edit"></i> <span>Otros</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow">12</small>
          <small class="label pull-right bg-green">16</small>
          <small class="label pull-right bg-red">5</small>
        </span>
      </a>
    </li>
    <li class="header">Contactos</li>
    <li class="treeview">
      <a href="gestion-clientes.php">
        <i class="fa fa-table"></i> <span>Clientes</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="gestion-proveedores.php">
        <i class="fa fa-table"></i> <span>Proveedores</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
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
    <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Alta</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Media</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Baja</span></a></li>
</ul><?php }
}
