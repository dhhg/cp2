<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Modificar datos de la marca</h3>
        </div>
            <div class="panel-body">
                <?= $this->Form->create($marca,['class' => 'form-horizontal']) ?>
                <?= $this->element('marcas/fields') ?>
                    
            </div>
            <div class="panel-footer" align="right">
                <?= $this->Form->submit('Modificar',['class' => 'btn btn-primary'])?>
            </div>
                <?= $this->Form->end()?>
    </div>
</div>
