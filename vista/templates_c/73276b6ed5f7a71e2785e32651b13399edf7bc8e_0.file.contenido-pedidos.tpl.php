<?php
/* Smarty version 3.1.30, created on 2017-05-26 21:00:11
  from "/var/www/html/gestion/vista/templates/contenido-pedidos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59287b3b29f911_85898529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73276b6ed5f7a71e2785e32651b13399edf7bc8e' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-pedidos.tpl',
      1 => 1495825209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar-inicio.tpl' => 1,
  ),
),false)) {
function content_59287b3b29f911_85898529 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content">
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:sidebar-inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<div class="row">
  <div class="col-md-12" id="msj">
        <?php if (!empty($_smarty_tpl->tpl_vars['msj']->value)) {?>
            <?php if (($_smarty_tpl->tpl_vars['msj']->value == 'no')) {?>
             <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                Los cambios se han realizado correctamente.
              </div>
             <?php } elseif (($_smarty_tpl->tpl_vars['msj']->value == 'si')) {?>
             <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Algo ha salido mal.
              </div>
              <?php } else { ?>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Error: Ya existe un pedido registrado con el mismo Dni!
              </div>  
             <?php }?>
        <?php }?>
    </div>
    <div class="col-md-12">    
        <div class="errores_formu">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" onclick="ocultarFormError()" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                <div id="errores"></div>
            </div>
        </div>
    </div>  
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php if (empty($_smarty_tpl->tpl_vars['pedido']->value)) {?>
              <li class="active"><a href="#listado" data-toggle="tab">Listado pedidos</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php } else { ?>
              <li><a href="#listado" data-toggle="tab">Listado pedidos</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php }?>
            </ul>
            <div class="tab-content">
               <?php if (empty($_smarty_tpl->tpl_vars['pedido']->value)) {?><div class="active tab-pane" id="listado"><?php } else { ?><div class="tab-pane" id="listado"><?php }?>    
                <form method="POST" action="gestion-pedidos.php">
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar pedidos">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                    <div class="box-body">
                      <div class="box-tools">
                        <table id="tabmen" cellspacing="0" width="100%" class="display table table-bordered table-hover responsive nowrap">
                            <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Fecha Entrega</th>
                                <th>Material</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                           </thead>
                           <tbody>
                               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostrarPedidos']->value, 'mi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->value) {
?>
                                    <tr>
                                        <td><a href="gestion-pedidos.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdContactoReg();?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getFechaEntregaReg();?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getMaterialReg();?>
</td>
                                        <td><a href="gestion-pedidos.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getFechaReg();?>
</b></a></td>
                                        <th><?php if (($_smarty_tpl->tpl_vars['mi']->value->getEstadoReg() === 'Pendiente')) {?><span class="label label-danger">Pendiente</span><?php } elseif (($_smarty_tpl->tpl_vars['mi']->value->getEstadoReg() === 'Modificada')) {?><span class="label label-warning">Modificada</span><?php } else { ?><span class="label label-success">Finalizada</span><?php }?></th>
                                    </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                           </tbody>
                          </table>
                      </div>
                      <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-pedidos.php'"><i class="fa fa-refresh"></i></button>
                     </div>
                    </div> 
                  </form>
                </div>
              <div class="tab-pane" id="nuevo">
                 <div class="row">
                     <div class="col-lg-6">
                     <h3>Añadir pedido</h3>
                   <form id="formreg" novalidate action="gestion-pedidos.php" method="post" enctype="multipart/form-data"> 
                     <div class="row">
                       <div class="col-lg-6">
                          <div class="form-group">
                             <label class="control-label" for="estado">Estado <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                 <select class="form-control" id="estado" name="estado">
                                      <option value="0">Pendiente</option>
                                      <option value="1">Modificada</option>
                                      <option value="2">Finalizada</option>
                                 </select>
                             </div>
                          </div>
                     </div>
                    <div class="col-lg-6">
                       <div id="fnac"></div>
                          <div class="form-group"> 
			     <label class="control-label">Fecha entrega: <span class="asterisco">*</span></label>
				<div class="input-group date input-append datepicker" id="filter-date">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" name="fecha_entrega" size="16" class="form-control" placeholder="01/01/2017" />
                                </div>
                          </div>
                     </div>
                         
                     <div class="col-lg-6 form-group required-field-block">
                         <label class="control-label" for="material">Material</label>
                        <div class="col-md-12 input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="3" size="30" value="" name="material" id="material" class="form-control" placeholder="Material"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group required-field-block">
                         <label class="control-label" for="observaciones">Observaciones</label>
                        <div class="col-md-12 input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="3" size="30" name="observaciones" value="" id="observaciones" class="form-control" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="id_usuario_r">Asignado a <span class="asterisco">*</span></label>
                            <div class="input-group">	 
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select class="form-control" name="id_usuario_r">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['u']->value->getIdUsuario();?>
"><?php echo $_smarty_tpl->tpl_vars['u']->value->getNombreCompleto();?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label" for="contacto">Autor <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" id="contacto" name="contacto" class="form-control">
                            </div>
                         </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                         <label class="control-label" for="imagen">Adjuntar imagen</label>
                         <div id="imagen"></div>
                         <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>	
                             <input type="file" name="imagen" class="filestyle" data-size="sm">
                         </div>
			</div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" name="enviar" class="btn btn-default" onsubmit="validarFormuregistro()">Enviar</button> 
                        </div>  
                    </div>
                  </div>
                </form>
              </div>
             </div>
           </div>
        <?php if (empty($_smarty_tpl->tpl_vars['pedido']->value)) {?><div class="tab-pane" id="detalle"><?php } else { ?> <div class="active tab-pane" id="detalle"><?php }?>
        <div class="row">
          <div class="col-lg-6">
              <h3>Detalle pedidos</h3>
          <form id="formeditar" novalidate action="gestion-pedidos.php" method="post" enctype="multipart/form-data">  
              <div class="row">
                   <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="fecha">Fecha</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input type="text" disabled value="<?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getFechaNormalReg();
}?>" class="form-control">
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                          <!-- Si el registro es de cliente o proveedor -->
                          <label class="control-label" for="contacto">Autor <?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {?><a href="<?php if (($_smarty_tpl->tpl_vars['cont']->value->getTipoContacto() === "cliente")) {?>gestion-clientes.php?id=<?php } else { ?>gestion-proveedores.php?id=<?php }
echo $_smarty_tpl->tpl_vars['pedido']->value->getIdContactoRegId();?>
"> Ver ficha</a><?php }?></label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getIdContactoReg();
}?>" class="form-control" disabled />
                          </div>
                       </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="estado">Estado</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                              <select class="form-control" id="estado_e" name="estado_e">
                                   <?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {?>
                                     <?php if (($_smarty_tpl->tpl_vars['pedido']->value->getEstadoReg() === 'Pendiente')) {?><option value="0" selected>Pendiente</option><?php } else { ?><option value="0">Pendiente</option><?php }?>
                                     <?php if (($_smarty_tpl->tpl_vars['pedido']->value->getEstadoReg() === 'Modificada')) {?><option value="1" selected>Modificada</option><?php } else { ?><option value="1">Modificada</option><?php }?>
                                     <?php if (($_smarty_tpl->tpl_vars['pedido']->value->getEstadoReg() === 'Finalizada')) {?><option value="2" selected>Finalizada</option><?php } else { ?><option value="2">Finalizada</option><?php }?>
                                   <?php }?>
                              </select>
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="fecha_entrega_e">Fecha entrega</label>
                          <div class="input-group date input-append datepicker" id="filter-date">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input type="text" name="fecha_entrega_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getFechaEntregaReg();
}?>" class="form-control">
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6 form-group required-field-block">
                       <label class="control-label" for="material">Material</label>
                      <div class="col-md-12 input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea rows="3" size="30" value="" name="material_e" id="material_e" class="form-control" placeholder="Material"><?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getMaterialReg();
}?></textarea>
                      </div>
                  </div>
                  <div class="col-lg-6 form-group required-field-block">
                       <label class="control-label" for="observaciones">Observaciones</label>
                      <div class="col-md-12 input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea rows="3" size="30" name="observaciones_e" value="" id="observaciones_e" class="form-control" placeholder="Observaciones"><?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getObservacionesReg();
}?></textarea>
                      </div>
                  </div>
                  <div class="col-lg-12 block-img-registro">
                        <div class="row" id="img-registro">
                          <?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value->getImagenReg())) {?>
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pedido']->value->getImagenRegArreglo(), 'imagen');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
?>
                                  <div class="col-lg-4">Imagen pedido: 
                                      <a href="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['pedido']->value->getIdContactoReg();?>
" target="_blank"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" alt="imagen" /></a>
                                      <button type="button" name="borrar" class="btn btn-default btn-del" onclick="borrarImagen('<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['pedido']->value->getIdReg();?>
')">Borrar Imagen</button> 
                                  </div>
                              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                          <?php }?>
                         </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                          <label class="control-label" for="id_usuario_r_e">Asignado a</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <select class="form-control" name="id_usuario_r_e" id="id_usuario_r_e">
                                   <?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {?>
                                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
                                         <?php if (($_smarty_tpl->tpl_vars['pedido']->value->getIdUsuarioReg() === $_smarty_tpl->tpl_vars['u']->value->getNombreCompleto())) {?>
                                             <option value="<?php echo $_smarty_tpl->tpl_vars['u']->value->getIdUsuario();?>
" selected><?php echo $_smarty_tpl->tpl_vars['u']->value->getNombreCompleto();?>
</option>
                                         <?php } else { ?>
                                             <option value="<?php echo $_smarty_tpl->tpl_vars['u']->value->getIdUsuario();?>
"><?php echo $_smarty_tpl->tpl_vars['u']->value->getNombreCompleto();?>
</option>
                                         <?php }?>
                                     <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                   <?php }?>
                              </select>
                          </div>
                       </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                       <label class="control-label" for="imagen">Adjuntar imagen</label>
                       <div id="imagen"></div>
                       <div class="input-group">	 
                           <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>		
                           <input type="file" id="imagen_e" name="imagen_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getImagenReg();
}?>" class="filestyle" data-size="sm">
                       </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="pull-right">
                         <input type="hidden" name="id_registro_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getIdReg();
}?>">
                         <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuEditar()">Editar Pedido</button> 
                         <button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
                      </div>
                  </div>
               </form>
              </div>
              <div class="col-md-6">
              <h3>Comentarios</h3>
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-body">
                  <div class="direct-chat-messages">
                    <?php if (!empty($_smarty_tpl->tpl_vars['comentarios']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comentarios']->value, 'com');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['com']->value) {
?>
                            <?php if (($_smarty_tpl->tpl_vars['com']->value->nomUsuarioComentario() !== $_smarty_tpl->tpl_vars['usuario']->value)) {?>    
                            <div class="direct-chat-msg">
                              <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left"><?php echo $_smarty_tpl->tpl_vars['com']->value->nomUsuarioComentario();?>
</span>
                                <span class="direct-chat-timestamp pull-right"><?php echo $_smarty_tpl->tpl_vars['com']->value->getFechaComentario();?>
</span>
                              </div>
                              <div class="direct-chat-text">
                                <?php echo $_smarty_tpl->tpl_vars['com']->value->getTextoComentario();?>

                              </div>
                            </div>
                            <?php } else { ?>
                            <div class="direct-chat-msg right">
                              <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right"><?php echo $_smarty_tpl->tpl_vars['com']->value->nomUsuarioComentario();?>
</span>
                                <span class="direct-chat-timestamp pull-left"><?php echo $_smarty_tpl->tpl_vars['com']->value->getFechaComentario();?>
</span>
                              </div>
                              <div class="direct-chat-text">
                                <?php echo $_smarty_tpl->tpl_vars['com']->value->getTextoComentario();?>

                              </div>
                            </div>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php }?>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <form action="gestion-pedidos.php" method="post">
                    <div class="input-group">
                      <input type="text" name="comentario" placeholder="Escribir comentario" class="form-control">
                      <input type="hidden" name="id_registro_com" value="<?php if (!empty($_smarty_tpl->tpl_vars['pedido']->value)) {
echo $_smarty_tpl->tpl_vars['pedido']->value->getIdReg();
}?>">
                          <span class="input-group-btn">
                            <button type="submit" name="enviar_comentario" class="btn btn-warning btn-flat">Enviar</button>
                          </span>
                    </div>
                  </form>
                </div>
              </div>             
          </div>
       </div>
     </div>
   </div>    
  </div>                    
</div>                        
</div>                      
</section>
                           
                           <?php }
}
