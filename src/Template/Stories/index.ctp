<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2>Mis historias
				<?= $this->Html->link("<i class='fa fa-plus fa-fw'></i> Agregar",["controller" => "Stories", "action" => "add"],["class" => "btn btn-success pull-right","escape" => false])?>
			</h2>
		</div>		
		<ul class="list-group">
			<?php foreach($stories as $storie):?>
				<li class="list-group-item">
					<h4 class="list-group-item-heading"><?= h($storie->title)?>
						<small><?= $storie->modified->nice() ?></small>
						<div class="pull-right">
						<?= $this->Html->link("<i class='fa fa-edit fa-fw'></i>",["controller" => "Stories", "action" => "edit",$storie->id],["class" => "btn btn-sm btn-primary","escape" => false]) ?>
						<?= $this->Form->postlink("<i class='fa fa-trash fa-fw'></i>",["controller" => "Stories", "action" => "delete",$storie->id],["confirm" => "¿Está seguro que desea eliminar la historia?","class" => "btn btn-sm btn-danger","escape" => false]) ?>
						</div>

					</h4>
					<p><strong class="text-right">
						<small>
							<?php $class = ""; $nombre = "";?>
							<?php switch($storie->complexity):?><?php case 'low': ?>
							<?php $class='info';$nombre = "Baja"; ?> 
							<?php break; ?>
							<?php case 'medium': ?>
							<?php $class='warning';$nombre = "Media"; ?> 
							<?php break; ?>
							<?php case 'high': ?>
							<?php $class='danger';$nombre = "Alta"; ?> 
							<?php break; ?>
							<?php endswitch;?>
							Complejidad:
							<span class='label label-<?= $class?>'><?= h($nombre) ?></span>

						</small>
					</strong></p>
					<p class="list-group-item-text">
						<?= h($storie->description) ?>
					</p>

				</li>
			<?php endforeach;?>
		</ul>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->prev("< ".__("Anterior"))?>
				<?= $this->Paginator->numbers(["before"=>"","after"=>""]) ?>
				<?= $this->Paginator->next(__("Siguiente")." >")?>
			</ul>
			<p><?= $this->Paginator->counter()?></p>
		</div>
	</div>
</div>