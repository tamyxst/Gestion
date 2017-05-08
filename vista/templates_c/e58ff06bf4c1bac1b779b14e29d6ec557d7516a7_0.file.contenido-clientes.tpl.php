<?php
/* Smarty version 3.1.30, created on 2017-05-06 14:15:39
  from "/var/www/html/gestion/vista/templates/contenido-clientes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590dbe6bd76279_16748936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e58ff06bf4c1bac1b779b14e29d6ec557d7516a7' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-clientes.tpl',
      1 => 1494069449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar-inicio.tpl' => 1,
  ),
),false)) {
function content_590dbe6bd76279_16748936 (Smarty_Internal_Template $_smarty_tpl) {
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
              <li class="active"><a href="#listado" data-toggle="tab">Listado clientes</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php } else { ?>
              <li><a href="#listado" data-toggle="tab">Listado clientes</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
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
                      <div class="mailbox-messages">
                        <table id="tabmen" class="display table table-bordered table-hover">
                           <thead>
                            <tr>
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Código Postal</th>
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
        <?php if (empty($_smarty_tpl->tpl_vars['mostrarClientes']->value)) {?>
        <p>No hay mensajes disponibles</p>
        <?php } else { ?>
          <div class="row">
            <div class="col-lg-6">
                <h3>Detalle clientes</h3>
        <?php if (empty($_smarty_tpl->tpl_vars['cliente']->value)) {?>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Dni</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getDniContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Apellidos, Nombre</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getNombreContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Dirección</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getDireccionContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Código postal</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getCodPostalContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getEmailContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getTelefonoContacto();?>
</div>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Dni</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getDniContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Apellidos, Nombre</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getNombreContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Dirección</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getDireccionContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Código postal</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getCiudadContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getEmailContacto();?>
</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right"><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getTelefonoContacto();?>
</div>
                </li>
            </ul>
        <?php }?>
            <div class="pull-right">
                <?php if (empty($_smarty_tpl->tpl_vars['cliente']->value)) {?>
                    <button type="button" onclick="editar('<?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getIdContacto();?>
')" name="editar" class="btn btn-default"><i class="fa fa-reply"></i> Editar</button>
                <?php } else { ?>
                     <button type="button" onclick="editar('<?php echo $_smarty_tpl->tpl_vars['cliente']->value->getIdContacto();?>
')" name="editar" class="btn btn-default"><i class="fa fa-reply"></i> Editar</button>
                <?php }?>
                <form class="pull-right" action="gestion-clientes.php" method="post"> 
                    <?php if (empty($_smarty_tpl->tpl_vars['cliente']->value)) {?>
                        <input type="hidden" name="id_contacto" value="<?php echo $_smarty_tpl->tpl_vars['mostrarClientes']->value[0]->getIdContacto();?>
">
                    <?php } else { ?>
                        <input type="hidden" name="id_contacto" value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->getIdContacto();?>
">
                    <?php }?>
                    <button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
                </form>
            </div>
            <div class="row">
                    <div class="col-lg-6">
                        <div class="progress-group">
                            <span class="progress-text">Registros</span>
                            <span class="progress-number"><b>5</b>/50</span>
                            <div class="progress sm">
                              <div class="progress-bar progress-bar-yellow" style="width: 10%"></div>
                            </div>
                      </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
            <h3>Editar clientes</h3>
            <form id="formn" novalidate action="gestion-clientes.php" method="post"> 
            <div class="row">
                <input type="hidden" class="form-control" id="id_contacto_e" name="id_contacto">
                <div class="col-lg-6">
                   <div class="form-group">
                       <label class="control-label" for="dni">Dni <span class="asterisco">*</span></label>
                          <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                             <input type="text" class="form-control" id="dni_e" name="dni" maxlength="9" placeholder="10000000X">
                          </div>
                      </div>
                 </div>
                 <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                      <label class="control-label" for="nombre">Apellidos, Nombre <span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="nombre_e" name="nombre" class="form-control" placeholder="Nombre Apellidos" minlength="3">
                    </div>
                    </div>
                 </div>
                 <div class="col-lg-6">
                   <div class="form-group">
                      <label class="control-label" for="direccion">Dirección<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="direccion_e" name="direccion" id="direccion" class="form-control" placeholder="Dirección completa" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                   <div class="form-group">
                      <label class="control-label" for="ciudad">Ciudad<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="ciudad_e" name="ciudad" class="form-control" placeholder="Ciudad" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="cod_postal">Código postal <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                             <input type="text" id="cod_postal_e" name="cod_postal" class="form-control" placeholder="50000" maxlength="5">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="temail">Email <span class="asterisco">*</span></label>

                        <div class="input-group">	 
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                            <input type="email" id="email_e" name="email" class="form-control" placeholder="Email">
                        </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="telefono">Teléfono <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="tel" id="telefono_e" name="telefono" class="form-control" maxlength="9" placeholder="(+34) 666 666 666">
                         </div>
                     </div>
                </div>
                <div class="col-lg-12"> 
                    <div class="form-group pull-right">
                        <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuContacto()">Enviar</button> 
                    </div>  
                </div>
            </div>
           </form>
          </div>
        </div>
       <?php }?>
    </div>
  </div>
  </div>
</div>
</div>
</section><?php }
}
