<?php
/* Smarty version 3.1.30, created on 2017-06-04 17:09:18
  from "/var/www/html/gestion/vista/templates/contenido-mensajes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934229e273e42_09888975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2e401d356d207a42870ae09eaa1acbb50aa2009' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/contenido-mensajes.tpl',
      1 => 1496588438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934229e273e42_09888975 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content">
    <div class="row">
    <!-- Mostramos mensaje de alerta -->
    <div class="col-md-12" id="msj">
        <?php if (!empty($_smarty_tpl->tpl_vars['msj']->value)) {?>
            <?php if (($_smarty_tpl->tpl_vars['msj']->value == 'no')) {?>
             <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                Los cambios se han realizado correctamente.
              </div>
             <?php } else { ?>
             <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                Algo ha salido mal.
              </div>
             <?php }?>
        <?php }?>
    </div>
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
            </div> 
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
                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostrarMensajes']->value, 'mi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->value) {
?>
                            <tr>
                                <td class="mailbox-star"><input type="checkbox" name="checkmsj[]" value="<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdMensaje();?>
"></td>
                                <?php if (($_smarty_tpl->tpl_vars['mi']->value->getArchivar() == 0)) {?>
                                <td class="mailbox-name"><a href="javascript:void(0);" name='cargar' onclick="cargar('<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdMensaje();?>
')" /><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getNombreEmisor();?>
</b></a></td>
                                <td class="mailbox-subject"><b><?php echo $_smarty_tpl->tpl_vars['mi']->value->getMensajeCorto();?>
</b></td>
                                <?php } else { ?>
                                    <td class="mailbox-name"><a  href="javascript:void(0);" name='cargar' onclick="cargar('<?php echo $_smarty_tpl->tpl_vars['mi']->value->getIdMensaje();?>
')" /><?php echo $_smarty_tpl->tpl_vars['mi']->value->getNombreEmisor();?>
</a></td>
                                    <td class="mailbox-subject"><?php echo $_smarty_tpl->tpl_vars['mi']->value->getMensajeCorto();?>
</td>
                                <?php }?>
                                <td class="mailbox-date"><?php echo $_smarty_tpl->tpl_vars['mi']->value->getFecha();?>
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
                <div class="btn-group paginacion">
                  <button type="submit" name="eliminarv" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='gestion-mensajes.php'"><i class="fa fa-refresh"></i></button>
             </div>
            </div>    
          </div>
          </form>
        </div>
         <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enviar nuevo mensaje</h3>
            </div>
            <form action="gestion-mensajes.php" method="POST">
                <div class="box-body">
                    <div class="form-group" id="destino">
                      <label>Para:</label>
                        <select class="form-control" name="user">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
                                <option value='<?php echo $_smarty_tpl->tpl_vars['u']->value->getIdUsuario();?>
'><?php echo $_smarty_tpl->tpl_vars['u']->value->getNombreCompleto();?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                  <div class="form-group">
                        <textarea class="form-control" name="cuerpo_mensaje" style="height: 150px"></textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i>Reset</button>
                    <button type="submit" name="enviar" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
        <?php if (empty($_smarty_tpl->tpl_vars['mostrarMensajes']->value)) {?>
            <p>No hay mensajes disponibles</p>
        <?php } else { ?>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Leer mensaje</h3>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><div id="emisor">De: <?php if (empty($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['mostrarMensajes']->value[0]->getNombreEmisor();?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['mensaje']->value[0]->getNombreEmisor();?>

                        <?php }?></div>
                <span class="mailbox-read-time pull-right">
                    <div id="fecha"><?php if (empty($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
                        <?php echo $_smarty_tpl->tpl_vars['mostrarMensajes']->value[0]->getFecha();?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['mensaje']->value[0]->getFecha();?>

                        <?php }?></div></span></h3>
              </div>
              <div class="mailbox-read-message">
                  <p><div id="cuerpo">
                      <?php if (empty($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
                          <?php echo $_smarty_tpl->tpl_vars['mostrarMensajes']->value[0]->getMensaje();?>

                      <?php } else { ?>
                          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value[0]->getMensaje();?>

                      <?php }?></div></p>
              </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <?php if (empty($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
                        <div id="responder"><button type="button" onclick="responder('<?php echo $_smarty_tpl->tpl_vars['mostrarMensajes']->value[0]->getIdUsuarioM();?>
')" name="responder" class="btn btn-default"><i class="fa fa-reply"></i> Responder</button></div>
                        <div id="archivar"><button type="button" onclick="archivar('<?php echo $_smarty_tpl->tpl_vars['mostrarMensajes']->value[0]->getIdMensaje();?>
')" name="archivar" class="btn btn-default"><i class="fa fa-share"></i> Marcar Leído</button></div>
                    </div>
                    <div id="eliminar"><button type="button" onclick="eliminar('<?php echo $_smarty_tpl->tpl_vars['mostrarMensajes']->value[0]->getIdMensaje();?>
')" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button></div>
                    <?php } else { ?>
                        <div id="responder"><button type="button" onclick="responder('<?php echo $_smarty_tpl->tpl_vars['mensaje']->value[0]->getIdUsuarioM();?>
')" name="responder" class="btn btn-default"><i class="fa fa-reply"></i> Responder</button></div>
                        <div id="archivar"><button type="button" onclick="archivar('<?php echo $_smarty_tpl->tpl_vars['mensaje']->value[0]->getIdMensaje();?>
')" name="archivar" class="btn btn-default"><i class="fa fa-share"></i> Marcar Leído</button></div>
                    </div>
                    <div id="eliminar"><button type="button" onclick="eliminar('<?php echo $_smarty_tpl->tpl_vars['mensaje']->value[0]->getIdMensaje();?>
')" name="eliminar" class="btn btn-default"><i class="fa fa-trash-o"></i> Eliminar</button></div>
                    <?php }?>
            </div>
          </div>
        </div>
        <?php }?>
    </section>
<?php }
}
