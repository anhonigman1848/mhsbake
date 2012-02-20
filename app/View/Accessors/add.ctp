<div class="accessors form">
<?php echo $this->Form->create('Accessor');?>
	<fieldset>
		<legend><?php echo __('Add Accessor'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Accessors'), array('action' => 'index'));?></li>
	</ul>
</div>
