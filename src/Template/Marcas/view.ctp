<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Marca $marca
  */
?>
<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Detalles de la marca</h3>
        </div>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-4" align="center">
                    <figure>
                        <!--<?= 
                            $this->Html->image('../files/users/photo/'.$user->photo_dir.'/'.$user->photo,['class' => 'img-circle img-responsive', 'height'=>'100', 'width'=>'100'])
                        ?>-->                    
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-8" style="border-left: solid 2px #F1F1F1;">
                    <table class="vertical-table" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td><?= h($marca->id) ?></td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td><?= h($marca->nombre) ?></td>
                            </tr>                            
                            <tr>
                                <th>Creado</th>
                                <td><?= h($marca->created) ?></td>
                            </tr>
                            <tr>
                                <th>Modificado</th>
                                <td><?= h($marca->modified) ?></td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>
                                    <?php
                                        if($marca->activo == 1)
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
                <?= $this->Html->link('Editar',['action' => 'edit', $marca->id],['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink('Eliminar',['action' => 'delete', $marca->id],['confirm' => __('Estas seguro de eliminar el registro # {0}?', $marca->id), 'class' => 'btn btn-danger']) ?>
                <?= $this->Html->link('Cerrar',['action' => 'index'],['class' => 'btn btn-info']) ?>
            </div>
    </div>
</div>