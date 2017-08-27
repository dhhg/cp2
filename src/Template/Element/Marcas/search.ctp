<div class="form-group">
    <label for="dato" class="col-lg-2 col-sm-2 control-label">Buscar</label>
    <div class="col-lg-10 col-sm-6">
        <?= $this->Form->input('dato',['label' => false, 'class' =>'col-lg-6']) ?>
        <?= $this->Form->submit('Buscar',['action' => 'search'],['class' => 'btn btn-info col-lg-2']) ?>
    </div>
</div>