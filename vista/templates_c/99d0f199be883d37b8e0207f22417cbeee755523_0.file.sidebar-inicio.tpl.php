<?php
/* Smarty version 3.1.30, created on 2017-05-02 21:15:37
  from "/var/www/html/gestion/vista/templates/sidebar-inicio.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5908dad94a18a9_77997101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d0f199be883d37b8e0207f22417cbeee755523' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/sidebar-inicio.tpl',
      1 => 1493752533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5908dad94a18a9_77997101 (Smarty_Internal_Template $_smarty_tpl) {
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
        <h3>44</h3>
        <p>Pedidos</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">Ir a Registros <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>65</h3>

        <p>Incidencias</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><?php }
}
