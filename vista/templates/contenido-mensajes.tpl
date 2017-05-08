<!-- Main content -->
    <section class="content">
        <div class="row">
        <!-- Mostramos mensaje de alerta -->
        <div class="col-md-12" id="msj">
            {if !empty($msj)}
                {if ($msj=='no')}
                 <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                    Los cambios se han realizado correctamente.
                  </div>
                 {else}
                 <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                    Algo ha salido mal.
                  </div>
                 {/if}
            {/if}
        </div>
        <!-- /.col -->
        <div class="col-md-12">
         <form method="POST" action="gestion-mensajes.php">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Entrada</h3>
              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" id="buscador" class="form-control input-sm" placeholder="Buscar mensaje">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div> 
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                  <input type="checkbox" id="marcar" value="" onclick="marcar_desmarcar()" class="btn btn-default btn-sm checkbox-toggle"><span id="all">Seleccionar todos</span>
              </div>
              <div class="mailbox-messages">
                <table id="tabmen" class="display table table-bordered table-hover">
                   <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Cuerpo mensaje</th>
                        <th>Fecha</th>
                    </tr>
                   </thead>
                   <tbody>
                       {foreach from=$mostrarMensajes item=$mi}
                            <tr>
                                <td class="mailbox-star"><input type="checkbox" name="checkmsj[]" value="{$mi->getIdMensaje()}"></td>
                                {if ($mi->getArchivar()==0)}
                                <td class="mailbox-name"><a href="javascript:void(0);" name='cargar' onclick="cargar('{$mi->getIdMensaje()}')" /><b>{$mi->getNombreEmisor()}</b></a></td>
                                <td class="mailbox-subject"><b>{$mi->getMensajeCorto()}</b></td>
                                {else}
                                    <td class="mailbox-name"><a  href="javascript:void(0);" name='cargar' onclick="cargar('{$mi->getIdMensaje()}')" />{$mi->getNombreEmisor()}</a></td>
                                    <td class="mailbox-subject">{$mi->getMensajeCorto()}</td>
                                {/if}
                                <td class="mailbox-date">{$mi->time_elapsed_string($mi->getFecha())}</td>
                            </tr>
                        {/foreach}
                  </tbody>
                </table>
              </div>
              <div class="mailbox-controls">
                <div class="btn-group paginacion">
                  <button type="submit" name="eliminarv" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-mensajes.php'"><i class="fa fa-refresh"></i></button>
             </div>
            </div>    
          </div>
          </form>
          <!-- /. box -->
        </div>
         <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enviar nuevo mensaje</h3>
            </div>
            <!-- /.box-header -->
            <form action="gestion-mensajes.php" method="POST">
                <div class="box-body">
                    <div class="form-group" id="destino">
                      <label>Para:</label>
                        <select class="form-control" name="user">
                            {foreach from=$usuarios item=$u}
                                <option value="{$u->getIdUsuario()}">{$u->getNombreCompleto()}</option>
                            {/foreach}
                        </select>
                    </div>
                  <div class="form-group">
                        <textarea class="form-control" name="cuerpo_mensaje" style="height: 150px"></textarea>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i>Reset</button>
                    <button type="submit" name="enviar" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                  </div>
                </div>
            </form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div> 
                  
        {if empty($mostrarMensajes)}
            <p>No hay mensajes disponibles</p>
        {else}
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Leer mensaje</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><div id="emisor">De: {if empty($mensaje)}
                            {$mostrarMensajes[0]->getNombreEmisor()}
                        {else}
                            {$mensaje[0]->getNombreEmisor()}
                        {/if}</div>
                <span class="mailbox-read-time pull-right">
                    <div id="fecha">{if empty($mensaje)}
                        {$mostrarMensajes[0]->getFecha()}
                        {else}
                            {$mensaje[0]->getFecha()}
                        {/if}</div></span></h3>
              </div>
              <div class="mailbox-read-message">
                  <p><div id="cuerpo">
                      {if empty($mensaje)}
                          {$mostrarMensajes[0]->getMensaje()}
                      {else}
                          {$mensaje[0]->getMensaje()}
                      {/if}</div></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <div class="pull-right">
                    {if empty($mensaje)}
                        <div id="responder"><button type="button" onclick="responder('{$mostrarMensajes[0]->getIdUsuarioM()}')" name="responder" class="btn btn-default"><i class="fa fa-reply"></i> Responder</button></div>
                        <div id="archivar"><button type="button" onclick="archivar('{$mostrarMensajes[0]->getIdMensaje()}')" name="archivar" class="btn btn-default"><i class="fa fa-share"></i> Marcar Leído</button></div>
                    </div>
                    <div id="eliminar"><button type="button" onclick="eliminar('{$mostrarMensajes[0]->getIdMensaje()}')" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button></div>
                    {else}
                        <div id="responder"><button type="button" onclick="responder('{$mensaje[0]->getIdUsuarioM()}')" name="responder" class="btn btn-default"><i class="fa fa-reply"></i> Responder</button></div>
                        <div id="archivar"><button type="button" onclick="archivar('{$mensaje[0]->getIdMensaje()}')" name="archivar" class="btn btn-default"><i class="fa fa-share"></i> Marcar Leído</button></div>
                    </div>
                    <div id="eliminar"><button type="button" onclick="eliminar('{$mensaje[0]->getIdMensaje()}')" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button></div>
                    {/if}
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        {/if}
      <!-- /.row -->
    </section>
