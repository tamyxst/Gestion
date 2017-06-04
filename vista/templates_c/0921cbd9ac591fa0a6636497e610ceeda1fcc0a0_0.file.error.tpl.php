<?php
/* Smarty version 3.1.30, created on 2017-06-04 18:42:21
  from "/var/www/html/gestion/vista/templates/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934386ddeab56_57455759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0921cbd9ac591fa0a6636497e610ceeda1fcc0a0' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/error.tpl',
      1 => 1496588505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5934386ddeab56_57455759 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ALGO Gestor - Error</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Tamara Gascon">
<link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../dist/css/estilo.css">
<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
 src="../plugins/atle/js/demo.js"><?php echo '</script'; ?>
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
    <section class="content">
      <div class="error-page">
        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Algo has hecho.</h3>
          <p>
            Retrocede a la <a href="../controlador/inicio.php">página principal</a> 
          </p>
        </div>
      </div>
    </section>
  </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html>
<?php }
}
