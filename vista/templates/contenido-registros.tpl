<section class="content">
<div class="row">
  {include file="sidebar-inicio.tpl"}
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
                Error: Ya existe un registro registrado con el mismo Dni!
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
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              {if empty($registro)}
              <li class="active"><a href="#listado" data-toggle="tab">Listado registros</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {else}
              <li><a href="#listado" data-toggle="tab">Listado registros</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {/if}
            </ul>
            <div class="tab-content">
               {if empty($registro)}<div class="active tab-pane" id="listado">{else}<div class="tab-pane" id="listado">{/if}    
                <form method="POST" action="gestion-registros.php">
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar registros">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div>
                    <div class="box-body">
                      <div class="box-tools">
                        <table id="tabmen" cellspacing="0" width="100%" class="display table table-bordered table-hover responsive nowrap">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Registro</th>
                                <th>Asignado a</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                           </thead>
                           <tbody>
                               {foreach from=$mostrarRegistros item=$mi}
                                    <tr>
                                        <td>{if ($mi->getPrioridadReg()==='alta')}<i class="fa fa-circle-o text-red"></i>{elseif ($mi->getPrioridadReg()==='media')}<i class="fa fa-circle-o text-yellow"></i>{else}<i class="fa fa-circle-o text-aqua"></i>{/if}</td>
                                        <td><a href="gestion-registros.php?id={$mi->getIdReg()}" />{$mi->getIdContactoReg()}</a></td>
                                        <td>{$mi->getIdUsuarioReg()}</td>
                                        <td><a href="gestion-registros.php?id={$mi->getIdReg()}" /><b>{$mi->getFechaReg()}</b></a></td>
                                        <th>{if ($mi->getEstadoReg()==='Pendiente')}<span class="label label-danger">Pendiente</span>{elseif ($mi->getEstadoReg()==='Modificada')}<span class="label label-warning">Modificada</span>{else}<span class="label label-success">Finalizada</span>{/if}</th>
                                    </tr>
                                {/foreach}
                           </tbody>
                          </table>
                      </div>
                      <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-registros.php'"><i class="fa fa-refresh"></i></button>
                     </div>
                    </div> 
                  </form>
                </div>
              <div class="tab-pane" id="nuevo">
                 <div class="row">
                     <div class="col-lg-6">
                     <h3>Añadir registro</h3>
                   <form id="formreg" novalidate action="gestion-registros.php" method="post" enctype="multipart/form-data"> 
                     <div class="row">
                       <div class="col-lg-12">
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
                                    {foreach from=$usuarios item=$u}
                                        <option value="{$u->getIdUsuario()}">{$u->getNombreCompleto()}</option>
                                    {/foreach}
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
        {if empty ($registro)}<div class="tab-pane" id="detalle">{else} <div class="active tab-pane" id="detalle">{/if}
        <div class="row">
          <div class="col-lg-6">
              <h3>Detalle registros</h3>
          <form id="formeditar" novalidate action="gestion-registros.php" method="post" enctype="multipart/form-data">  
              <div class="row">
                   <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="fecha">Fecha</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input type="text" disabled value="{if !empty ($registro)}{$registro->getFechaNormalReg()}{/if}" class="form-control">
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                          <!-- Si el registro es de cliente o proveedor -->
                          <label class="control-label" for="contacto">Autor {if !empty ($registro)}<a href="{if ($cont->getTipoContacto()==="cliente")}gestion-clientes.php?id={else}gestion-proveedores.php?id={/if}{$registro->getIdContactoRegId()}"> Ver ficha</a>{/if}</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="text" value="{if !empty ($registro)}{$registro->getIdContactoReg()}{/if}" class="form-control" disabled />
                          </div>
                       </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="estado">Estado</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                              <select class="form-control" id="estado_e" name="estado_e">
                                   {if !empty ($registro)}
                                     {if ($registro->getEstadoReg()==='Pendiente')}<option value="0" selected>Pendiente</option>{else}<option value="0">Pendiente</option>{/if}
                                     {if ($registro->getEstadoReg()==='Modificada')}<option value="1" selected>Modificada</option>{else}<option value="1">Modificada</option>{/if}
                                     {if ($registro->getEstadoReg()==='Finalizada')}<option value="2" selected>Finalizada</option>{else}<option value="2">Finalizada</option>{/if}
                                   {/if}
                              </select>
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6 form-group required-field-block">
                       <label class="control-label" for="material">Material</label>
                      <div class="col-md-12 input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea rows="3" size="30" value="" name="material_e" id="material_e" class="form-control" placeholder="Material">{if !empty ($registro)}{$registro->getMaterialReg()}{/if}</textarea>
                      </div>
                  </div>
                  <div class="col-lg-6 form-group required-field-block">
                       <label class="control-label" for="observaciones">Observaciones</label>
                      <div class="col-md-12 input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea rows="3" size="30" name="observaciones_e" value="" id="observaciones_e" class="form-control" placeholder="Observaciones">{if !empty ($registro)}{$registro->getObservacionesReg()}{/if}</textarea>
                      </div>
                  </div>
                  <div class="col-lg-12 block-img-registro">
                        <div class="row" id="img-registro">
                          {if !empty ($registro->getImagenReg())}
                              {foreach $registro->getImagenRegArreglo() as $imagen}
                                  <div class="col-lg-4">Imagen registro: 
                                      <a href="{$imagen}" alt="{$registro->getIdContactoReg()}" target="_blank"><img class="img-responsive" src="{$imagen}" alt="imagen" /></a>
                                      <button type="button" name="borrar" class="btn btn-default btn-del" onclick="borrarImagen('{$imagen}','{$registro->getIdReg()}')">Borrar Imagen</button> 
                                  </div>
                              {/foreach}
                          {/if}
                         </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                          <label class="control-label" for="id_usuario_r_e">Asignado a</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <select class="form-control" name="id_usuario_r_e" id="id_usuario_r_e">
                                   {if !empty ($registro)}
                                     {foreach from=$usuarios item=$u}
                                         {if ($registro->getIdUsuarioReg()===$u->getNombreCompleto())}
                                             <option value="{$u->getIdUsuario()}" selected>{$u->getNombreCompleto()}</option>
                                         {else}
                                             <option value="{$u->getIdUsuario()}">{$u->getNombreCompleto()}</option>
                                         {/if}
                                     {/foreach}
                                   {/if}
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
                           <input type="file" id="imagen_e" name="imagen_e" value="{if !empty ($registro)}{$registro->getImagenReg()}{/if}" class="filestyle" data-size="sm">
                       </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="pull-right">
                         <input type="hidden" name="id_registro_e" value="{if !empty ($registro)}{$registro->getIdReg()}{/if}">
                         <button type="submit" name="editar" class="btn btn-default" onsubmit="validarFormuEditar()">Editar Registro</button> 
                         <button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>
                      </div>
                  </div>
               </form>
              </div>
              <div class="col-md-6">
              <h3>Comentarios</h3>
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-body">
                  <div class="direct-chat-messages">
                    {if !empty ($comentarios)}
                        {foreach from=$comentarios item=$com}
                            {if ($com->nomUsuarioComentario()!== $usuario)}    
                            <div class="direct-chat-msg">
                              <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">{$com->nomUsuarioComentario()}</span>
                                <span class="direct-chat-timestamp pull-right">{$com->getFechaComentario()}</span>
                              </div>
                              <div class="direct-chat-text">
                                {$com->getTextoComentario()}
                              </div>
                            </div>
                            {else}
                            <div class="direct-chat-msg right">
                              <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">{$com->nomUsuarioComentario()}</span>
                                <span class="direct-chat-timestamp pull-left">{$com->getFechaComentario()}</span>
                              </div>
                              <div class="direct-chat-text">
                                {$com->getTextoComentario()}
                              </div>
                            </div>
                            {/if}
                        {/foreach}
                    {/if}
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <form action="gestion-registros.php" method="post">
                    <div class="input-group">
                      <input type="text" name="comentario" placeholder="Escribir comentario" class="form-control">
                      <input type="hidden" name="id_registro_com" value="{if !empty ($registro)}{$registro->getIdReg()}{/if}">
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
                           
                           