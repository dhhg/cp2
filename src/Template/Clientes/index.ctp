<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
  */
?>
<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'Clientes' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>    
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nombre', 'Cliente') ?></th>
                    <th scope="col" class="actions"><?= 'Acciones' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>                
                    <td><?= $this->Number->format($cliente->id) ?></td>
                    <td><?= h($cliente->nombre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Detalle', ['action' => 'view', $cliente->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $cliente->id],['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $cliente->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $cliente->id), 'class' => 'btn btn-danger']) ?>
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