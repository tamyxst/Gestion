<?php
/* Smarty version 3.1.30, created on 2017-05-24 21:39:09
  from "/var/www/html/gestion/vista/templates/sidebar-inicio.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5925e15d0cb190_80218425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d0f199be883d37b8e0207f22417cbeee755523' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/sidebar-inicio.tpl',
      1 => 1495654745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5925e15d0cb190_80218425 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-lg-3 col-xs-6">
    <!-- Caja clientes -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['numClientes']->value;?>
</h3>
        <p>Clientes</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="gestion-clientes.php" class="small-box-footer">Ir a Clientes <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['numProveedores']->value;?>
<sup style="font-size: 20px"></sup></h3>
        <p>Proveedores</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="gestion-proveedores.php" class="small-box-footer">Ir a Proveedores <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['numPedidos']->value;?>
</h3>
        <p>Pedidos</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="gestion-pedidos.php" class="small-box-footer">Ir a Pedidos <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['numIncidencias']->value;?>
</h3>
        <p>Incidencias</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="gestion-incidencias.php" class="small-box-footer">Ir a Incidencias <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><?php }
}
