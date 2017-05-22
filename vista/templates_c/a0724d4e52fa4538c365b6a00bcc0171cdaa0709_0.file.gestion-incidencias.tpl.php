<?php
/* Smarty version 3.1.30, created on 2017-05-22 19:24:19
  from "/var/www/html/gestion/vista/templates/gestion-incidencias.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59231ec3355758_48541647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0724d4e52fa4538c365b6a00bcc0171cdaa0709' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/gestion-incidencias.tpl',
      1 => 1495472103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:contenido-incidencias.tpl' => 1,
  ),
),false)) {
function content_59231ec3355758_48541647 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ALGO Gestor - Gestión Incidencias</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Tamara Gascon">
<link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../dist/css/estilo.css">
<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="../plugins/dataTables/dataTables.bootstrap.css">
<?php echo '<script'; ?>
 type="text/javascript">
          function editar(id_registro){
              xajax_editar(id_registro);
          }
          function cargarDetalle(id_registro){
              xajax_cargarDetalle(id_registro);
          }
          function borrarImagen(imagen,id_registro){
              xajax_borrarImagen(imagen,id_registro);
          }
 <?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="../plugins/jQuery/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/jQuery/jquery-ui.js"><?php echo '</script'; ?>
>
<!-- Resuelve conflicto de jQuery UI con Bootstrap -->
<?php echo '<script'; ?>
>
  $.widget.bridge('uibutton', $.ui.button);
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->tpl_vars['codigoJS']->value;?>

<?php echo '<script'; ?>
 src="../dist/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/slimScroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/atle/js/app.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/atle/js/demo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/dataTables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/dataTables/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/jQueryvalidate/jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/gestion.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/gestion_plugins.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap-filestyle.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/autocomplete.js"><?php echo '</script'; ?>
>

</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="content-wrapper">
    <!-- Contenido header -->
    <section class="content-header">
      <h1>
        Gestión ALGO
        <small>Panel de administración</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Gestión</li>
      </ol>
    </section>
    <!-- Contenido Inicio -->
        <?php $_smarty_tpl->_subTemplateRender("file:contenido-incidencias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://www.algodecoracion.com">Algo Decoración, S.A.</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
<?php }
}
