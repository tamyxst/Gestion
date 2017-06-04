<section class="content">
<div class="row">
    {include file="sidebar-inicio.tpl"}
</div>
<div class="row">
 <section class="col-lg-6 connectedSortable">
    <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">Últimos registros</h3>
    </div>
    <div class="box-body">
      <ul class="todo-list">
        {foreach from=$ultimosReg item=$uReg}
            <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
              <span class="text">{if ($uReg->getTipoReg()==="incidencia")}<small class="label label-danger">Incidencia </small>{elseif ($uReg->getTipoReg()==="pedido")}
              <small class="label label-info">Pedido </small>{else}<small class="label label-primary">Otro </small>{/if}</span>
              <span class="text"><strong>De:</strong> {$uReg->getIdContactoReg()}    </span>
              <span class="text"><strong>Asignado a:</strong> {$uReg->getIdUsuarioReg()}</span>
              <div class="tools">
              {if ($uReg->getTipoReg()==="incidencia")}
                  <a href="gestion-incidencias.php?id={$uReg->getIdReg()}"><i class="fa fa-edit"></i></a>
              {elseif ($uReg->getTipoReg()==="pedido")}
                  <a href="gestion-pedidos.php?id={$uReg->getIdReg()}"><i class="fa fa-edit"></i></a>
              {else}
                  <a href="gestion-registros.php?id={$uReg->getIdReg()}"><i class="fa fa-edit"></i></a>
              {/if}
              </div>
            </li>
        {/foreach}
      </ul>
    </div>
  </div>
</section>
  <section class="col-lg-6 connectedSortable">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
          </ol>
            <div class="carousel-inner">
            <div class="item">
              <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=Mensaje+del+dia" alt="First slide">
              <div class="carousel-caption">
                Primera imagen
              </div>
            </div>
            <div class="item">
              <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=Mensaje+del+dia" alt="Second slide">
              <div class="carousel-caption">
                Segunda imagen
              </div>
            </div>
            <div class="item active">
              <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=Mensaje+del+dia" alt="Third slide">
              <div class="carousel-caption">
                Tercera imagen
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
  </section>
</div>
</section>