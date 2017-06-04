<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      {if $numMensajes==0}
          <i class="fa fa-envelope-o"></i>
      {else}
          <i class="fa fa-envelope-o"></i>
         <span class="label label-success">{$numMensajes}</span>
      {/if}
    </a>
    <ul class="dropdown-menu">
        <li class="header">Tu tienes {$numMensajes} mensajes</li>
            <li>
                <ul class="menu">
                  {foreach from=$mensajes item=$m}
                      <li>
                                <a href="gestion-mensajes.php?id={$m->getIdMensaje()}">   
                          <div class="pull-left">
                            <img src="../dist/img/icono_usuario.png" class="img-circle" alt="Imagen de Usuario">
                          </div>
                          <h4>
                            {$m->getNombreEmisor()}
                            <small><i class="fa fa-clock-o">{$m->getFecha()}</i></small>
                          </h4>
                          <p>{$m->getMensajeCorto()}</p>
                        </a>
                    </li>
                  {/foreach}
                </ul>
            </li>
        <li class="footer"><a href="gestion-mensajes.php">Ver todos Mensajes</a></li>
    </ul>
</li>