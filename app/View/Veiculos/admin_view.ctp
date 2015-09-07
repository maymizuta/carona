<div class="veiculos view">
<h2><?php echo __('Veiculo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placa'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['placa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cor'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['cor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ModeloDoCarro'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['modeloDoCarro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo h($veiculo['Veiculo']['marca']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Veiculo'), array('action' => 'edit', $veiculo['Veiculo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Veiculo'), array('action' => 'delete', $veiculo['Veiculo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $veiculo['Veiculo']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Veiculos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Veiculo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
