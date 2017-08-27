<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Nuevo Cliente</h3>
        </div>
            <div class="panel-body">
                <?= $this->Form->create($cliente,['type' => 'file', 'class' => 'form-horizontal']) ?>
                <?= $this->element('Clientes/fields') ?>                    
            </div>
            <div class="panel-footer" align="right">
                <?= $this->Form->submit('Crear',['class' => 'btn btn-success'])?>
            </div>
                <?= $this->Form->end()?>
    </div>
</div>


