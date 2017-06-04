<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/icono_usuario.png" class="user-image" alt="Imagen de Usuario">
        <span class="hidden-xs">{$usuario} conectado</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="../dist/img/icono_usuario.png" class="img-circle" alt="Imagen de Usuario">
            <p>Usuario conectado
                <small></small>
            </p>
        </li>
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#">Registros</a>
                </div>
            </div>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                <!--<a href="#" class="btn btn-default btn-flat">Perfil</a>-->
            </div>
            <div class="pull-right">
                <form action='logoff.php' method='post'>
                    <input type='submit' class="btn btn-default btn-flat" name='desconectar' value='Desconectar {$usuario}'/>
                </form>  
            </div>
        </li>
    </ul>
</li>