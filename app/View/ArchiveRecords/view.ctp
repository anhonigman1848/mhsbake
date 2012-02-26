<div class="archiveRecords view">
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
		<dt><?php echo __('Begin Year'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['begin_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Month'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['begin_month']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Year'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['end_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Month'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['end_month']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('End Month'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['contents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Month'); ?></dt>
		<dd>
			<?php echo h($archiveRecord['ArchiveContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Month'); ?></dt>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archive Record'), array('action' => 'edit', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Archive Reel'), array('action' => 'delete', $archiveRecord['ArchiveReel']['archive_reel_id']), null, __('Are you sure you want to delete # %s?', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Records'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Record'), array('action' => 'add')); ?> </li>		
	</ul>
</div>
