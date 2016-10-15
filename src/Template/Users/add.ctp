<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear usuario</h2>
        </div>
        <?= $this->Form->create($user)?>
        <fieldset>
            <?php 
            echo $this->Form->input("first_name",["label"=>"Nombre"]);
            echo $this->Form->input("last_name",["label"=>"Apellido"]);
            echo $this->Form->input("email");
            echo $this->Form->input("password");

            ?>
        </fieldset>
        <?= $this->Form->button("Crear", ["class" => "btn btn-block btn-primary"]);?>
        <?= $this->Form->end();?>
    </div>
</div>
