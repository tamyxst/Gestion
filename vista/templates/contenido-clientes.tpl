<section class="content">
<div class="row">
    <div class="col-lg-12">
        <h3>
        Gestión ALGO
        <small>Gestión Clientes</small>
    </h3>
    </div>
</div>
<div class="row">
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
              {else}
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Error: Ya existe un cliente registrado con el mismo Dni!
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
              {if empty($cliente)}
              <li id="p_listado" class="active"><a href="#listado" data-toggle="tab">Listado clientes</a></li>
              <li id="p_nuevo"><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li id="p_detalle"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {else}
              <li id="p_listado"><a href="#listado" data-toggle="tab">Listado clientes</a></li>
              <li id="p_nuevo"><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li id="p_detalle" class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {/if}
            </ul>
            <div class="tab-content">
               {if empty($cliente)}<div class="active tab-pane" id="listado">{else}<div class="tab-pane" id="listado">{/if}    
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
                               {foreach from=$mostrarClientes item=$mc}
                                    <tr>
                                        <td><a href="gestion-clientes.php?id={$mc->getIdContacto()}" /><b>{$mc->getDniContacto()}</b></a></td>
                                        <td><a href="gestion-clientes.php?id={$mc->getIdContacto()}" /><b>{$mc->getNombreContacto()}</b></a></td>
                                        <td>{$mc->getDireccionContacto()}</td>
                                        <td>{$mc->getCiudadContacto()}</td>
                                        <td>{$mc->getCodPostalContacto()}</td>
                                        <td><span class="badge bg-light-blue">{$mc->getNumReg()}</span></td>
                                    </tr>
                                {/foreach}
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
                          <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección completa" minlength="3">
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
                              
              {if empty ($cliente)}<div class="tab-pane" id="detalle">{else}<div class="active tab-pane" id="detalle">{/if}
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
                             <input type="text" class="form-control" id="dni_e" value="{if !empty ($cliente)}{$cliente->getDniContacto()}{/if}" name="dni_e" maxlength="9" placeholder="10000000X">
                          </div>
                      </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label" for="nombre_e">Apellidos, Nombre <span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="nombre_e" name="nombre_e" value="{if !empty ($cliente)}{$cliente->getNombreContacto()}{/if}" class="form-control" placeholder="Nombre Apellidos" minlength="3">
                    </div>
                    </div>
                 </div>
                 <div class="col-lg-12">
                   <div class="form-group">
                      <label class="control-label" for="direccion_e">Dirección<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="direccion_e" name="direccion_e" id="direccion_e" value="{if !empty ($cliente)}{$cliente->getDireccionContacto()}{/if}" class="form-control" placeholder="Dirección completa" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                   <div class="form-group">
                      <label class="control-label" for="ciudad_e">Ciudad<span class="asterisco">*</span></label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="ciudad_e" name="ciudad_e" value="{if !empty ($cliente)}{$cliente->getCiudadContacto()}{/if}" class="form-control" placeholder="Ciudad" minlength="3">
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="cod_postal_e">Código postal <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                             <input type="text" id="cod_postal_e" name="cod_postal_e" value="{if !empty ($cliente)}{$cliente->getCodPostalContacto()}{/if}" class="form-control" placeholder="50000" maxlength="5">
                         </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label" for="email_e">Email <span class="asterisco">*</span></label>
                        <div class="input-group">	 
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                            <input type="email" id="email_e" name="email_e" value="{if !empty ($cliente)}{$cliente->getEmailContacto()}{/if}" class="form-control" placeholder="Email">
                        </div>
                     </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                     <div class="form-group">
                         <label class="control-label" for="telefono_e">Teléfono <span class="asterisco">*</span></label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                             <input type="tel" id="telefono_e" name="telefono_e" value="{if !empty ($cliente)}{$cliente->getTelefonoContacto()}{/if}" class="form-control" maxlength="9" placeholder="(+34) 666 666 666">
                         </div>
                     </div>
                </div>
                <div class="col-lg-12">
                    <div class="pull-right">
                        <input type="hidden" name="id_contacto_e" value="{if !empty ($cliente)}{$cliente->getIdContacto()}{/if}">
                        <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuEditar()">Editar Cliente</button>
                        <button type="button" name="eliminar" class="btn btn-danger remCli">Eliminar</button>
                    </div>  
                </div>
               </div>
              </form>
            </div>
           <div class="col-lg-6">
                <h3>Registros</h3>
            <div class="row">
                    <div class="col-lg-12">
                        {if !empty($registros)}
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
                                    <th>Tipo</th>
                                    <th></th>
                                    <th>Autor</th>
                                    <th>Fecha</th>
                                    <th>Asignado a</th>
                                    <th>Estado</th>
                                </tr>
                               </thead>
                               <tbody>
                                   {foreach from=$registros item=$mi}
                                        <tr>
                                            <td>{if ($mi->getTipoReg()==='incidencia')}Incidencia{elseif ($mi->getTipoReg()==='pedido')}Pedido{else}Otro registro{/if}</td>
                                            <td><a href="{if ($mi->getTipoReg()==='incidencia')}gestion-incidencias.php?id={elseif ($mi->getTipoReg()==='pedido')}gestion-pedidos.php?id={else}gestion-registros.php?id={/if}{$mi->getIdReg()}">Ver más</a></td>
                                            <td>{$mi->getIdContactoReg()}</td>
                                            <td><b>{$mi->getFechaReg()}</b></td>
                                            <td>{$mi->getIdUsuarioReg()}</td>
                                            <th>{if ($mi->getEstadoReg()==='Pendiente')}<span class="label label-danger">Pendiente</span>{elseif ($mi->getEstadoReg()==='Modificada')}<span class="label label-warning">Modificada</span>{else}<span class="label label-success">Finalizada</span>{/if}</th>
                                        </tr>
                                    {/foreach}
                              </tbody>
                            </table>
                          </div>
                          <div class="mailbox-controls">
                            <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-clientes.php'"><i class="fa fa-refresh"></i></button>
                         </div>
                        </div> 
                      </form>
                      {/if}
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