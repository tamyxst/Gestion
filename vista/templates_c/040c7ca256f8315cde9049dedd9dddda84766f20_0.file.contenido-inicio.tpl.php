<?php
/* Smarty version 3.1.30, created on 2017-06-04 15:58:28
  from "/var/www/html/gestion/vista/templates/contenido-inicio.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593412040e0fd4_93096054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '040c7ca256f8315cde9049dedd9dddda84766f20' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-inicio.tpl',
      1 => 1495980162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar-inicio.tpl' => 1,
  ),
),false)) {
function content_593412040e0fd4_93096054 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content">
<div class="row">
    <?php $_smarty_tpl->_subTemplateRender("file:sidebar-inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<div class="row">
 <section class="col-lg-6 connectedSortable">
    <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">Últimos registros</h3>
    </div>
    <div class="box-body">
      <ul class="todo-list">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ultimosReg']->value, 'uReg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['uReg']->value) {
?>
            <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
              <span class="text"><?php if (($_smarty_tpl->tpl_vars['uReg']->value->getTipoReg() === "incidencia")) {?><small class="label label-danger">Incidencia </small><?php } elseif (($_smarty_tpl->tpl_vars['uReg']->value->getTipoReg() === "pedido")) {?>
              <small class="label label-info">Pedido </small><?php } else { ?><small class="label label-primary">Otro </small><?php }?></span>
              <span class="text"><strong>De:</strong> <?php echo $_smarty_tpl->tpl_vars['uReg']->value->getIdContactoReg();?>
    </span>
              <span class="text"><strong>Asignado a:</strong> <?php echo $_smarty_tpl->tpl_vars['uReg']->value->getIdUsuarioReg();?>
</span>
              <div class="tools">
              <?php if (($_smarty_tpl->tpl_vars['uReg']->value->getTipoReg() === "incidencia")) {?>
                  <a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['uReg']->value->getIdReg();?>
"><i class="fa fa-edit"></i></a>
              <?php } elseif (($_smarty_tpl->tpl_vars['uReg']->value->getTipoReg() === "pedido")) {?>
                  <a href="gestion-pedidos.php?id=<?php echo $_smarty_tpl->tpl_vars['uReg']->value->getIdReg();?>
"><i class="fa fa-edit"></i></a>
              <?php } else { ?>
                  <a href="gestion-registros.php?id=<?php echo $_smarty_tpl->tpl_vars['uReg']->value->getIdReg();?>
"><i class="fa fa-edit"></i></a>
              <?php }?>
              </div>
            </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
    </div>
  </div>
</section>
  <section class="col-lg-6 connectedSortable">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
          </ol>
            <div class="carousel-inner">
            <div class="item">
              <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=Mensaje+del+dia" alt="First slide">
              <div class="carousel-caption">
                Primera imagen
              </div>
            </div>
            <div class="item">
              <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=Mensaje+del+dia" alt="Second slide">
              <div class="carousel-caption">
                Segunda imagen
              </div>
            </div>
            <div class="item active">
              <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=Mensaje+del+dia" alt="Third slide">
              <div class="carousel-caption">
                Tercera imagen
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
  </section>
</div>
</section><?php }
}
