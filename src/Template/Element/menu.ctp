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
       
        <ul class="nav navbar-nav">
            <?php if($current_user['role'] ==='admin'):?>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link("Listar",["controller"=>"Users","action"=>"index"])?>
                  <li><?= $this->Html->link("Agregar",["controller"=>"Users","action"=>"add"])?>

                  </ul>
                </li>
              </ul>
            </li>
          <?php endif;?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $current_user['email']?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Salir',['controller'=>'Users','action'=>'logout']) ?></li>
              </ul>
            </li>
          </ul>
        </ul>

      <?php endif;?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>