<?php
/* Smarty version 3.1.30, created on 2017-05-19 19:39:21
  from "/var/www/html/gestion/vista/templates/inicio.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591f2dc9084921_65827730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7dbcb3861b640fb0ab1a3dc0105bee57677b24c' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/inicio.tpl',
      1 => 1495215041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:mensajes.tpl' => 1,
    'file:cuenta-usuario.tpl' => 1,
    'file:menu-lateral.tpl' => 1,
    'file:contenido-inicio.tpl' => 1,
  ),
),false)) {
function content_591f2dc9084921_65827730 (Smarty_Internal_Template $_smarty_tpl) {
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
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../dist/css/estilo.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="inicio.php" class="logo">
      <span class="logo-mini"><b>ALGO</b></span>
      <span class="logo-lg"><b>Admin</b>ALGO</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Mensajes-->
          <?php $_smarty_tpl->_subTemplateRender("file:mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <!-- Cuenta Usuario -->
          <?php $_smarty_tpl->_subTemplateRender("file:cuenta-usuario.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/icono_usuario.png" class="img-circle" alt="Imagen de Usuario">
        </div>
        <div class="pull-left info">
          <p><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
        <?php $_smarty_tpl->_subTemplateRender("file:menu-lateral.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </section>
  </aside>
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
        <?php $_smarty_tpl->_subTemplateRender("file:contenido-inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
<?php echo '<script'; ?>
 src="../plugins/jQuery/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"><?php echo '</script'; ?>
>
<!-- Resuelve conflicto de jQuery UI con Bootstrap -->
<?php echo '<script'; ?>
>
  $.widget.bridge('uibutton', $.ui.button);
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/slimScroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/atle/js/app.js"><?php echo '</script'; ?>
>
<!--script src="../plugins/atle/js/pages/dashboard.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="../plugins/atle/js/demo.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
