<div class="col-xs-12 col-sm-4" align="center">
    <!--<figure>
        <?= 
            $this->Html->image('../files/users/photo/'.$user->photo_dir.'/'.$user->photo,['class' => 'img-circle img-responsive', 'height'=>'100', 'width'=>'100'])
        ?>                    
    </figure>-->
    <div class="row"></div>
    <div class="col-xs-12 col-sm-8">
        <div class="form-group">
            <div class="col-xs-10 col-sm-10">
                <?= $this->Form->input('photo',['type' => 'file', 'label' => 'Imagen del perfil']) ?>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-8" style="border-left: solid 2px #F1F1F1;">
    <div class="form-group">
        <label for="email" class="col-xs-4 col-sm-4 control-label">Correo eléctronico</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('email',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="nombre" class="col-xs-4 col-sm-4 control-label">Nombre</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('nombre',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="appaterno" class="col-xs-4 col-sm-4 control-label">Apellido Paterno</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('appaterno',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="nombre" class="col-xs-4 col-sm-4 control-label">Apellido Materno</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('apmaterno',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="nombre" class="col-xs-4 col-sm-4 control-label">Role</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('role',['options' => ['admin' => 'Administrador', 'soporte' => 'Soporte'],'label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="nombre" class="col-xs-4 col-sm-4 control-label">Contraseña</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('password',['label' => false]) ?>
        </div>
    </div>
</div> 