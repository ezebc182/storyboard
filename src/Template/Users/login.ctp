<?= $this->Html->css('login') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h2 class="page-header">Bienvenido a <?= APP_NAME?></h1>
            <h3 class="text-center login-title">Inicie sesión</h2>
            <div class="account-wall">
                <?= $this->Html->image('user.jpg', ['alt' => 'User','class' => 'profile-img']) ?>
                <div class="form-signin">
                    <?= $this->Flash->render('auth');?>

                    <?= $this->Form->create() ?>
                    <fieldset>

                        <?= $this->Form->input("email" ,['placeholder'=>'Email','label'=>false,'required']) ?>
                        <?= $this->Form->input("password", ['placeholder'=> 'Password','label'=>false,'required']) ?>
                        <?= $this->Form->button('Ingresar',['class' => 'btn btn-lg btn-primary btn-block']) ?>
                    </fieldset>

                </div>

            </div>
            <?= $this->Html->link('Registrarse',['controller' => 'Users','action' =>'add'],['class' =>'text-center new-account']) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>