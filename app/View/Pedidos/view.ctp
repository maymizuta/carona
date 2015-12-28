<div class="pedidos view">
<h2><?php echo __('Pedido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedido['User']['id'], array('controller' => 'users', 'action' => 'view', $pedido['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Carona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedido['Carona']['id'], array('controller' => 'caronas', 'action' => 'view', $pedido['Carona']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aceito'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['aceito']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pedido'), array('action' => 'edit', $pedido['Pedido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pedido['Pedido']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Caronas'), array('controller' => 'caronas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carona'), array('controller' => 'caronas', 'action' => 'add')); ?> </li>
	</ul>
</div>
