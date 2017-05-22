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
                                <th></th>
                                <th>Prioridad</th>
                                <th>Fecha</th>
                                <th>Autor</th>
                                <th>Asignado a</th>
                                <th>Estado</th>
                            </tr>
                           </thead>
                           <tbody>
                               {foreach from=$mostrarIncidencias item=$mi}
                                    <tr>
                                        <td>{if ($mi->getPrioridadReg()==='alta')}<i class="fa fa-circle-o text-red"></i>{elseif ($mi->getPrioridadReg()==='media')}<i class="fa fa-circle-o text-yellow"></i>{else}<i class="fa fa-circle-o text-aqua"></i>{/if}</td>
                                        <td>{$mi->getPrioridadReg()}</a></td>
                                        <td><a href="gestion-incidencias.php?id={$mi->getIdReg()}" /><b>{$mi->getFechaReg()}</b></a></td>
                                        <td><a href="gestion-incidencias.php?id={$mi->getIdReg()}" />{$mi->getIdContactoReg()}</a></td>
                                        <td>{$mi->getIdUsuarioReg()}</td>
                                        <td>{$mi->getEstadoReg()}</td>
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
                            <button type="submit" name="enviar" class="btn btn-default" onsubmit="validarFormuContacto()">Enviar</button> 
                        </div>  
                    </div>
                  </div>
                </form>
              </div>
             </div>
           </div>
        {if empty ($incidencia)}<div class="tab-pane" id="detalle">{else} <div class="active tab-pane" id="detalle">{/if}
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
                                <input type="text" disabled value="{if !empty ($incidencia)}{$incidencia->getFechaNormalReg()}{/if}" class="form-control">
                            </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="contacto">Autor</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" value="{if !empty ($incidencia)}{$incidencia->getIdContactoReg()}{/if}" class="form-control" disabled />
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="id_usuario_r_e">Asignado</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="id_usuario_r_e" id="id_usuario_r_e" value="{if !empty ($incidencia)}{$incidencia->getIdUsuarioReg()}{/if}" class="form-control" />
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                            <label class="control-label" for="estado">Estado<span class="asterisco">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                <select class="form-control" id="estado_e" name="estado_e">
                                     {if !empty ($incidencia)}
                                       {if ($incidencia->getEstadoReg()==='Pendiente')}<option value="0" selected>Pendiente</option>{else}<option value="0">Pendiente</option>{/if}
                                       {if ($incidencia->getEstadoReg()==='Modificada')}<option value="1" selected>Modificada</option>{else}<option value="1">Modificada</option>{/if}
                                       {if ($incidencia->getEstadoReg()==='Finalizada')}<option value="2" selected>Finalizada</option>{else}<option value="2">Finalizada</option>{/if}
                                     {/if}
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
                                     {if !empty ($incidencia)}
                                       {if ($incidencia->getPrioridadReg()==='alta')}<option value="alta" selected>Alta</option>{else}<option value="alta">Alta</option>{/if}
                                       {if ($incidencia->getPrioridadReg()==='media')}<option value="media" selected>Media</option>{else}<option value="media">Media</option>{/if}
                                       {if ($incidencia->getPrioridadReg()==='baja')}<option value="baja" selected>Baja</option>{else}<option value="baja">Baja</option>{/if}
                                     {/if}
                                </select>
                            </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="material">Material<span class="asterisco">*</span></label>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                          <input type="text" id="material_e" name="material_e" value="{if !empty ($incidencia)}{$incidencia->getMaterialReg()}{/if}" class="form-control" placeholder="Material empleado" minlength="3">
                        </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                          <label class="control-label" for="observaciones">Observaciones<span class="asterisco">*</span></label>
                          <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                          <input type="text" id="observaciones_e" name="observaciones_e" value="{if !empty ($incidencia)}{$incidencia->getObservacionesReg()}{/if}" class="form-control" placeholder="Observaciones" minlength="3">
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12 block-img-registro">
                          <div class="row" id="img-registro">
                            {if !empty ($incidencia->getImagenRegArreglo())}
                                {foreach $incidencia->getImagenRegArreglo() as $imagen}
                                    <div class="col-lg-4">Imagen incidencia: 
                                        <a href="{$imagen}" alt="{$incidencia->getIdContactoReg()}" target="_blank"><img class="img-responsive" src="{$imagen}" alt="imagen" /></a>
                                        <button type="button" name="borrar" class="btn btn-default btn-del" onclick="borrarImagen('{$imagen}','{$incidencia->getIdReg()}')">Borrar Imagen</button> 
                                    </div>
                                    
                                {/foreach}
                            {/if}
                           </div>
                         </div>
                     </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                         <label class="control-label" for="imagen">Adjuntar imagen</label>
                         <div id="imagen"></div>
                         <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>		
                             <input type="file" id="imagen_e" name="imagen_e" value="{if !empty ($incidencia)}{$incidencia->getImagenReg()}{/if}" class="filestyle" data-size="sm">
                         </div>
			</div>
                    </div>
                    {if ($usuario==='admin')}      
                    <div class="col-lg-6">
                        <div class="form-group">
                         <label class="control-label" for="archivar_e">Archivar incidencia</label>
                         <div id="archivar_e"></div>
                         <div class="input-group">	 
                             <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>		
                             <input type="text" id="arcihvar_e" name="archivar_e" value="{if !empty ($incidencia)}{$incidencia->getArchivarReg()}{/if}" class="form-control">
                         </div>
			</div>
                    </div>
                    {else}
                        <input type="hidden" id="arcihvar_e" name="archivar_e" value="{if !empty ($incidencia)}{$incidencia->getArchivarReg()}{/if}" class="form-control">
                    {/if}
                    <div class="col-lg-12">
                        <div class="pull-right">
                           <input type="hidden" name="id_registro_e" value="{if !empty ($incidencia)}{$incidencia->getIdReg()}{/if}">
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
         {foreach from=$mostrarIncidencias item=$mi}
           <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
           <input type="checkbox" value="">
           <span class="text"><a href="gestion-incidencias.php?id={$mi->getIdReg()}" /><b>{$mi->getPrioridadReg()}</b></a></span>
           <span class="text">{$mi->getIdContactoReg()}</span>
           <small class="label label-danger"><i class="fa fa-clock-o"></i><a href="gestion-incidencias.php?id={$mi->getIdReg()}" /><b>{$mi->getFechaReg()}</b></a></small>
           <span class="text">{$mi->getIdUsuarioReg()}</span>
           <span class="text">{$mi->getIdUsuarioReg()}</span>
           <div class="tools">
             <i class="fa fa-edit"></i>
             <i class="fa fa-trash-o"></i>
           </div>
         </li>
         {/foreach}
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
                           
                           