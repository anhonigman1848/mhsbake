<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveContents form">
<?php echo $this->Form->create('ArchiveContent');?>
	<fieldset>
		<legend><?php echo __('Add Archive Content'); ?></legend>
	<?php
		echo $this->Form->input('archive_id');
		echo $this->Form->input('reel_number');
		echo $this->Form->input('begin_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('end_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('contents');
		echo $this->Form->input('comments');
		echo $this->Form->input('usage_rights');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
