<div class="pedidos form">
<?php echo $this->Form->create('Pedido'); ?>
	<fieldset>
		<legend><?php echo __('Add Pedido'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('carona_id');
		echo $this->Form->input('aceito');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pedidos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Caronas'), array('controller' => 'caronas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carona'), array('controller' => 'caronas', 'action' => 'add')); ?> </li>
	</ul>
</div>
