<?php $this->Access->setRole($current_user['role']); ?>
<div class="archives view">
<h2><?php  echo __('Archive');?></h2>
	<dl>
		<dt><?php echo __('Archive Id'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['archive_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['series']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series Number'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['series_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Citation'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['author_citation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="archiveContents form">
<?php echo $this->Form->create('ArchiveContent');?>
	<fieldset>
		<legend><?php echo __('Add Record for Archive ID '.$archive['Archive']['archive_id']); ?></legend>
	<?php
		echo $this->Form->hidden('ArchiveContent.archive_id', array('default' => $archive['Archive']['archive_id']));
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
		//echo $this->Form->input('ArchiveReel.0.deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
