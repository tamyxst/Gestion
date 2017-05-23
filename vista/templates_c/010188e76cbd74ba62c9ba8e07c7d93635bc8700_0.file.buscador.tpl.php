<?php
/* Smarty version 3.1.30, created on 2017-05-23 21:06:46
  from "/var/www/html/gestion/vista/templates/buscador.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592488467f6b80_73534951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '010188e76cbd74ba62c9ba8e07c7d93635bc8700' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/buscador.tpl',
      1 => 1495566383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592488467f6b80_73534951 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="gestion.php" method="post" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="search" id="search" class="form-control" placeholder="Buscando..." />
            <span class="input-group-btn">
                <button type="submit" name="enviar" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
    </div>
</form><?php }
}
