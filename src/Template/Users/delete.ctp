<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('email', ['label' => 'Correo Electrónico']);
            echo $this->Form->control('nombre', ['label' => 'Nombre(s)']);
            echo $this->Form->control('appaterno', ['label' => 'Apellido Patrno']);
            echo $this->Form->control('apmaterno',['label' => 'Apellido Materno']);
            echo $this->Form->control('role', ['options' => ['admin' => 'Administrador', 'soporte' => 'Soporte']]);
            echo $this->Form->control('password',['Contraseña']);
            echo $this->Form->control('photo', ['type' => 'file', 'label' =>'Imagen del usuario']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
