<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ALGO Gestor - Gestión proveedores</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Tamara Gascon">
<link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../dist/css/estilo.css">
<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="../plugins/dataTables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../plugins/dataTables/responsive.dataTables.min.css">
          function editar(id_contacto){
              xajax_editar(id_contacto);
          }
          function cargarDetalle(id_contacto){
              xajax_cargarDetalle(id_contacto);
          }
 </script>
<script src="../plugins/jQuery/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resuelve conflicto de jQuery UI con Bootstrap -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
{$codigoJS}
<script src="../dist/bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/atle/js/app.js"></script>
<!--<script src="../plugins/atle/js/pages/dashboard.js"></script>-->
<script src="../plugins/atle/js/demo.js"></script>
<script src="../plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="../plugins/dataTables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/dataTables/dataTables.responsive.min.js"></script>
<script src="../plugins/dataTables/responsive.bootstrap.min.js"></script>
<script src="../plugins/jQueryvalidate/jquery.validate.js"></script>
<script src="../dist/js/gestion.js"></script>
<script src="../dist/js/bootstrap-filestyle.js"></script>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
  {include file='header.tpl'}
  <div class="content-wrapper">
    <!-- Contenido header -->
    <section class="content-header">
      <h1>
        Gestión ALGO
        <small>Panel de administración</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Gestión</li>
      </ol>
    </section>
    <!-- Contenido Inicio -->
        {include file="contenido-proveedores.tpl"}
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://www.algodecoracion.com">Algo Decoración, S.A.</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
