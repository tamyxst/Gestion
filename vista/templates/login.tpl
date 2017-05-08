<!DOCTYPE html>
{*Plantilla para login. Es invocada desde login.php. solo visualiza el $error del php*}
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ALGO Gestion v2 | Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href=".././dist/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href=".././dist/css/estilo.css">
  <link rel="stylesheet" href=".././plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-caja">
  <div class="login-caja-body">
      <div class="logo">
          <img src=".././dist/img/logo.jpg" alt="Algo Decoración">
      </div>  
    <p class="login-caja-msg">Inicia sesión</p>
    <div><span class='error'>{$error}</span></div>
    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="nombre" name="usuario" class="form-control" placeholder="usuario" value="{if (isset($_COOKIE['usuario']))}
               {$_COOKIE['usuario']}
           {/if}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="password" value="{if (isset($_COOKIE['password']))}
               {$_COOKIE['password']}
           {/if}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="enviar" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src=".././plugins/jQuery/jquery-3.1.1.min.js"></script>
<script src=".././dist/bootstrap/js/bootstrap.min.js"></script>
<script src=".././plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
