<div class="well">
	<h1 class="page-header">Detalle de usuario</h1>

	<dl>
		<dt>Nombre</dt>
		<dd><?= $user->first_name ?>
			&nbsp;
		</dd>
		<br>
		<dt>Apellido</dt>
		<dd><?= $user->last_name ?>
			&nbsp;
		</dd>
		<br>
		<dt>Email</dt>
		<dd><?= $user->email ?>
			&nbsp;
		</dd>
		<br>
		<dt>Rol</dt>
		<dd><?= $user->role ?>
			&nbsp;
		</dd>
		<br>
		<dt>Activo</dt>
		<dd><?= $user->active?'Si':'No' ?>
			&nbsp;
		</dd>
		<br>
		<dt>Fecha creación</dt>
		<dd><?= $user->created->nice() ?>
			&nbsp;
		</dd>
		<br>
		<dt>Fecha modificación</dt>
		<dd><?= $user->modified->nice() ?>
			&nbsp;
		</dd>
		<br>
	</dl>
</div>