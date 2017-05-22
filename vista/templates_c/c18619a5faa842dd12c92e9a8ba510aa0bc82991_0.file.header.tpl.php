<?php
/* Smarty version 3.1.30, created on 2017-05-19 18:38:04
  from "/var/www/html/gestion/vista/templates/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_591f1f6cecbb31_81870866',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c18619a5faa842dd12c92e9a8ba510aa0bc82991' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/header.tpl',
      1 => 1495211834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:mensajes.tpl' => 1,
    'file:cuenta-usuario.tpl' => 1,
    'file:buscador.tpl' => 1,
    'file:menu-lateral.tpl' => 1,
  ),
),false)) {
function content_591f1f6cecbb31_81870866 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
      <!-- Menú lateral-->
        <?php $_smarty_tpl->_subTemplateRender("file:buscador.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php $_smarty_tpl->_subTemplateRender("file:menu-lateral.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </section>
  </aside><?php }
}
