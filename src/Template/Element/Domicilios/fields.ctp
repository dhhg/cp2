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
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Calle</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('calle',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Colonia</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('colonia',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Código Postal</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('codigopostal',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Municipio</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('municipio',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Ciudad</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('ciudad',['label' => false]) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Serie" class="col-xs-4 col-sm-4 control-label">Estado</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('estado',['label' => false]) ?>
            <?= $this->Form->input('user_id',['type' => 'hidden', 'value' => $current_user['id']]) ?>
        </div>
    </div>
</div> 