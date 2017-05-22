<section class="content">
<div class="row">
    {include file="sidebar-inicio.tpl"}
</div>
<div class="row">
  <section class="col-lg-5 connectedSortable">
    <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>

      <h3 class="box-title">To Do List</h3>

      <div class="box-tools pull-right">
        <ul class="pagination pagination-sm inline">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <ul class="todo-list">
        <li>
          <!-- drag handle -->
              <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
          <!-- checkbox -->
          <input type="checkbox" value="">
          <!-- todo text -->
          <span class="text">Design a nice theme</span>
          <!-- Emphasis label -->
          <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
          <!-- General tools such as edit or delete-->
          <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
          </div>
        </li>
        <li>
              <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
          <input type="checkbox" value="">
          <span class="text">Make the theme responsive</span>
          <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
          <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
          </div>
        </li>
        <li>
              <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
          <input type="checkbox" value="">
          <span class="text">Let theme shine like a star</span>
          <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
          <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
          </div>
        </li>
        <li>
              <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
          <input type="checkbox" value="">
          <span class="text">Let theme shine like a star</span>
          <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
          <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
          </div>
        </li>
        <li>
              <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
          <input type="checkbox" value="">
          <span class="text">Check your messages and notifications</span>
          <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
          <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
          </div>
        </li>
        <li>
              <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>
          <input type="checkbox" value="">
          <span class="text">Let theme shine like a star</span>
          <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
          <div class="tools">
            <i class="fa fa-edit"></i>
            <i class="fa fa-trash-o"></i>
          </div>
        </li>
      </ul>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix no-border">
      <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
    </div>
  </div>
</section>
  <section class="col-lg-5 connectedSortable">
    <div class="box box-body">
     <div class="box-body">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
          </ol>
            <div class="carousel-inner">
            <div class="item">
              <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">

              <div class="carousel-caption">
                Primera imagen
              </div>
            </div>
            <div class="item">
              <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">

              <div class="carousel-caption">
                Segunda imagen
              </div>
            </div>
            <div class="item active">
              <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">

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
      </div>
    </div>
  </section>
</div>
</section>