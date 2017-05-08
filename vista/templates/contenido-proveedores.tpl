<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  {include file="sidebar-inicio.tpl"}
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <div class="col-md-12" id="msj">
        {if !empty($msj)}
            {if ($msj=='no')}
             <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                Los cambios se han realizado correctamente.
              </div>
             {elseif ($msj=='si')}
             <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Algo ha salido mal.
              </div>
              {elseif ($msj=='existe')}
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Error: Ya existe un proveedor registrado con el mismo CIF!
              </div>  
             {/if}
        {/if}
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
              {if empty($proveedor)}
              <li class="active"><a href="#listado" data-toggle="tab">Listado proveedores</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {else}
              <li><a href="#listado" data-toggle="tab">Listado proveedores</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {/if}
            </ul>
            <div class="tab-content">
               {if empty($proveedor)}<div class="active tab-pane" id="listado">{else}<div class="tab-pane" id="listado">{/if}    
                <form method="POST" action="gestion-proveedores.php">
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar proveedores">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                    <div class="box-body">
                      <div class="mailbox-messages">
                        <table id="tabmen" class="display table table-bordered table-hover">
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
                               {foreach from=$mostrarProveedores item=$mp}
                                    <tr>
                                        <td><a href="gestion-proveedores.php?id={$mp->getIdContacto()}" /><b>{$mp->getDniContacto()}</b></a></td>
                                        <td><a href="gestion-proveedores.php?id={$mp->getIdContacto()}" /><b>{$mp->getNombreContacto()}</b></a></td>
                                        <td>{$mp->getDireccionContacto()}</td>
                                        <td>{$mp->getCiudadContacto()}</td>
                                        <td>{$mp->getCodPostalContacto()}</td>
                                    </tr>
                                {/foreach}
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
                             <label class="control-label" for="contactoo">Persona contacto <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                 <input type="text" id="contacto" name="contacto" class="form-control">
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
                              
              {if empty ($proveedor)}<div class="tab-pane" id="detalle">{else}<div class="active tab-pane" id="detalle">{/if}
        {if empty($mostrarProveedores)}
        <p>No hay datos disponibles</p>
        {else}
          <div class="row">
            <div class="col-lg-6">
                <h3>Detalle proveedores</h3>
        {if empty($proveedor)}
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Cif</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getDniContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Razón social</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getNombreContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Dirección</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getDireccionContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Código postal</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getCodPostalContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getEmailContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getTelefonoContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Sector</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getSector()}</div>
                </li>
                <li class="list-group-item">
                    <b>Persona contacto</b>
                    <div class="pull-right">{$mostrarProveedores[0]->getPersonaContacto()}</div>
                </li>
            </ul>
        {else}
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Cif</b>
                    <div class="pull-right">{$proveedor->getDniContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Razón social</b>
                    <div class="pull-right">{$proveedor->getNombreContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Dirección</b>
                    <div class="pull-right">{$proveedor->getDireccionContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Código postal</b>
                    <div class="pull-right">{$proveedor->getCiudadContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <div class="pull-right">{$proveedor->getEmailContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right">{$proveedor->getTelefonoContacto()}</div>
                </li>
                <li class="list-group-item">
                    <b>Sector</b>
                    <div class="pull-right">{$proveedor->getSector()}</div>
                </li>
                <li class="list-group-item">
                    <b>Persona contacto</b>
                    <div class="pull-right">{$proveedor->getPersonaContacto()}</div>
                </li>
            </ul>
        {/if}
            <div class="pull-right">
                {if empty($proveedor)}
                    <button type="button" onclick="editar('{$mostrarProveedores[0]->getIdContacto()}')" name="editar" class="btn btn-default"><i class="fa fa-reply"></i> Editar</button>
                {else}
                     <button type="button" onclick="editar('{$proveedor->getIdContacto()}')" name="editar" class="btn btn-default"><i class="fa fa-reply"></i> Editar</button>
                {/if}
                <form class="pull-right" action="gestion-proveedores.php" method="post"> 
                    {if empty($proveedor)}
                        <input type="hidden" name="id_contacto" value="{$mostrarProveedores[0]->getIdContacto()}">
                    {else}
                        <input type="hidden" name="id_contacto" value="{$proveedor->getIdContacto()}">
                    {/if}
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
            <h3>Editar proveedores</h3>
            <form id="formn" novalidate action="gestion-proveedores.php" method="post"> 
            <div class="row">
                <input type="hidden" class="form-control" id="id_contacto_e" name="id_contacto">
                <div class="col-lg-6">
                   <div class="form-group">
                       <label class="control-label" for="dni">Cif <span class="asterisco">*</span></label>
                          <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                             <input type="text" class="form-control" id="dni_e" name="dni" maxlength="9" placeholder="10000000X">
                          </div>
                      </div>
                 </div>
                 <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                      <label class="control-label" for="nombre">Razón social <span class="asterisco">*</span></label>
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
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="sector">Sector <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="text" id="sector_e" name="sector" class="form-control">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="contacto">Persona contacto <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="text" id="contacto_e" name="contacto" class="form-control">
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
       {/if}
    </div>
  </div>
  </div>
</div>
</div>
</section>