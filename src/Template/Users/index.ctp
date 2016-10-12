<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Usuarios</h2>
    </div>
    <div class="">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort("id") ?></th>
                    <th><?= $this->Paginator->sort("first_name", ["Nombre"]) ?></th>
                    <th><?= $this->Paginator->sort("last_name" , ["Apellido"]) ?></th>
                    <th><?= $this->Paginator->sort("email" , ["Correo electrónico"]) ?></th>
                    <th><?= $this->Paginator->sort("role", ["Rol"]) ?></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->first_name) ?> </td>
                        <td><?= h($user->last_name) ?></td>
                        <td><?= h($user->email) ?> </td>
                        <td><?= ($user->role==='admin')? "<span class='label label-success'>"
                        .h($user->role). "</span>"
                        :"<span class='label label-warning'>".h($user->role). "</span>" ?></td>
                        <td>
                            <?= $this->Html->link("<i class='fa fa-eye fa-fw'></i>",["action" =>"view",$user->id],["class"=>"btn btn-sm btn-default", "escape"=>false]) ?>
                            <?= $this->Html->link("<i class='fa fa-edit fa-fw'></i>",["action" =>"edit",$user->id],["class"=>"btn btn-sm btn-primary", "escape"=>false]) ?>
                            <?= $this->Form->postLink("<i class='fa fa-trash fa-fw'></i>",["action"=>"delete",$user->id],["confirm"=>"¿Eliminar el usuario ". $user->first_name." ".$user->last_name."?","class"=>"btn btn-sm btn-danger", "escape"=>false]) ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev("< ".__("Anterior"))?>
            <?= $this->Paginator->numbers(["before"=>"","after"=>""]) ?>
            <?= $this->Paginator->next(__("Siguiente")." >")?>
        </ul>
        <p><?= $this->Paginator->counter()?></p>
    </div>
</div>
