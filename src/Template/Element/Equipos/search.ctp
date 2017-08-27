<div class="form-group">
    <label for="dato" class="col-lg-2 col-sm-2 control-label">Buscar</label>
    <div class="col-lg-10 col-sm-6">
    	<label from='tipo'> Busrcar en </label>
    	<?= $this->Form->input('tipo',['label' => false, 'multiselect' => false, 'value' => [1, 2, 3, 4], 'options' => ['Tipo', 'Modelo', 'Marca', 'Serie / Tag']] ) ?>
        <?= $this->Form->input('dato',['label' => false, 'class' =>'col-lg-6']) ?>
        <?= $this->Form->submit('Buscar',['action' => 'search'],['class' => 'btn btn-info col-lg-2']) ?>
    </div>
</div>