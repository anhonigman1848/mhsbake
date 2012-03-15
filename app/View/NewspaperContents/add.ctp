<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperContents form">
<?php echo $this->Form->create('NewspaperContent');?>
	<fieldset>
		<legend><?php echo __('Add Newspaper Content'); ?></legend>
	<?php
		echo $this->Form->input('newspaper_id');
		echo $this->Form->input('begin_date', $options = array('empty' => true));
		echo $this->Form->input('end_date', $options = array('empty' => true));
		echo $this->Form->input('reel_control');
		echo $this->Form->input('gaps');
		echo $this->Form->input('comments');
		echo $this->Form->input('usage_rights');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('controller' => 'newspapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper'), array('controller' => 'newspapers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('controller' => 'newspaper_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('controller' => 'newspaper_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>
