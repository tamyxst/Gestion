<?php
/* Smarty version 3.1.30, created on 2017-04-26 21:33:05
  from "/var/www/html/gestion/vista/templates/gestion-mensajes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5900f5f1be8bb1_05455364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd02703cdb387a89a552f3e2ed575df21bb4818d7' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/gestion-mensajes.tpl',
      1 => 1493233270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:mensajes.tpl' => 1,
    'file:cuenta-usuario.tpl' => 1,
    'file:buscador.tpl' => 1,
    'file:menu-lateral.tpl' => 1,
    'file:contenido-mensajes.tpl' => 1,
  ),
),false)) {
function content_5900f5f1be8bb1_05455364 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['codigoJS']->value;?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ALGO Gestor - Gestión mensajes</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="author" content="Tamara Gascon">
  <link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/estilo.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!--<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">-->
  <link rel="stylesheet" href="../plugins/dataTables/dataTables.bootstrap.css">
  <?php echo '<script'; ?>
 type="text/javascript">
            function cargar(id_mensaje){
                xajax_cargar(id_mensaje);
            }
            function archivar(id_mensaje){
                xajax_archivar(id_mensaje);
            }
            function eliminar(id_mensaje){
                xajax_eliminar(id_mensaje);
            }
            function responder(id_usuario_m){
                xajax_responder(id_usuario_m);
            }
   <?php echo '</script'; ?>
>
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
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
      <!-- Menú lateral-->
        <?php $_smarty_tpl->_subTemplateRender("file:buscador.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
    <!-- Contenido Mensajes -->
        <?php $_smarty_tpl->_subTemplateRender("file:contenido-mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://www.algodecoracion.com">Algo Decoración, S.A.</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Control sidebar -->
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
<!--<?php echo '<script'; ?>
 src="../plugins/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="../plugins/slimScroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/atle/js/app.js"><?php echo '</script'; ?>
>
<!--<?php echo '<script'; ?>
 src="../plugins/atle/js/pages/dashboard.js"><?php echo '</script'; ?>
>-->
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
 src="../dist/js/gestion.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
