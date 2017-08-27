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
        <label for="nombre" class="col-xs-4 col-sm-4 control-label">Nombre</label>
        <div class="col-xs-8 col-sm-4">
            <?= $this->Form->input('nombre',['label' => false]) ?>
            <?= $this->Form->input('user_id',['type' => 'hidden', 'value' => $current_user['id']]) ?>
        </div>
    </div>
    
</div> 