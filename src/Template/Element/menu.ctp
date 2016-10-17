<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?= $this->Html->link("StoryBoard",["controller"=>"Users","action"=>"index"],["class" => "navbar-brand"]) ?>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if(isset($current_user)):?>

        <ul class="nav navbar-nav navbar-left">
          <?php if($current_user['role'] ==='admin'):?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link("<i class='fa fa-list fa-fw'></i> Listar",["controller"=>"Users","action"=>"index"],["escape" => false])?></li>
                <li><?= $this->Html->link("<i class='fa fa-plus fa-fw'></i> Agregar",["controller"=>"Users","action"=>"add"],["escape" => false])?></li>
              </ul>

            </li>
          <?php endif;?>
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Historias<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><?= $this->Html->link("<i class='fa fa-list fa-fw'></i> Listar",["controller"=>"Stories","action"=>"index"],["escape" => false])?></li>
              <li><?= $this->Html->link("<i class='fa fa-plus fa-fw'></i> Agregar",["controller"=>"Stories","action"=>"add"],["escape" => false])?></li>
            </ul>
          </li>
        </ul>         
        <ul class="nav navbar-nav navbar-right" >
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $current_user['email']?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><?= $this->Html->link('<i class="fa fa-power-off fa-fw"></i> Cerrar sesión',['controller'=>'Users','action'=>'logout'],["escape" => false]) ?></li>
            </ul>
          </li>
        </ul>

      </ul>

    <?php endif;?>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>