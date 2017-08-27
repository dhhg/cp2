<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Equipo $equipo
  */
?>

<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Detalles del equipo</h3>
        </div>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-4" align="center">
                    <!--<figure>
                        <?= 
                            $this->Html->image('../files/users/photo/'.$user->photo_dir.'/'.$user->photo,['class' => 'img-circle img-responsive', 'height'=>'100', 'width'=>'100'])
                        ?>                    
                    </figure>-->
                </div>
                <div class="col-xs-12 col-sm-8" style="border-left: solid 2px #F1F1F1;">
                    <table class="vertical-table" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td><?= h($equipo->id) ?></td>
                            </tr>
                            <tr>
                                <th>Tipo</th>
                                <td><?= h($equipo['tipo']->nombre) ?></td>
                            </tr>
                            <tr>
                                <th>Marca</th>
                                <td><?= h($equipo['marca']->nombre) ?></td>
                            </tr>
                            <tr>
                                <th>Modelo</th>
                                <td><?= h($equipo['modelo']->nombre) ?></td>
                            </tr>
                            <tr>
                                <th>Serie / Tag</th>
                                <td><?= h($equipo->serie) ?></td>
                            </tr>
                            <tr>
                                <th>Registrado por</th>
                                <td><?= h($equipo['user']->nombre.' '.$equipo['user']->appaterno.' '.$equipo['user']->apmaterno) ?></td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>
                                    <?php
                                        if($equipo->activo == 1)
                                            echo "Activo";
                                        else
                                            echo 'Supendido';
                                    ?>                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer" align="right">
                <?= $this->Html->link('Editar',['action' => 'edit', $equipo->id],['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink('Eliminar',['action' => 'delete', $equipo->id],['confirm' => __('Estas seguro de eliminar el registro # {0}?', $equipo->id), 'class' => 'btn btn-danger']) ?>
                <?= $this->Html->link('Cerrar',['action' => 'index'],['class' => 'btn btn-info']) ?>
            </div>
    </div>
</div>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipo'), ['action' => 'edit', $equipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipo'), ['action' => 'delete', $equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipos'), ['controller' => 'Tipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo'), ['controller' => 'Tipos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marcas'), ['controller' => 'Marcas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marcas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List users'), ['controller' => 'users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New user'), ['controller' => 'users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipos view large-9 medium-8 columns content">
    <h3><?= h($equipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Serie') ?></th>
            <td><?= h($equipo->serie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= $equipo->has('tipo') ? $this->Html->link($equipo->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $equipo->tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $equipo->has('modelo') ? $this->Html->link($equipo->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $equipo->modelo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $equipo->has('marca') ? $this->Html->link($equipo->marca->id, ['controller' => 'Marcas', 'action' => 'view', $equipo->marca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('user') ?></th>
            <td><?= $equipo->has('user') ? $this->Html->link($equipo->user->id, ['controller' => 'users', 'action' => 'view', $equipo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($equipo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($equipo->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $equipo->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
-->