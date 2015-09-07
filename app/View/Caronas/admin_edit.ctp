<div class="caronas form">
<?php echo $this->Form->create('Carona'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Carona'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Carona.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Carona.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Caronas'), array('action' => 'index')); ?></li>
	</ul>
</div>
