<?php $this->Access->setRole($current_user['role']); ?>
<h2><?php  echo __('Edit Archive Record');?></h2>
<div class="archives form">
<?php echo $this->Form->create('ArchiveReel');?>
	<fieldset>
		<legend><?php echo __('Archive Fields (edits will change multiple records)'); ?></legend>
	<?php
		echo $this->Form->hidden('Archive.archive_id');
		echo $this->Form->input('Archive.series');
		echo $this->Form->input('Archive.series_number');
		echo $this->Form->input('Archive.author_citation');
		echo $this->Form->input('Archive.title');
		echo $this->Form->input('Archive.county');
		echo $this->Form->input('Archive.city');
		echo $this->Form->input('Archive.aleph_number');
	?>
	</fieldset>
	<fieldset>
		<legend><?php echo __('Content Fields (edits will change multiple records)'); ?></legend>
	<?php
		echo $this->Form->hidden('ArchiveContent.archive_content_id');
		echo $this->Form->hidden('Archive.archive_id');
		echo $this->Form->input('ArchiveContent.reel_number');
		echo $this->Form->input('ArchiveContent.begin_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('ArchiveContent.end_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('ArchiveContent.contents');
		echo $this->Form->input('ArchiveContent.comments');
		echo $this->Form->input('ArchiveContent.usage_rights');
	?>
	</fieldset>
	<fieldset>
		<legend><?php echo __('Reel Fields (edits will change this record only)'); ?></legend>
	<?php
		echo $this->Form->hidden('ArchiveReel.archive_reel_id');
		echo $this->Form->hidden('ArchiveContent.archive_content_id');
		echo $this->Form->input('ArchiveReel.reel_polarity');
		echo $this->Form->input('ArchiveReel.generation');
		echo $this->Form->input('ArchiveReel.redox_quality_date', $options = array('empty' => true));
		echo $this->Form->input('ArchiveReel.redox_quality_present');
		echo $this->Form->input('ArchiveReel.scratches');
		echo $this->Form->input('ArchiveReel.quality_in');
		echo $this->Form->input('ArchiveReel.sdn_number');
		echo $this->Form->input('ArchiveReel.shipping_box');
		echo $this->Form->input('ArchiveReel.date_of_last_access', $options = array('empty' => true));
		echo $this->Form->input('ArchiveReel.checked_out');
		echo $this->Form->input('ArchiveReel.deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Archives'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->