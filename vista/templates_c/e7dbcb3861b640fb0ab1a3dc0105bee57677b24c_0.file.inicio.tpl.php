<?php
/* Smarty version 3.1.30, created on 2017-06-04 18:06:54
  from "/var/www/html/gestion/vista/templates/inicio.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934301e1caf28_53926760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7dbcb3861b640fb0ab1a3dc0105bee57677b24c' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/inicio.tpl',
      1 => 1496592269,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:contenido-inicio.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5934301e1caf28_53926760 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ALGO Gestor - Gestión mensajes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Tamara Gascon">
  <link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue-light.css">
  <link rel="stylesheet" href="../dist/css/estilo.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
  <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="content-wrapper">
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
        <?php $_smarty_tpl->_subTemplateRender("file:contenido-inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </div>
  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php echo '<script'; ?>
 src="../plugins/dataTables/jquery-1.12.4.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/jQuery/jquery-ui.js"><?php echo '</script'; ?>
>
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
 src="../dist/js/gestion_plugins.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/autocomplete.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/atle/js/demo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  $.widget.bridge('uibutton', $.ui.button);
  $("#calendar").datepicker();
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
