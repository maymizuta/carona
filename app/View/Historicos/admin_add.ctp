<div class="historicos form">
<?php echo $this->Form->create('Historico'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Historico'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Historicos'), array('action' => 'index')); ?></li>
	</ul>
</div>
