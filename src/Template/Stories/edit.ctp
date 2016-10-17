<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Editar historia</h2>
        </div>
        <?= $this->Form->create($story,['novalidate'])?>
        <fieldset>
           <?= $this->element("stories/fields") ?>
        </fieldset>
        <?= $this->Form->button("Editar", ["class" => "btn btn-block btn-primary"]);?>
        <?= $this->Form->end();?>
    </div>
</div>
