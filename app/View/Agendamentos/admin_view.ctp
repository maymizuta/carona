<div class="agendamentos view">
<h2><?php echo __('Agendamento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agendamento['Agendamento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DiaDaSemana'); ?></dt>
		<dd>
			<?php echo h($agendamento['Agendamento']['diaDaSemana']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HorarioDePartida'); ?></dt>
		<dd>
			<?php echo h($agendamento['Agendamento']['horarioDePartida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HorarioDeSaida'); ?></dt>
		<dd>
			<?php echo h($agendamento['Agendamento']['horarioDeSaida']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agendamento'), array('action' => 'edit', $agendamento['Agendamento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agendamento'), array('action' => 'delete', $agendamento['Agendamento']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $agendamento['Agendamento']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Agendamentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agendamento'), array('action' => 'add')); ?> </li>
	</ul>
</div>
