<div class="payments form">
<?php echo $this->Form->create('Payment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Payment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('id_reference');
		echo $this->Form->input('transaction_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Payment.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Payment.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?></li>
	</ul>
</div>
