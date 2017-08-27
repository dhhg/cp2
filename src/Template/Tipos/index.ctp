<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Tipo[]|\Cake\Collection\CollectionInterface $tipos
  */
?>

<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'Tipo' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>    
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nombre', 'Tipo de equipo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id', 'Creado') ?></th>                    
                    <th scope="col" class="actions"><?= 'Acciones' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipos as $tipo): ?>                
                    <td><?= $this->Number->format($tipo->id) ?></td>
                    <td><?= h($tipo->nombre) ?></td>
                    <td><?= h($tipo['user']->nombre.' '.$tipo['user']->appaterno.' '.$tipo['user']->apmaterno) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Detalle', ['action' => 'view', $tipo->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $tipo->id],['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $tipo->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $tipo->id), 'class' => 'btn btn-danger']) ?>
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