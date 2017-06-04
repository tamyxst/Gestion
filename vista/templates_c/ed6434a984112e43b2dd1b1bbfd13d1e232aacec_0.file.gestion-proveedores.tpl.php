<?php
/* Smarty version 3.1.30, created on 2017-06-04 17:37:48
  from "/var/www/html/gestion/vista/templates/gestion-proveedores.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934294cf3d604_30364439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed6434a984112e43b2dd1b1bbfd13d1e232aacec' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/gestion-proveedores.tpl',
      1 => 1496590652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:contenido-proveedores.tpl' => 1,
  ),
),false)) {
function content_5934294cf3d604_30364439 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ALGO Gestor - Gestión proveedores</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Tamara Gascon">
<link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/skins/skin-blue-light.css">
<link rel="stylesheet" href="../dist/css/estilo.css">
<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="../plugins/dataTables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../plugins/dataTables/responsive.dataTables.min.css">
<?php echo '<script'; ?>
 type="text/javascript">
          function editar(id_contacto){
              xajax_editar(id_contacto);
          }
          function cargarDetalle(id_contacto){
              xajax_cargarDetalle(id_contacto);
          }
 <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/dataTables/jquery-1.12.4.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/jQuery/jquery-ui.js"><?php echo '</script'; ?>
>
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
 src="../plugins/dataTables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/dataTables/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/dataTables/dataTables.responsive.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/dataTables/responsive.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/jQueryvalidate/jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/anchor/anchor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/bootbox/bootbox.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/bootbox/demos.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/example.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/gestion.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap-filestyle.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/autocomplete.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function(){
        validarFormuProv();
        validarFormuProvEditar();
    });
<?php echo '</script'; ?>
>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
  <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Gestión</li>
      </ol>
    </section>
        <?php $_smarty_tpl->_subTemplateRender("file:contenido-proveedores.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
