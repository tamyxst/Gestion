<?php
/* Smarty version 3.1.30, created on 2017-04-22 19:20:13
  from "/var/www/html/gestion/vista/templates/buscador.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb90cdeb9760_08839478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '010188e76cbd74ba62c9ba8e07c7d93635bc8700' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/buscador.tpl',
      1 => 1492881470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb90cdeb9760_08839478 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
    </div>
</form><?php }
}
