<div class="caronas form">
<?php echo $this->Form->create('Carona'); ?>
	<fieldset>
		<legend><?php echo __('Add Carona'); ?></legend>
	<?php
		echo $this->Form->input('pontoInicial');
		echo $this->Form->input('horarioDePartida');
		echo $this->Form->input('horarioDeSaida');
		echo $this->Form->input('incialLatitude');
		echo $this->Form->input('incialLongitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Caronas'), array('action' => 'index')); ?></li>
	</ul>
</div>
