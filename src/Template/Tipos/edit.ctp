<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipos form large-9 medium-8 columns content">
    <?= $this->Form->create($tipo) ?>
    <fieldset>
        <legend><?= __('Edit Tipo') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('activo');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
-->

<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Modificar tipo</h3>
        </div>
            <div class="panel-body">
                <?= $this->Form->create($tipo,['class' => 'form-horizontal']) ?>
                <?= $this->element('Tipos/fields') ?>
                    
            </div>
            <div class="panel-footer" align="right">
                <?= $this->Form->submit('Modificar',['class' => 'btn btn-primary'])?>
            </div>
                <?= $this->Form->end()?>
    </div>
</div>
