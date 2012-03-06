<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveContents form">
<?php echo $this->Form->create('ArchiveContent');?>
	<fieldset>
		<legend><?php echo __('Add Archive Content'); ?></legend>
	<?php
		echo $this->Form->input('archive_id');
		echo $this->Form->input('reel_number');
		echo $this->Form->input('begin_year');
		echo $this->Form->input('begin_month');
		echo $this->Form->input('end_year');
		echo $this->Form->input('end_month');
		echo $this->Form->input('contents');
		echo $this->Form->input('comments');
		echo $this->Form->input('usage_rights');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Archive Contents'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archives'), array('controller' => 'archives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive'), array('controller' => 'archives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('controller' => 'archive_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('controller' => 'archive_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>
