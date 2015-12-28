<div class="historicos form">
<?php echo $this->Form->create('Historico'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Historico'); ?></legend>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Historico.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Historico.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Historicos'), array('action' => 'index')); ?></li>
	</ul>
</div>
