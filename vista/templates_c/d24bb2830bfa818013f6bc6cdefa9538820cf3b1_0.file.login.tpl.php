<?php
/* Smarty version 3.1.30, created on 2017-06-04 17:04:30
  from "/var/www/html/gestion/vista/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934217e765095_79171017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd24bb2830bfa818013f6bc6cdefa9538820cf3b1' => 
    array (
      0 => '/var/www/html/gestion/vista/templates/login.tpl',
      1 => 1496588625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934217e765095_79171017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

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
    <div><span class='error'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span></div>
    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="nombre" name="usuario" class="form-control" placeholder="usuario" value="<?php if ((isset($_smarty_tpl->tpl_vars['_COOKIE']->value['usuario']))) {?>
               <?php echo $_smarty_tpl->tpl_vars['_COOKIE']->value['usuario'];?>

           <?php }?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="password" value="<?php if ((isset($_smarty_tpl->tpl_vars['_COOKIE']->value['password']))) {?>
               <?php echo $_smarty_tpl->tpl_vars['_COOKIE']->value['password'];?>

           <?php }?>">
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
<?php echo '<script'; ?>
 src=".././plugins/jQuery/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src=".././dist/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src=".././plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
