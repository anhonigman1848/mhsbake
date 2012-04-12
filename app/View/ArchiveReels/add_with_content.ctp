<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveContents view">
<h2><?php  echo __('Archive Content');?></h2>
	<dl>
		<dt><?php echo __('Archive'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['series']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series Number'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['series_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Citation'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['author_citation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($archiveContent['Archive']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Number'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['reel_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['begin_date']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['end_date']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Contents'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['contents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage Rights'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['usage_rights']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="archiveReels form">
<?php echo $this->Form->create('ArchiveReel');?>
	<fieldset>
		<legend><?php echo __('Add Archive Reel with Archive Content ID '.$archiveContent['ArchiveContent']['archive_content_id']); ?></legend>
	<?php
		echo $this->Form->hidden('archive_content_id', array('default' => $archiveContent['ArchiveContent']['archive_content_id']));
		echo $this->Form->input('reel_polarity');
		echo $this->Form->input('generation');
		echo $this->Form->input('redox_quality_date', $options = array('empty' => true));
		echo $this->Form->input('redox_quality_present');
		echo $this->Form->input('scratches');
		echo $this->Form->input('quality_in');
		echo $this->Form->input('sdn_number');
		echo $this->Form->input('shipping_box');
		echo $this->Form->input('date_of_last_access', $options = array('empty' => true));
		echo $this->Form->input('checked_out');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
