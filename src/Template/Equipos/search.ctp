<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'Buscar Equipos' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>
    <div class="col-lg-12 col-md-8" >
        <?= $this->Form->create('equipo', ['id' => 'frmBuscar','class' => 'form-horizontal']) ?>
        <?= $this->element('equipos/search') ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="row"></div>
    <div id="resultado">
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
                <?php foreach ($equipo as $equipo): ?>                
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