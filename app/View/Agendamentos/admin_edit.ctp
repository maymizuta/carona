<div class="agendamentos form">
<?php echo $this->Form->create('Agendamento'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Agendamento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('diaDaSemana');
		echo $this->Form->input('horarioDePartida');
		echo $this->Form->input('horarioDeSaida');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Agendamento.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Agendamento.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Agendamentos'), array('action' => 'index')); ?></li>
	</ul>
</div>
