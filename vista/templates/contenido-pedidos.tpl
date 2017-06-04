<section class="content">
<div class="row">
    <div class="col-lg-12">
        <h3>
        Gestión ALGO
        <small>Gestión Pedidos</small>
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
                Error: Ya existe un pedido registrado con el mismo Dni!
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
              {if empty($pedido)}
              <li class="active"><a href="#listado" data-toggle="tab">Listado pedidos</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {else}
              <li><a href="#listado" data-toggle="tab">Listado pedidos</a></li>
              <li><a href="#nuevo" id="titulo" data-toggle="tab">Añadir nuevo</a></li>
              <li class="active"><a href="#detalle" data-toggle="tab">Detalle</a></li>
              {/if}
            </ul>
            <div class="tab-content">
               {if empty($pedido)}<div class="active tab-pane" id="listado">{else}<div class="tab-pane" id="listado">{/if}    
                <form id="formped" method="POST" action="gestion-pedidos.php">
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
                               {foreach from=$mostrarPedidos item=$mi}
                                    <tr>
                                        <td><a href="gestion-pedidos.php?id={$mi->getIdReg()}" />{$mi->getIdContactoReg()}</a></td>
                                        <td>{$mi->getFechaEntregaReg()}</a></td>
                                        <td>{$mi->getMaterialReg()}</td>
                                        <td><a href="gestion-pedidos.php?id={$mi->getIdReg()}" /><b>{$mi->getFechaReg()}</b></a></td>
                                        <th>{if ($mi->getEstadoReg()==='Pendiente')}<span class="label label-danger">Pendiente</span>{elseif ($mi->getEstadoReg()==='Modificada')}<span class="label label-warning">Modificada</span>{else}<span class="label label-success">Finalizada</span>{/if}</th>
                                    </tr>
                                {/foreach}
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
                                    <input type="text" id="fecha_entrega" name="fecha_entrega" size="16" class="form-control" placeholder="01/01/2017" />
                                </div>
                          </div>
                     </div>
                         
                     <div class="col-lg-6 form-group required-field-block">
                         <label class="control-label" for="material">Material</label>
                        <div class="col-md-12 input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="5" size="100" value="" name="material" id="material" class="form-control" placeholder="Material"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group required-field-block">
                         <label class="control-label" for="observaciones">Observaciones</label>
                        <div class="col-md-12 input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="5" size="100" name="observaciones" value="" id="observaciones" class="form-control" placeholder="Observaciones"></textarea>
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
        {if empty ($pedido)}<div class="tab-pane" id="detalle">{else} <div class="active tab-pane" id="detalle">{/if}
        <div class="row">
          <div class="col-lg-6">
              <h3>Detalle pedidos</h3>
          <form id="formeditreg" action="gestion-pedidos.php" method="post" enctype="multipart/form-data">  
              <div class="row">
                   <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="fecha">Fecha</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input type="text" disabled value="{if !empty ($pedido)}{$pedido->getFechaNormalReg()}{/if}" class="form-control">
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                          <!-- Si el registro es de cliente o proveedor -->
                          <label class="control-label" for="contacto">Autor {if !empty ($pedido)}<a href="{if ($cont->getTipoContacto()==="cliente")}gestion-clientes.php?id={else}gestion-proveedores.php?id={/if}{$pedido->getIdContactoRegId()}"> Ver ficha</a>{/if}</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="text" value="{if !empty ($pedido)}{$pedido->getIdContactoReg()}{/if}" class="form-control" disabled />
                          </div>
                       </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="estado">Estado</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                              <select class="form-control" id="estado_e" name="estado_e">
                                   {if !empty ($pedido)}
                                     {if ($pedido->getEstadoReg()==='Pendiente')}<option value="0" selected>Pendiente</option>{else}<option value="0">Pendiente</option>{/if}
                                     {if ($pedido->getEstadoReg()==='Modificada')}<option value="1" selected>Modificada</option>{else}<option value="1">Modificada</option>{/if}
                                     {if ($pedido->getEstadoReg()==='Finalizada')}<option value="2" selected>Finalizada</option>{else}<option value="2">Finalizada</option>{/if}
                                   {/if}
                              </select>
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                          <label class="control-label" for="fecha_entrega_e">Fecha entrega</label>
                          <div class="input-group date input-append datepicker" id="filter-date">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              <input type="text" id="fecha_entrega_e" name="fecha_entrega_e" value="{if !empty ($pedido)}{$pedido->getFechaEntregaReg()}{/if}" class="form-control">
                          </div>
                       </div>
                   </div>
                   <div class="col-lg-6 form-group required-field-block">
                       <label class="control-label" for="material">Material</label>
                      <div class="col-md-12 input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea rows="5" size="100" value="" name="material_e" id="material_e" class="form-control" placeholder="Material">{if !empty ($pedido)}{$pedido->getMaterialReg()}{/if}</textarea>
                      </div>
                  </div>
                  <div class="col-lg-6 form-group required-field-block">
                       <label class="control-label" for="observaciones">Observaciones</label>
                      <div class="col-md-12 input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea rows="5" size="100" name="observaciones_e" value="" id="observaciones_e" class="form-control" placeholder="Observaciones">{if !empty ($pedido)}{$pedido->getObservacionesReg()}{/if}</textarea>
                      </div>
                  </div>
                  <div class="col-lg-12 block-img-registro">
                        <div class="row" id="img-registro">
                          {if !empty ($pedido->getImagenReg())}
                              {foreach $pedido->getImagenRegArreglo() as $imagen}
                                  <div class="col-lg-4">Imagen pedido: 
                                      <a href="{$imagen}" alt="{$pedido->getIdContactoReg()}" target="_blank"><img class="img-responsive" src="{$imagen}" alt="imagen" /></a>
                                      <button type="button" name="borrar" class="btn btn-default btn-del" onclick="borrarImagen('{$imagen}','{$pedido->getIdReg()}')">Borrar Imagen</button> 
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
                                   {if !empty ($pedido)}
                                     {foreach from=$usuarios item=$u}
                                         {if ($pedido->getIdUsuarioReg()===$u->getNombreCompleto())}
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
                           <input type="file" id="imagen_e" name="imagen_e" value="{if !empty ($pedido)}{$pedido->getImagenReg()}{/if}" class="filestyle" data-size="sm">
                       </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="pull-right">
                         <input type="hidden" name="id_registro_e" value="{if !empty ($pedido)}{$pedido->getIdReg()}{/if}">
                         <button type="submit" name="editar" class="btn btn-default">Editar Pedido</button> 
                         <!--<button type="submit" name="eliminar" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button>-->
                         <button type="button" name="eliminar" class="btn btn-danger remReg">Eliminar</button>
                      </div>
                  </div>
               </form>
              </div>
              <div class="col-md-6">
              <h3>Comentarios</h3>
              <div class="box box-warning direct-chat direct-chat-warning">
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
                  <form action="gestion-pedidos.php" method="post">
                    <div class="input-group">
                      <input type="text" name="comentario" placeholder="Escribir comentario" class="form-control">
                      <input type="hidden" name="id_registro_com" value="{if !empty ($pedido)}{$pedido->getIdReg()}{/if}">
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
                           
                           