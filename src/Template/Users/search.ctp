<div class="users index large-9 medium-8 columns content">
    <h3>
        <?= 'Buscar Usuarios' ?>
        <?= $this->Html->link('Nuevo',['action' => 'add'], ['class' => 'btn btn-success pull-right menu'])?>
    </h3>            
    <hr>
    <div class="row"></div>
    <div class="col-lg-12 col-md-8" >
        <?= $this->Form->create('user', ['id' => 'frmBuscar','class' => 'form-horizontal']) ?>
        <div class="form-group">
            <label for="dato" class="col-lg-2 col-sm-2 control-label">Buscar</label>
            <div class="col-lg-10 col-sm-6">
                <?= $this->Form->input('dato',['label' => false, 'class' =>'col-lg-6']) ?>
                <?= $this->Form->submit('Buscar',['action' => 'search'],['class' => 'btn btn-info col-lg-2']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="row"></div>
    <div id="resultado">
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email', 'Correo electrónico') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('nombre', 'Nombre del usuario') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('role', 'Tipo de Usuario') ?></th>                
                        <th scope="col" class="actions"><?= 'Acciones' ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->nombre.' '.$user->appaterno.' '.$user->apmaterno) ?></td>
                        <td><?= h($user->role) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('Detalle', ['action' => 'view', $user->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link('Modificar', ['action' => 'edit', $user->id],['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $user->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $user->id), 'class' => 'btn btn-danger']) ?>
                            <!--<?= $this->Form->postLink('Eliminar', ['action' => 'delete', $user->id], ['confirm' => __('Estas seguro de eliminar el registro # {0}?', $user->id)]) ?>-->
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
</div>