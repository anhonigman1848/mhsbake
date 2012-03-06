<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveReels form">
<?php echo $this->Form->create('ArchiveReel');?>
	<fieldset>
		<legend><?php echo __('Edit Archive Reel'); ?></legend>
	<?php
		echo $this->Form->input('archive_reel_id');
		echo $this->Form->input('archive_content_id');
		echo $this->Form->input('reel_polarity');
		echo $this->Form->input('generation');
		echo $this->Form->input('redox_quality_date');
		echo $this->Form->input('redox_quality_present');
		echo $this->Form->input('scratches');
		echo $this->Form->input('quality_in');
		echo $this->Form->input('sdn_number');
		echo $this->Form->input('shipping_box');
		echo $this->Form->input('date_of_last_access');
		echo $this->Form->input('checked_out');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArchiveReel.archive_reel_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ArchiveReel.archive_reel_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
