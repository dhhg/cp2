<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Domicilio[]|\Cake\Collection\CollectionInterface $domicilios
  */
?>
<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'domicilios' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>    
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('clientes.nombre', 'Cliente') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('calle', 'Domicilio') ?></th>
                    <th scope="col" class="actions"><?= 'Acciones' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($domicilios as $domicilio): ?>                
                    <td><?= $this->Number->format($domicilio->id) ?></td>
                    <td><?= h($domicilio['Clientes']->nombre) ?></td>
                    <td><?= h($domicilio->calle.' '.$domicilio->colonia) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Detalle', ['action' => 'view', $domicilio->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $domicilio->id],['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $domicilio->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $domicilio->id), 'class' => 'btn btn-danger']) ?>
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