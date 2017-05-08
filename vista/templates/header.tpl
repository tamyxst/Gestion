  <header class="main-header">
    <a href="inicio.php" class="logo">
      <span class="logo-mini"><b>ALGO</b></span>
      <span class="logo-lg"><b>Admin</b>ALGO</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Mensajes-->
          {include file="mensajes.tpl"}
          <!-- Cuenta Usuario -->
          {include file="cuenta-usuario.tpl"}
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{$usuario}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
      <!-- Menú lateral-->
        {include file="buscador.tpl"}
        {include file="menu-lateral.tpl"}
    </section>
  </aside>