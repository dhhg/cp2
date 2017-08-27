<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Equipo[]|\Cake\Collection\CollectionInterface $equipos
  */
?>

<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'Equipos' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>    
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('tipos.nombre', 'Tipo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('marcas.nombre', 'Nombre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modelos.nombre', 'Modelo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('serie', 'Serie / Tag') ?></th>                    
                    <th scope="col" class="actions"><?= 'Acciones' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo): ?>                
                    <td><?= $this->Number->format($equipo->id) ?></td>
                    <td><?= h($equipo['tipo']->nombre) ?></td>
                    <td><?= h($equipo['marca']->nombre) ?></td>
                    <td><?= h($equipo['modelo']->nombre) ?></td>
                    <td><?= h($equipo->serie) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Detalle', ['action' => 'view', $equipo->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $equipo->id],['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $equipo->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $equipo->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' .'Primero' )?>
            <?= $this->Paginator->prev('< ' .'Anterior' )?>
            <?= $this->Paginator->numbers(['before' => '','after' => '']) ?>
            <?= $this->Paginator->next('Siguiente' . ' >') ?>
            <?= $this->Paginator->last('Ultimo' . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>

<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Equipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipos'), ['controller' => 'Tipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo'), ['controller' => 'Tipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Marcas'), ['controller' => 'Marcas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marcas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipos index large-9 medium-8 columns content">
    <h3><?= __('Equipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modelo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipos as $equipo): ?>
            <tr>
                <td><?= $this->Number->format($equipo->id) ?></td>
                <td><?= h($equipo->serie) ?></td>
                <td><?= h($equipo->activo) ?></td>
                <td><?= h($equipo->created) ?></td>
                <td><?= h($equipo->modified) ?></td>
                <td><?= $equipo->has('tipo') ? $this->Html->link($equipo->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $equipo->tipo->id]) : '' ?></td>
                <td><?= $equipo->has('modelo') ? $this->Html->link($equipo->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $equipo->modelo->id]) : '' ?></td>
                <td><?= $equipo->has('marca') ? $this->Html->link($equipo->marca->id, ['controller' => 'Marcas', 'action' => 'view', $equipo->marca->id]) : '' ?></td>
                <td><?= $equipo->has('user') ? $this->Html->link($equipo->user->id, ['controller' => 'Users', 'action' => 'view', $equipo->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->