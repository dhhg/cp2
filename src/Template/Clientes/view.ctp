<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Cliente $cliente
  */
?>
<div class="users index large-9 medium-8 columns content" style="padding: 30px;">
    <div class="panel panel-primary">
        <div class="panel-heading resume-heading">
            <h3 class="panel-title">Detalles del cliente</h3>
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
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Datos1" data-toggle="tab">Cliente</a></li>
                        <li><a href="#Datos2" data-toggle="tab">Domicilio</a></li>
                        <li><a href="#Datos3" data-toggle="tab">Telefonos</a></li>    
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="Datos1" style="border-left: solid 1px #DDDDDD; border-bottom: solid 1px #DDDDDD; border-right: solid 1px #DDDDDD; padding: 5px;">
                            <table class="vertical-table" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th>Id</th>
                                        <td><?= h($cliente->id) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td><?= h($cliente->nombre) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Correo Eléctronico</th>
                                        <td><?= h($cliente->email) ?></td>
                                    </tr>                             
                                    <tr>
                                        <th>Creado</th>
                                        <td><?= h($cliente->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Modificado</th>
                                        <td><?= h($cliente->modified) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado</th>
                                        <td>
                                            <?php
                                                if($cliente->activo == 1)
                                                    echo "Activo";
                                                else
                                                    echo 'Supendido';
                                            ?>                                    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="Datos2" style="border-left: solid 1px #DDDDDD; border-bottom: solid 1px #DDDDDD; border-right: solid 1px #DDDDDD; padding: 5px;">
                            Domicilio
                        </div>
                        <div class="tab-pane" id="Datos3" style="border-left: solid 1px #DDDDDD; border-bottom: solid 1px #DDDDDD; border-right: solid 1px #DDDDDD; padding: 5px;">
                            Telefonos
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer" align="right">
                <?= $this->Html->link('Editar',['action' => 'edit', $cliente->id],['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink('Eliminar',['action' => 'delete', $cliente->id],['confirm' => __('Estas seguro de eliminar el registro # {0}?', $cliente->id), 'class' => 'btn btn-danger']) ?>
                <?= $this->Html->link('Cerrar',['action' => 'index'],['class' => 'btn btn-info']) ?>
            </div>
    </div>
</div>