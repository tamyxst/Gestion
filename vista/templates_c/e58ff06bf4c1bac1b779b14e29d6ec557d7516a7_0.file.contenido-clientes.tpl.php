<?php
/* Smarty version 3.1.30, created on 2017-05-24 20:05:40
  from "/var/www/html/gestion/vista/templates/contenido-clientes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5925cb745a84f4_76971853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e58ff06bf4c1bac1b779b14e29d6ec557d7516a7' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-clientes.tpl',
      1 => 1495648647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar-inicio.tpl' => 1,
  ),
),false)) {
function content_5925cb745a84f4_76971853 (Smarty_Internal_Template $_smarty_tpl) {
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
                Error: Ya existe un cliente registrado con el mismo Dni!
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
              <?php if (empty($_smarty_tpl->tpl_vars['cliente']->value)) {?>
              <li id="p_listado" class="active"><a href="#listado" data-toggle="tab">Listado clientes</a></li>
              <li id="p_nuevo"><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li id="p_detalle"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php } else { ?>
              <li id="p_listado"><a href="#listado" data-toggle="tab">Listado clientes</a></li>
              <li id="p_nuevo"><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li id="p_detalle" class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php }?>
            </ul>
            <div class="tab-content">
               <?php if (empty($_smarty_tpl->tpl_vars['cliente']->value)) {?><div class="active tab-pane" id="listado"><?php } else { ?><div class="tab-pane" id="listado"><?php }?>    
                <form method="POST" action="gestion-clientes.php">
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar clientes">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                    <div class="box-body">
                      <div class="box-tools">
                            <table id="tabmen" cellspacing="0" width="100%" class="display table table-bordered table-hover responsive nowrap">
                           <thead>
                            <tr>
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Código Postal</th>
                                <th>Nº Registros</th>
                            </tr>
                           </thead>
                           <tbody>
                               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostrarClientes']->value, 'mc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mc']->value) {
?>
                                    <tr>
                                        <td><a href="gestion-clientes.php?id=<?php echo $_smarty_tpl->tpl_vars['mc']->value->getIdContacto();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mc']->value->getDniContacto();?>
</b></a></td>
                                        <td><a href="gestion-clientes.php?id=<?php echo $_smarty_tpl->tpl_vars['mc']->value->getIdContacto();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mc']->value->getNombreContacto();?>
</b></a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mc']->value->getDireccionContacto();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mc']->value->getCiudadContacto();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mc']->value->getCodPostalContacto();?>
</td>
                                        <td><span class="badge bg-light-blue"><?php echo $_smarty_tpl->tpl_vars['mc']->value->getNumReg();?>
</span></td>
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
                        <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-clientes.php'"><i class="fa fa-refresh"></i></button>
                     </div>
                    </div> 
                  </form>
                </div>
                 
              <div class="tab-pane" id="nuevo">
                  <div class="row">
                    <div class="col-lg-6">
                        <h3>Añadir cliente</h3>
                    </div>
                </div>
                <form id="formn" novalidate action="gestion-clientes.php" method="post">  
                <div class="row">
                   <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="dni">Dni <span class="asterisco">*</span></label>
                              <div class="input-group">	 
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                 <input type="text" class="form-control" id="dni" name="dni" maxlength="9" placeholder="10000000X">
                              </div>
                          </div>
                     </div>
                     <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="nombre">Apellidos, Nombre<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Apellidos" minlength="3">
                        </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                       <div class="form-group">
                          <label class="control-label" for="direccion">Dirección<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" id="direccion" name="direccion" id="direccion" class="form-control" placeholder="Dirección completa" minlength="3">
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                       <div class="form-group">
                          <label class="control-label" for="ciudad">Ciudad<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" minlength="3">
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                         <div class="form-group">
                             <label class="control-label" for="cod_postal">Código postal <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                 <input type="text" id="cod_postal" name="cod_postal" class="form-control" placeholder="50000" maxlength="5">
                             </div>
                         </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="temail">Email <span class="asterisco">*</span></label>
                      
                            <div class="input-group">	 
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                         <div class="form-group">
                             <label class="control-label" for="telefono">Teléfono <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                 <input type="tel" id="telefono" name="telefono" class="form-control" maxlength="9" placeholder="(+34) 666 666 666">
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
                              
              <?php if (empty($_smarty_tpl->tpl_vars['cliente']->value)) {?><div class="tab-pane" id="detalle"><?php } else { ?><div class="active tab-pane" id="detalle"><?php }?>
          <div class="row">
            <div class="col-lg-6">
            <h3>Editar clientes</h3>    
            <form id="formeditar" novalidate action="gestion-clientes.php" method="post"> 
                <div class="row">
                <div class="col-lg-6">
                   <div class="form-group">
                       <label class="control-label" for="dni_e">Dni <span class="asterisco">*</span></label>
                          <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                             <input type="text" class="form-control" id="dni_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getDniContacto();
}?>" name="dni_e" maxlength="9" placeholder="10000000X">
                          </div>
                      </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label" for="nombre_e">Apellidos, Nombre <span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="nombre_e" name="nombre_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getNombreContacto();
}?>" class="form-control" placeholder="Nombre Apellidos" minlength="3">
                    </div>
                    </div>
                 </div>
                 <div class="col-lg-12">
                   <div class="form-group">
                      <label class="control-label" for="direccion_e">Dirección<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="direccion_e" name="direccion_e" id="direccion_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getDireccionContacto();
}?>" class="form-control" placeholder="Dirección completa" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                   <div class="form-group">
                      <label class="control-label" for="ciudad_e">Ciudad<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="ciudad_e" name="ciudad_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getCiudadContacto();
}?>" class="form-control" placeholder="Ciudad" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="cod_postal_e">Código postal <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                             <input type="text" id="cod_postal_e" name="cod_postal_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getCodPostalContacto();
}?>" class="form-control" placeholder="50000" maxlength="5">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="email_e">Email <span class="asterisco">*</span></label>
                        <div class="input-group">	 
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                            <input type="email" id="email_e" name="email_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getEmailContacto();
}?>" class="form-control" placeholder="Email">
                        </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="telefono_e">Teléfono <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="tel" id="telefono_e" name="telefono_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getTelefonoContacto();
}?>" class="form-control" maxlength="9" placeholder="(+34) 666 666 666">
                         </div>
                     </div>
                </div>
                <div class="col-lg-12">
                    <div class="pull-right">
                        <input type="hidden" name="id_contacto_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['cliente']->value)) {
echo $_smarty_tpl->tpl_vars['cliente']->value->getIdContacto();
}?>">
                        <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuEditar()">Editar Cliente</button> 
                        <button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
                    </div>  
                </div>
               </div>
              </form>
            </div>
           <div class="col-lg-6">
                <h3>Registros</h3>
            <div class="row">
                    <div class="col-lg-12">
                        <?php if (!empty($_smarty_tpl->tpl_vars['registros']->value)) {?>
                        <form method="POST" action="gestion-clientes.php">
                          <div class="box-tools pull-right">
                            <div class="has-feedback">
                              <input type="text" id="buscador-reg" class="form-control input-sm" placeholder="Buscar registros">
                              <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                          </div>  
                        <div class="box-body">
                          <div class="box-tools">
                            <table id="tabreg" cellspacing="0" width="100%" class="display table table-bordered table-hover responsive nowrap">
                               <thead>
                                <tr>
                                    <th></th>
                                    <th>Autor</th>
                                    <th>Prioridad</th>
                                    <th>Fecha</th>
                                    <th>Asignado a</th>
                                    <th>Estado</th>
                                </tr>
                               </thead>
                               <tbody>
                                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['registros']->value, 'mi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->value) {
?>
                                        <tr>
                                            <td><?php if (($_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg() === 'alta')) {?><i class="fa fa-circle-o text-red"></i><?php } elseif (($_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg() === 'media')) {?><i class="fa fa-circle-o text-yellow"></i><?php } else { ?><i class="fa fa-circle-o text-aqua"></i><?php }?></td>
                                            <td><a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdContactoReg();?>
</a></td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getPrioridadReg();?>
</a></td>
                                            <td><a href="gestion-incidencias.php?id=<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdReg();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getFechaReg();?>
</b></a></td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdUsuarioReg();?>
</td>
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
                            <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-clientes.php'"><i class="fa fa-refresh"></i></button>
                         </div>
                        </div> 
                      </form>
                      <?php }?>
                    </div>
                </div>
            </div>
       </div>
    </div>
    </div>
  </div>
  </div>
</div>
</section><?php }
}
