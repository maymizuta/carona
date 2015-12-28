<div class="historicos view">
<h2><?php echo __('Historico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Historico'), array('action' => 'edit', $historico['Historico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Historico'), array('action' => 'delete', $historico['Historico']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $historico['Historico']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historico'), array('action' => 'add')); ?> </li>
	</ul>
</div>
