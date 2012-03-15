<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveContents form">
<?php echo $this->Form->create('ArchiveContent');?>
	<fieldset>
		<legend><?php echo __('Edit Archive Content'); ?></legend>
	<?php
		echo $this->Form->input('archive_content_id');
		echo $this->Form->input('archive_id');
		echo $this->Form->input('reel_number');
		echo $this->Form->input('begin_date');		
		echo $this->Form->input('end_date');		
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArchiveContent.archive_content_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ArchiveContent.archive_content_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archives'), array('controller' => 'archives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive'), array('controller' => 'archives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('controller' => 'archive_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('controller' => 'archive_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>
