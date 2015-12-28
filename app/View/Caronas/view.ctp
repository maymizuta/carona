<div class="caronas view">
<h2><?php echo __('Carona'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carona['Carona']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PontoInicial'); ?></dt>
		<dd>
			<?php echo h($carona['Carona']['pontoInicial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HorarioDePartida'); ?></dt>
		<dd>
			<?php echo h($carona['Carona']['horarioDePartida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HorarioDeSaida'); ?></dt>
		<dd>
			<?php echo h($carona['Carona']['horarioDeSaida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IncialLatitude'); ?></dt>
		<dd>
			<?php echo h($carona['Carona']['incialLatitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IncialLongitude'); ?></dt>
		<dd>
			<?php echo h($carona['Carona']['incialLongitude']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Carona'), array('action' => 'edit', $carona['Carona']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carona'), array('action' => 'delete', $carona['Carona']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $carona['Carona']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Caronas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carona'), array('action' => 'add')); ?> </li>
	</ul>
</div>
