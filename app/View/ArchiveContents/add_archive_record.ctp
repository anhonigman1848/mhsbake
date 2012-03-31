<?php $this->Access->setRole($current_user['role']); ?>
<div class="archives form">
<?php echo $this->Form->create('ArchiveContent');?>
	<fieldset>
		<legend><?php echo __('Add Archive'); ?></legend>
	<?php
		echo $this->Form->input('Archive.series');
		echo $this->Form->input('Archive.series_number');
		echo $this->Form->input('Archive.author_citation');
		echo $this->Form->input('Archive.title');
		echo $this->Form->input('Archive.county');
		echo $this->Form->input('Archive.city');
		echo $this->Form->input('Archive.aleph_number');
		echo $this->Form->input('ArchiveContent.reel_number');
		echo $this->Form->input('ArchiveContent.begin_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('ArchiveContent.end_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('ArchiveContent.contents');
		echo $this->Form->input('ArchiveContent.comments');
		echo $this->Form->input('ArchiveContent.usage_rights');
		echo $this->Form->input('ArchiveReel.0.reel_polarity');
		echo $this->Form->input('ArchiveReel.0.generation');
		echo $this->Form->input('ArchiveReel.0.redox_quality_date', $options = array('empty' => true));
		echo $this->Form->input('ArchiveReel.0.redox_quality_present');
		echo $this->Form->input('ArchiveReel.0.scratches');
		echo $this->Form->input('ArchiveReel.0.quality_in');
		echo $this->Form->input('ArchiveReel.0.sdn_number');
		echo $this->Form->input('ArchiveReel.0.shipping_box');
		echo $this->Form->input('ArchiveReel.0.date_of_last_access', $options = array('empty' => true));
		echo $this->Form->input('ArchiveReel.0.checked_out');
		echo $this->Form->input('ArchiveReel.0.deleted');
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