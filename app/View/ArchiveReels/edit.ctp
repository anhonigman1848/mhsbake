<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveReels view">
<h2><?php  echo __('Edit Archive Record');?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['aleph_number']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['series']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series Number'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['series_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Citation'); ?></dt>
		<dd>
			<?php echo h($archiveReel['Archive']['author_citation']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Reel Number'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveContent']['reel_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveContent']['begin_date']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveContent']['end_date']); ?>
			&nbsp;
		</dd>
		
		
		<dt><?php echo __('Contents'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveContent']['contents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage Rights'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveContent']['usage_rights']); ?>
			&nbsp;
		</dd>		
	</dl>
</div>
<div class="archiveReels form">
<?php echo $this->Form->create('ArchiveReel');?>
	<fieldset>
	<?php
		echo $this->Form->input('archive_reel_id');
		echo $this->Form->input('archive_content_id');
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
<div class="actions">
	<h2><?php echo __('Additional Actions'); ?></h2>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArchiveReel.archive_reel_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ArchiveReel.archive_reel_id'))); ?></li>
		<li><?php echo $this->Html->link(__('Edit Archive'), array('controller' => 'archives', 'action' => 'edit', $archiveReel['Archive']['archive_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Archive Content'), array('controller' => 'archive_contents', 'action' => 'edit', $archiveReel['ArchiveContent']['archive_content_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Copy This Record'), array('action' => 'addWithContent', $archiveReel['ArchiveContent']['archive_content_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Record for This Archive'), array('controller' => 'archive_contents', 'action' => 'addWithArchive', $archiveReel['Archive']['archive_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Record'), array('controller' => 'archive_contents', 'action' => 'addArchiveRecord')); ?> </li>
	</ul>
</div>
