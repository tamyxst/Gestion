<?php
/* Smarty version 3.1.30, created on 2017-05-22 20:33:28
  from "/var/www/html/gestion/vista/templates/contenido-incidencias.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59232ef878c486_22521417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e19f45f98ca6013fab247edf3e56edfba7b0a5ee' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-incidencias.tpl',
      1 => 1495477994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar-inicio.tpl' => 1,
  ),
),false)) {
function content_59232ef878c486_22521417 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <?php $_smarty_tpl->_subTemplateRender("file:sidebar-inicio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
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
                Error: Ya existe un incidencia registrado con el mismo Dni!
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
        <!-- AQUI-->          
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php if (empty($_smarty_tpl->tpl_vars['incidencia']->value)) {?>
              <li class="active"><a href="#listado" data-toggle="tab">Listado incidencias</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php } else { ?>
              <li><a href="#listado" data-toggle="tab">Listado incidencias</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php }?>
            </ul>
            <div class="tab-content">
               <?php if (empty($_smarty_tpl->tpl_vars['incidencia']->value)) {?><div class="active tab-pane" id="listado"><?php } else { ?><div class="tab-pane" id="listado"><?php }?>    
                <form method="POST" action="gestion-incidencias.php">
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar incidencias">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                    <div class="box-body">
                      <div class="mailbox-messages">
                        <table id="tabmen" class="display table table-bordered table-hover">
                           <thead>
                            <tr>
                                <th></th>
                                <th>Prioridad</th>
                                <th>Fecha</th>
                                <th>Autor</th>
                                <th>Asignado a</th>
                                <th>Estado</th>
                            </tr>
                           </thead>
                           <tbody>
                               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostrarIncidencias']->value, 'mi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->value) {
?>
                                    <tr>
                                        <td><?php if (($_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg() === 'alta')) {?><i class="fa fa-circle-o text-red"></i><?php } elseif (($_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg() === 'media')) {?><i class="fa fa-circle-o text-yellow"></i><?php } else { ?><i class="fa fa-circle-o text-aqua"></i><?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg();?>
</a></td>
                                        <td><a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getFechaReg();?>
</b></a></td>
                                        <td><a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdContactoReg();?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdUsuarioReg();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getEstadoReg();?>
</td>
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
                        <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-incidencias.php'"><i class="fa fa-refresh"></i></button>
                     </div>
                    </div> 
                  </form>
                </div>
              <div class="tab-pane" id="nuevo">
                 <div class="row">
                     <div class="col-lg-6">
                     <h3>Añadir incidencia</h3>
                   <form id="formn" novalidate action="gestion-incidencias.php" method="post" enctype="multipart/form-data"> 
                     <div class="row">
                       <div class="col-lg-6">
                          <div class="form-group">
                             <label class="control-label" for="estado">Estado <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                 <select class="form-control" name="estado">
                                      <option value="0">Pendiente</option>
                                      <option value="1">Modificada</option>
                                      <option value="2">Finalizada</option>
                                 </select>
                             </div>
                          </div>
                     </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label" for="prioridad">Prioridad <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                <select class="form-control" name="prioridad">
                                     <option value="alta">Alta</option>
                                     <option value="media">Media</option>
                                     <option value="baja">Baja</option>
                                </select>
                            </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="material">Material<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                          <input type="text" id="material" name="material" class="form-control" placeholder="Material empleado" minlength="3">
                        </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                          <label class="control-label" for="observaciones">Observaciones<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                          <input type="text" id="observaciones" name="observaciones" id="observaciones" class="form-control" placeholder="Observaciones" minlength="3">
                          </div>
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
                            <button type="submit" name="enviar" class="btn btn-default" onsubmit="validarFormuContacto()">Enviar</button> 
                        </div>  
                    </div>
                  </div>
                </form>
              </div>
             </div>
           </div>
        <?php if (empty($_smarty_tpl->tpl_vars['incidencia']->value)) {?><div class="tab-pane" id="detalle"><?php } else { ?> <div class="active tab-pane" id="detalle"><?php }?>
          <div class="row">
            <div class="col-lg-6">
                <h3>Detalle incidencias</h3>
            <form id="formeditar" novalidate action="gestion-incidencias.php" method="post" enctype="multipart/form-data">  
                <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label" for="fecha">Fecha</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="text" disabled value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getFechaNormalReg();
}?>" class="form-control">
                            </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="contacto">Autor</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getIdContactoReg();
}?>" class="form-control" disabled />
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="id_usuario_r_e">Asignado</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="id_usuario_r_e" id="id_usuario_r_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getIdUsuarioReg();
}?>" class="form-control" />
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label" for="estado">Estado<span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                <select class="form-control" id="estado_e" name="estado_e">
                                     <?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {?>
                                       <?php if (($_smarty_tpl->tpl_vars['incidencia']->value->getEstadoReg() === 'Pendiente')) {?><option value="0" selected>Pendiente</option><?php } else { ?><option value="0">Pendiente</option><?php }?>
                                       <?php if (($_smarty_tpl->tpl_vars['incidencia']->value->getEstadoReg() === 'Modificada')) {?><option value="1" selected>Modificada</option><?php } else { ?><option value="1">Modificada</option><?php }?>
                                       <?php if (($_smarty_tpl->tpl_vars['incidencia']->value->getEstadoReg() === 'Finalizada')) {?><option value="2" selected>Finalizada</option><?php } else { ?><option value="2">Finalizada</option><?php }?>
                                     <?php }?>
                                </select>
                            </div>
                         </div>
                     </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label" for="prioridad">Prioridad <span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                <select class="form-control" id="estado_e" name="prioridad_e">
                                     <?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {?>
                                       <?php if (($_smarty_tpl->tpl_vars['incidencia']->value->getPrioridadReg() === 'alta')) {?><option value="alta" selected>Alta</option><?php } else { ?><option value="alta">Alta</option><?php }?>
                                       <?php if (($_smarty_tpl->tpl_vars['incidencia']->value->getPrioridadReg() === 'media')) {?><option value="media" selected>Media</option><?php } else { ?><option value="media">Media</option><?php }?>
                                       <?php if (($_smarty_tpl->tpl_vars['incidencia']->value->getPrioridadReg() === 'baja')) {?><option value="baja" selected>Baja</option><?php } else { ?><option value="baja">Baja</option><?php }?>
                                     <?php }?>
                                </select>
                            </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="material">Material<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                          <input type="text" id="material_e" name="material_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getMaterialReg();
}?>" class="form-control" placeholder="Material empleado" minlength="3">
                        </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                          <label class="control-label" for="observaciones">Observaciones<span class="asterisco">*</span></label>
                          <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                          <input type="text" id="observaciones_e" name="observaciones_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getObservacionesReg();
}?>" class="form-control" placeholder="Observaciones" minlength="3">
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12 block-img-registro">
                          <div class="row" id="img-registro">
                            <?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value->getImagenRegArreglo())) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['incidencia']->value->getImagenRegArreglo(), 'imagen');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
?>
                                    <div class="col-lg-4">Imagen incidencia: 
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['incidencia']->value->getIdContactoReg();?>
" target="_blank"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" alt="imagen" /></a>
                                        <button type="button" name="borrar" class="btn btn-default btn-del" onclick="borrarImagen('<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['incidencia']->value->getIdReg();?>
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
                         <label class="control-label" for="imagen">Adjuntar imagen</label>
                         <div id="imagen"></div>
                         <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>		
                             <input type="file" id="imagen_e" name="imagen_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getImagenReg();
}?>" class="filestyle" data-size="sm">
                         </div>
			</div>
                    </div>
                    <?php if (($_smarty_tpl->tpl_vars['usuario']->value === 'admin')) {?>      
                    <div class="col-lg-6">
                        <div class="form-group">
                         <label class="control-label" for="archivar_e">Archivar incidencia</label>
                         <div id="archivar_e"></div>
                         <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>		
                             <input type="text" id="arcihvar_e" name="archivar_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getArchivarReg();
}?>" class="form-control">
                         </div>
			</div>
                    </div>
                    <?php } else { ?>
                        <input type="hidden" id="arcihvar_e" name="archivar_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getArchivarReg();
}?>" class="form-control">
                    <?php }?>
                    <div class="col-lg-12">
                        <div class="pull-right">
                           <input type="hidden" name="id_registro_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['incidencia']->value)) {
echo $_smarty_tpl->tpl_vars['incidencia']->value->getIdReg();
}?>">
                           <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuEditar()">Editar Incidencia</button> 
                           <button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
                        </div>
                    </div>
                 </form>
                </div>
            </div>
      </div>
    </div>
   </div>
    <div class="col-lg-12">
     <section class="col-lg-5 connectedSortable">
     <div class="box box-primary">
     <div class="box-header">
       <i class="ion ion-clipboard"></i>

       <h3 class="box-title">To Do List</h3>

       <div class="box-tools pull-right">
         <ul class="pagination pagination-sm inline">
           <li><a href="#">&laquo;</a></li>
           <li><a href="#">1</a></li>
           <li><a href="#">2</a></li>
           <li><a href="#">3</a></li>
           <li><a href="#">&raquo;</a></li>
         </ul>
       </div>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
       <ul class="todo-list">
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostrarIncidencias']->value, 'mi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->value) {
?>
           <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
           <input type="checkbox" value="">
           <span class="text"><a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg();?>
</b></a></span>
           <span class="text"><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdContactoReg();?>
</span>
           <small class="label label-danger"><i class="fa fa-clock-o"></i><a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getFechaReg();?>
</b></a></small>
           <span class="text"><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdUsuarioReg();?>
</span>
           <span class="text"><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdUsuarioReg();?>
</span>
           <div class="tools">
             <i class="fa fa-edit"></i>
             <i class="fa fa-trash-o"></i>
           </div>
         </li>
         <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

       </ul>
     </div>
     <!-- /.box-body -->
     <div class="box-footer clearfix no-border">
       <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
     </div>
    </div>
    </section>  
    </div>     
  </div>                    
</div>                        
</div>                      
</section>
                           
                           <?php }
}
