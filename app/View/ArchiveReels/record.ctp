<?php $this->Access->setRole($current_user['role']); ?>
<div class="subnav">
<h2>Actions</h2>
  <ul>
	<li><?php echo $this->Html->link(__('Edit Record'), array('action' => 'editArchiveRecord', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?></li>
	<li><?php echo $this->Form->postLink(__('Delete Record'), array('action' => 'softdelete', $archiveRecord['ArchiveReel']['archive_reel_id']), null, __('Are you sure you want to delete # %s?', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?></li>
	<li><?php echo $this->Form->postLink(__('Delete Forever'), array('action' => 'delete', $archiveRecord['ArchiveReel']['archive_reel_id']), null, __('Are you sure you want to PERMANENTLY delete # %s?', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?></li>
	<li><?php echo $this->Html->link(__('Copy Record'), array('action' => 'addWithContent', $archiveRecord['ArchiveContent']['archive_content_id'])); ?> </li>
	<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'archive_contents', 'action' => 'addWithArchive', $archiveRecord['Archive']['archive_id'])); ?> </li>
  </ul>

</div>
<div class="archiveReels viewFloatRight">
<h2><?php  echo __('Archive Record');?></h2>
	<dl>
		<dt><?php echo __('Archive Reel Id'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['archive_reel_id']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['aleph_number']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['series']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series Number'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['series_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Citation'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['Archive']['author_citation']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Reel Number'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['reel_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['begin_date']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['end_date']); ?>
			&nbsp;
		</dd>
		
		
		<dt><?php echo __('Contents'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['contents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage Rights'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['usage_rights']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Reel Polarity'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['reel_polarity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generation'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['generation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Date'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['redox_quality_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Present'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['redox_quality_present']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scratches'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['scratches']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quality In'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['quality_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sdn Number'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['sdn_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Box'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['shipping_box']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Last Access'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['date_of_last_access']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checked Out'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['checked_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveReel']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
