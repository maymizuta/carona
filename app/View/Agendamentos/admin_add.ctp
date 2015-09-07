<div class="agendamentos form">
<?php echo $this->Form->create('Agendamento'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Agendamento'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Agendamentos'), array('action' => 'index')); ?></li>
	</ul>
</div>
