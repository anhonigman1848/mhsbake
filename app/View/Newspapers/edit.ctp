<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspapers form">
<?php echo $this->Form->create('Newspaper');?>
	<fieldset>
		<legend><?php echo __('Edit Newspaper'); ?></legend>
	<?php
		echo $this->Form->input('newspaper_id');
		echo $this->Form->input('title');
		echo $this->Form->input('city');
		echo $this->Form->input('county');
		echo $this->Form->input('title_control');
		echo $this->Form->input('aleph_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Newspaper.newspaper_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Newspaper.newspaper_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->