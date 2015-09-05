<div class="veiculos form">
<?php echo $this->Form->create('Veiculo'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Veiculo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('placa');
		echo $this->Form->input('cor');
		echo $this->Form->input('cidade');
		echo $this->Form->input('estado');
		echo $this->Form->input('modeloDoCarro');
		echo $this->Form->input('marca');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Veiculo.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Veiculo.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Veiculos'), array('action' => 'index')); ?></li>
	</ul>
</div>
