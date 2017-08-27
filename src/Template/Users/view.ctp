<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>

<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Detalles de usuario</h3>
        </div>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-4" align="center">
                    <figure>
                        <?= 
                            $this->Html->image('../files/users/photo/'.$user->photo_dir.'/'.$user->photo,['class' => 'img-circle img-responsive', 'height'=>'100', 'width'=>'100'])
                        ?>                    
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-8" style="border-left: solid 2px #F1F1F1;">
                    <table class="vertical-table" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td><?= h($user->id) ?></td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td><?= h($user->nombre.' '. $user->appaterno.' '.$user->apmaterno) ?></td>
                            </tr>
                            <tr>
                                <th>Tipo de usuario</th>
                                <td>
                                    <?php 
                                        switch($user->role)
                                        {
                                            case 'admin':
                                            {
                                                echo 'Administrador';
                                                break;                                            
                                            }
                                            case 'soporte':
                                            {
                                                echo 'Soporte';
                                                break;
                                            }
                                        }
                                    ?>                               
                                </td>
                            </tr>
                            <tr>
                                <th>Creado</th>
                                <td><?= h($user->created) ?></td>
                            </tr>
                            <tr>
                                <th>Modificado</th>
                                <td><?= h($user->modified) ?></td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>
                                    <?php
                                        if($user->activo == 1)
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
                <?= $this->Html->link('Editar',['action' => 'edit', $user->id],['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink('Eliminar',['action' => 'delete', $user->id],['confirm' => __('Estas seguro de eliminar el registro # {0}?', $user->id), 'class' => 'btn btn-danger']) ?>
                <?= $this->Html->link('Cerrar',['action' => 'index'],['class' => 'btn btn-info']) ?>
            </div>
    </div>
</div>

