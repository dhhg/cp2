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
                imagen de ejemplo
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-8" style="border-left: solid 2px #F1F1F1;">
    <div class="form-group">
        <label for="tipos_id" class="col-xs-4 col-sm-4 control-label">Tipo</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('tipo_id',['type' => 'select', 'multiple' => false, 'options' => $tipos, 'empty' => true, 'label' => false] ) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="marcas_id" class="col-xs-4 col-sm-4 control-label">Marca</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('marca_id',['type' => 'select', 'multiple' => false, 'options' => $marcas, 'empty' => true, 'label' => false] ) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="marcas_id" class="col-xs-4 col-sm-4 control-label">Modelo</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('modelo_id',['type' => 'select', 'multiple' => false, 'options' => $modelos, 'empty' => true, 'label' => false] ) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Serie / Tag</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('serie',['label' => false]) ?>
            <?= $this->Form->input('user_id',['type' => 'hidden', 'value' => $current_user['id']]) ?>
        </div>
    </div>
    
</div> 