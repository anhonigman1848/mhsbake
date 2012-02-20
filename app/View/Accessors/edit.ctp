<div class="accessors form">
<?php echo $this->Form->create('Accessor');?>
	<fieldset>
		<legend><?php echo __('Edit Accessor'); ?></legend>
	<?php
		echo $this->Form->input('accessor_id');
		echo $this->Form->input('name_last');
		echo $this->Form->input('name_first');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Accessor.accessor_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Accessor.accessor_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accessors'), array('action' => 'index'));?></li>
	</ul>
</div>
