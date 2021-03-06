<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $domicilio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $domicilio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="domicilios form large-9 medium-8 columns content">
    <?= $this->Form->create($domicilio) ?>
    <fieldset>
        <legend><?= __('Edit Domicilio') ?></legend>
        <?php
            echo $this->Form->control('calle');
            echo $this->Form->control('colonia');
            echo $this->Form->control('noint');
            echo $this->Form->control('noext');
            echo $this->Form->control('municipio');
            echo $this->Form->control('ciudad');
            echo $this->Form->control('estado');
            echo $this->Form->control('activo');
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
