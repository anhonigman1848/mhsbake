<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveReels view">
<h2><?php  echo __('Archive Reel');?></h2>
	<dl>
		<dt><?php echo __('Archive Reel Id'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['archive_reel_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archive Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($archiveReel['ArchiveContent']['archive_content_id'], array('controller' => 'archive_contents', 'action' => 'view', $archiveReel['ArchiveContent']['archive_content_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Polarity'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['reel_polarity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generation'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['generation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Date'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['redox_quality_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Present'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['redox_quality_present']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scratches'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['scratches']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quality In'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['quality_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sdn Number'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['sdn_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Box'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['shipping_box']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Last Access'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['date_of_last_access']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checked Out'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['checked_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($archiveReel['ArchiveReel']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archive Reel'), array('action' => 'edit', $archiveReel['ArchiveReel']['archive_reel_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Archive Reel'), array('action' => 'delete', $archiveReel['ArchiveReel']['archive_reel_id']), null, __('Are you sure you want to delete # %s?', $archiveReel['ArchiveReel']['archive_reel_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->