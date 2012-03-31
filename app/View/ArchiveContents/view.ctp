<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveContents view">
<h2><?php  echo __('Archive Content');?></h2>
	<dl>
		<dt><?php echo __('Archive Content Id'); ?></dt>
		<dd>
			<?php echo h($archiveContent['ArchiveContent']['archive_content_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archive'); ?></dt>
		<dd>
			<?php echo $this->Html->link($archiveContent['Archive']['title'], array('controller' => 'archives', 'action' => 'view', $archiveContent['Archive']['archive_id'])); ?>
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
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archive Content'), array('action' => 'edit', $archiveContent['ArchiveContent']['archive_content_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Archive Content'), array('action' => 'delete', $archiveContent['ArchiveContent']['archive_content_id']), null, __('Are you sure you want to delete # %s?', $archiveContent['ArchiveContent']['archive_content_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archives'), array('controller' => 'archives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive'), array('controller' => 'archives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('controller' => 'archive_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('controller' => 'archive_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>
--><div class="related">
	<h3><?php echo __('Related Archive Reels');?></h3>
	<?php if (!empty($archiveContent['ArchiveReel'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th class="actions"><?php echo __('Actions');?></th>
		<th><?php echo __('Archive Reel Id'); ?></th>
		<th><?php echo __('Archive Content Id'); ?></th>
		<th><?php echo __('Reel Polarity'); ?></th>
		<th><?php echo __('Generation'); ?></th>
		<th><?php echo __('Redox Quality Date'); ?></th>
		<th><?php echo __('Redox Quality Present'); ?></th>
		<th><?php echo __('Scratches'); ?></th>
		<th><?php echo __('Quality In'); ?></th>
		<th><?php echo __('Sdn Number'); ?></th>
		<th><?php echo __('Shipping Box'); ?></th>
		<th><?php echo __('Date Of Last Access'); ?></th>
		<th><?php echo __('Checked Out'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($archiveContent['ArchiveReel'] as $archiveReel): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'archive_reels', 'action' => 'view', $archiveReel['archive_reel_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'archive_reels', 'action' => 'edit', $archiveReel['archive_reel_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'archive_reels', 'action' => 'delete', $archiveReel['archive_reel_id']), null, __('Are you sure you want to delete # %s?', $archiveReel['archive_reel_id'])); ?>
			</td>
			<td><?php echo $archiveReel['archive_reel_id'];?></td>
			<td><?php echo $archiveReel['archive_content_id'];?></td>
			<td><?php echo $archiveReel['reel_polarity'];?></td>
			<td><?php echo $archiveReel['generation'];?></td>
			<td><?php echo $archiveReel['redox_quality_date'];?></td>
			<td><?php echo $archiveReel['redox_quality_present'];?></td>
			<td><?php echo $archiveReel['scratches'];?></td>
			<td><?php echo $archiveReel['quality_in'];?></td>
			<td><?php echo $archiveReel['sdn_number'];?></td>
			<td><?php echo $archiveReel['shipping_box'];?></td>
			<td><?php echo $archiveReel['date_of_last_access'];?></td>
			<td><?php echo $archiveReel['checked_out'];?></td>
			<td><?php echo $archiveReel['created'];?></td>
			<td><?php echo $archiveReel['modified'];?></td>
			<td><?php echo $archiveReel['deleted'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<!--	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Archive Reel'), array('controller' => 'archive_reels', 'action' => 'add'));?> </li>
			<li><?php echo $this->Html->link(__('New Reel with This Content'), array('controller' => 'archive_reels', 'action' => 'addWithContent', $archiveContent['ArchiveContent']['archive_content_id']));?> </li>
			<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
		</ul>
	</div>-->
</div>
