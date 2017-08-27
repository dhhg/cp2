<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Domicilio $domicilio
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Domicilio'), ['action' => 'edit', $domicilio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Domicilio'), ['action' => 'delete', $domicilio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domicilio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Domicilios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Domicilio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="domicilios view large-9 medium-8 columns content">
    <h3><?= h($domicilio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Calle') ?></th>
            <td><?= h($domicilio->calle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colonia') ?></th>
            <td><?= h($domicilio->colonia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Noint') ?></th>
            <td><?= h($domicilio->noint) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Noext') ?></th>
            <td><?= h($domicilio->noext) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= h($domicilio->municipio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudad') ?></th>
            <td><?= h($domicilio->ciudad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($domicilio->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $domicilio->has('cliente') ? $this->Html->link($domicilio->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $domicilio->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $domicilio->has('user') ? $this->Html->link($domicilio->user->id, ['controller' => 'Users', 'action' => 'view', $domicilio->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($domicilio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($domicilio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($domicilio->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $domicilio->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
