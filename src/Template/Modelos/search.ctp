<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'Buscar Usuarios' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>
    <div class="col-lg-12 col-md-8" >
        <?= $this->Form->create('modelo', ['id' => 'frmBuscar','class' => 'form-horizontal']) ?>
        <?= $this->element('modelos/search') ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="row"></div>
    <div id="resultado">
        <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nombre', 'modelo de equipo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id', 'Creado') ?></th>                    
                    <th scope="col" class="actions"><?= 'Acciones' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modelo as $modelo): ?>                
                    <td><?= $this->Number->format($modelo->id) ?></td>
                    <td><?= h($modelo->nombre) ?></td>
                    <td><?= h($modelo['user']->nombre.' '.$modelo['user']->appaterno.' '.$modelo['user']->apmaterno) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Detalle', ['action' => 'view', $modelo->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $modelo->id],['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $modelo->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $modelo->id), 'class' => 'btn btn-danger']) ?>
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