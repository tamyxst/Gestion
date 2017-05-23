<?php
/* Smarty version 3.1.30, created on 2017-05-23 20:25:34
  from "/var/www/html/gestion/vista/templates/contenido-proveedores.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59247e9e4868f4_96855718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a82427fcc8180dd7682c354302d66f95c69cac1a' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-proveedores.tpl',
      1 => 1495563929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar-inicio.tpl' => 1,
  ),
),false)) {
function content_59247e9e4868f4_96855718 (Smarty_Internal_Template $_smarty_tpl) {
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
              <?php } elseif (($_smarty_tpl->tpl_vars['msj']->value == 'existe')) {?>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Error: Ya existe un proveedor registrado con el mismo CIF!
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
              <?php if (empty($_smarty_tpl->tpl_vars['proveedor']->value)) {?>
              <li class="active"><a href="#listado" data-toggle="tab">Listado proveedores</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php } else { ?>
              <li><a href="#listado" data-toggle="tab">Listado proveedores</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              <?php }?>
            </ul>
            <div class="tab-content">
               <?php if (empty($_smarty_tpl->tpl_vars['proveedor']->value)) {?><div class="active tab-pane" id="listado"><?php } else { ?><div class="tab-pane" id="listado"><?php }?>    
                <form method="POST" action="gestion-proveedores.php">
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar proveedores">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                    <div class="box-body">
                      <div class="mailbox-messages">
                        <table id="tabmen" cellspacing="0" width="100%" class="display table table-bordered table-hover responsive nowrap">
                           <thead>
                            <tr>
                                <th>Cif</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Código Postal</th>
                            </tr>
                           </thead>
                           <tbody>
                               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostrarProveedores']->value, 'mp');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mp']->value) {
?>
                                    <tr>
                                        <td><a href="gestion-proveedores.php?id=<?php echo $_smarty_tpl->tpl_vars['mp']->value->getIdContacto();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mp']->value->getDniContacto();?>
</b></a></td>
                                        <td><a href="gestion-proveedores.php?id=<?php echo $_smarty_tpl->tpl_vars['mp']->value->getIdContacto();?>
" /><b><?php echo $_smarty_tpl->tpl_vars['mp']->value->getNombreContacto();?>
</b></a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mp']->value->getDireccionContacto();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mp']->value->getCiudadContacto();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['mp']->value->getCodPostalContacto();?>
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
                        <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-proveedores.php'"><i class="fa fa-refresh"></i></button>
                     </div>
                    </div> 
                  </form>
                </div>
              <div class="tab-pane" id="nuevo">
                <form id="formn" novalidate action="gestion-proveedores.php" method="post"> 
                <div class="row">
                   <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="dni">CIF <span class="asterisco">*</span></label>
                              <div class="input-group">	 
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                 <input type="text" class="form-control" id="dni" name="dni" maxlength="9" placeholder="A00000000">
                              </div>
                          </div>
                     </div>
                     <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="nombre">Razón social <span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Razón social" minlength="3">
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
                    <div class="col-lg-6 col-xs-12">
                         <div class="form-group">
                             <label class="control-label" for="sector">Sector <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                 <input type="text" id="sector" name="sector" class="form-control" placeholder="Industria">
                             </div>
                         </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                         <div class="form-group">
                             <label class="control-label" for="contacto">Persona contacto <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                 <input type="text" id="contacto" name="contacto" class="form-control" placeholder="Contacto">
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
                              
          <?php if (empty($_smarty_tpl->tpl_vars['proveedor']->value)) {?><div class="tab-pane" id="detalle"><?php } else { ?><div class="active tab-pane" id="detalle"><?php }?>
          <div class="row">
            <div class="col-lg-6">
            <h3>Editar proveedores</h3>
            <form id="formeditar" novalidate action="gestion-proveedores.php" method="post"> 
            <div class="row">
                <div class="col-lg-6">
                   <div class="form-group">
                       <label class="control-label" for="dni_e">Cif <span class="asterisco">*</span></label>
                          <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                             <input type="text" class="form-control" id="dni_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getDniContacto();
}?>" name="dni_e" maxlength="9" placeholder="10000000X">
                          </div>
                      </div>
                 </div>
                 <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                      <label class="control-label" for="nombre_e">Razón social <span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="nombre_e" name="nombre_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getNombreContacto();
}?>" class="form-control" placeholder="Nombre Apellidos" minlength="3">
                    </div>
                    </div>
                 </div>
                 <div class="col-lg-6">
                   <div class="form-group">
                      <label class="control-label" for="direccion_e">Dirección<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="direccion_e" name="direccion_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getDireccionContacto();
}?>" class="form-control" placeholder="Dirección completa" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                   <div class="form-group">
                      <label class="control-label" for="ciudad_e">Ciudad<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="ciudad_e" name="ciudad_e" class="form-control" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getCiudadContacto();
}?>" placeholder="Ciudad" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="cod_postal_e">Código postal <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                             <input type="text" id="cod_postal_e" name="cod_postal_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getCodPostalContacto();
}?>" class="form-control" placeholder="50000" maxlength="5">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="email_e">Email <span class="asterisco">*</span></label>

                        <div class="input-group">	 
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                            <input type="email" id="email_e" name="email_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getEmailContacto();
}?>" class="form-control" placeholder="Email">
                        </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="telefono_e">Teléfono <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="tel" id="telefono_e" name="telefono_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getTelefonoContacto();
}?>" class="form-control" maxlength="9" placeholder="(+34) 666 666 666">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="sector_e">Sector <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="text" id="sector_e" name="sector_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getSector();
}?>" class="form-control" placeholder="Sector">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="contacto_e">Persona contacto <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="text" id="contacto_e" name="contacto_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getPersonaContacto();
}?>" class="form-control" placeholder="Contacto">
                         </div>
                     </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group pull-right">
                        <input type="hidden" id="id_contacto_e" name="id_contacto_e" value="<?php if (!empty($_smarty_tpl->tpl_vars['proveedor']->value)) {
echo $_smarty_tpl->tpl_vars['proveedor']->value->getIdContacto();
}?>">
                        <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuEditar()">Editar proveedor</button> 
                        <button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
                    </div>
                        
                </div>
            </div>
           </form>
          </div>  
            <div class="col-lg-6">
                <h3>Registros</h3>
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
        </div>
    </div>
  </div>
  </div>
</div>
</div>
</section><?php }
}
