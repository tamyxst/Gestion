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
              {else}
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Error: Ya existe un incidencia registrado con el mismo Dni!
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
              {if empty($incidencia)}
              <li class="active"><a href="#listado" data-toggle="tab">Listado incidencias</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {else}
              <li><a href="#listado" data-toggle="tab">Listado incidencias</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {/if}
            </ul>
            <div class="tab-content">
               {if empty($incidencia)}<div class="active tab-pane" id="listado">{else}<div class="tab-pane" id="listado">{/if}    
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
                                <th>Prioridad</th>
                                <th>Fecha</th>
                                <th>Autor</th>
                                <th>Asignado</th>
                                <th>Estado</th>
                            </tr>
                           </thead>
                           <tbody>
                               {foreach from=$mostrarIncidencias item=$mi}
                                    <tr>
                                        <td><a href="gestion-incidencias.php?id={$mi->getIdReg()}" /><b>{$mi->getPrioridadReg()}</b></a></td>
                                        <td><a href="gestion-incidencias.php?id={$mi->getIdReg()}" /><b>{$mi->getfechaReg()}</b></a></td>
                                        <td>{$mc->getTipoReg()}</td>
                                        <td>{$mc->getUsuarioReg()}</td>
                                        <td>{$mc->getEstadoReg()}</td>
                                    </tr>
                                {/foreach}
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
                <form id="formn" novalidate action="gestion-incidencias.php" method="post">         
                
                <div class="row">
                   <div class="col-lg-6">
                       <div class="form-group">
                           <label class="control-label" for="dni">Estado <span class="asterisco">*</span></label>
                              <div class="input-group">	 
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                 <select name="estado">
                                     <option value="0">Pendiente</option>
                                     <option value="1">Modificada</option>
                                     <option value="2">Finalizada</option>
                                 </select>
                              </div>
                          </div>
                     </div>
                     <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="material">Material<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" id="material" name="material" class="form-control" placeholder="Material empleado" minlength="3">
                        </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                       <div class="form-group">
                          <label class="control-label" for="observaciones">Observaciones<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" id="observaciones" name="observaciones" id="observaciones" class="form-control" placeholder="Observaciones" minlength="3">
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                         <label class="control-label" for="imagen">Adjuntar imagen</label>
                         <div id="imagen"></div>
                         <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                             <input type="file" class="filestyle" data-size="sm">
                         </div>
			</div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                         <div class="form-group">
                             <label class="control-label" for="contacto">Contacto <span class="asterisco">*</span></label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                 <input type="text" id="contacto" name="contacto" class="form-control">
                             </div>
                         </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="id_usuario_r">Asignado a <span class="asterisco">*</span></label>
                            <div class="input-group">	 
                                <select class="form-control" name="id_usuario_r">
                                    {foreach from=$usuarios item=$u}
                                        <option value="{$u->getIdUsuario()}">{$u->getNombreCompleto()}</option>
                                    {/foreach}
                                </select>
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
                              
              {if empty ($incidencia)}<div class="tab-pane" id="detalle">{else}<div class="active tab-pane" id="detalle">{/if}
        {if empty($mostrarIncidencias)}
        <p>No hay mensajes disponibles</p>
        {else}
          <div class="row">
            <div class="col-lg-6">
                <h3>Detalle incidencias</h3>
        {if empty($incidencia)}
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Prioridad</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getPrioridadReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Apellidos, Nombre</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getFechaReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Dirección</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getEstadoReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Código postal</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getMaterialReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getObservacionesReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getIdContactoReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right">{$mostrarIncidencias[0]->getIdUsuarioReg()}</div>
                </li>
            </ul>
        {else}
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Dni</b>
                    <div class="pull-right">{$incidencia->getPrioridadReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Apellidos, Nombre</b>
                    <div class="pull-right">{$incidencia->getFechaReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Dirección</b>
                    <div class="pull-right">{$incidencia->getEstadoReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Código postal</b>
                    <div class="pull-right">{$incidencia->getMaterialReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <div class="pull-right">{$incidencia->getObservacionesReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right">{$incidencia->getIdContactoReg()}</div>
                </li>
                <li class="list-group-item">
                    <b>Telefono</b>
                    <div class="pull-right">{$incidencia->getIdUsuarioReg()}</div>
                </li>
            </ul>
        {/if}
            <div class="pull-right">
                {if empty($incidencia)}
                    <button type="button" onclick="editar('{$mostrarIncidencias[0]->getIdReg()}')" name="editar" class="btn btn-default"><i class="fa fa-reply"></i> Editar</button>
                {else}
                     <button type="button" onclick="editar('{$incidencia->getIdReg()}')" name="editar" class="btn btn-default"><i class="fa fa-reply"></i> Editar</button>
                {/if}
                <form class="pull-right" action="gestion-incidencias.php" method="post"> 
                    {if empty($incidencia)}
                        <input type="hidden" name="id_contacto" value="{$mostrarIncidencias[0]->getIdReg()}">
                    {else}
                        <input type="hidden" name="id_contacto" value="{$incidencia->getIdReg()}">
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
            <h3>Editar incidencias</h3>
            <form id="formn" novalidate action="gestion-incidencias.php" method="post"> 
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
       {/if}
    </div>
  </div>
  </div>
</div>
</div>
</section>