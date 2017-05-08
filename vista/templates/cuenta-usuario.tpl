<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs">{$usuario} conectado</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            <p>Usuario conectado
                <small></small>
            </p>
        </li>

        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#">Registros</a>
                </div>
            </div>
        <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <form action='logoff.php' method='post'>
                    <input type='submit' class="btn btn-default btn-flat" name='desconectar' value='Desconectar usuario {$usuario}'/>
                </form>  
            </div>
        </li>
    </ul>
</li>