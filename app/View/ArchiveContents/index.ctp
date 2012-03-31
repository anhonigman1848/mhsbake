<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveContents index">
	<h2><?php echo __('Archive Contents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('archive_content_id');?></th>
			<th><?php echo $this->Paginator->sort('archive_id');?></th>
			<th><?php echo $this->Paginator->sort('reel_number');?></th>
			<th><?php echo $this->Paginator->sort('begin_date');?></th>			
			<th><?php echo $this->Paginator->sort('end_date');?></th>			
			<th><?php echo $this->Paginator->sort('contents');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('usage_rights');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
	</tr>
	<?php
	foreach ($archiveContents as $archiveContent): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $archiveContent['ArchiveContent']['archive_content_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $archiveContent['ArchiveContent']['archive_content_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $archiveContent['ArchiveContent']['archive_content_id']), null, __('Are you sure you want to delete # %s?', $archiveContent['ArchiveContent']['archive_content_id'])); ?>
		</td>
		<td><?php echo h($archiveContent['ArchiveContent']['archive_content_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($archiveContent['Archive']['title'], array('controller' => 'archives', 'action' => 'view', $archiveContent['Archive']['archive_id'])); ?>
		</td>
		<td><?php echo h($archiveContent['ArchiveContent']['reel_number']); ?>&nbsp;</td>
		<td><?php echo h($archiveContent['ArchiveContent']['begin_date']); ?>&nbsp;</td>		
		<td><?php echo h($archiveContent['ArchiveContent']['end_date']); ?>&nbsp;</td>		
		<td><?php echo h($archiveContent['ArchiveContent']['contents']); ?>&nbsp;</td>
		<td><?php echo h($archiveContent['ArchiveContent']['comments']); ?>&nbsp;</td>
		<td><?php echo h($archiveContent['ArchiveContent']['usage_rights']); ?>&nbsp;</td>
		<td><?php echo h($archiveContent['ArchiveContent']['created']); ?>&nbsp;</td>
		<td><?php echo h($archiveContent['ArchiveContent']['modified']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Archives'), array('controller' => 'archives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive'), array('controller' => 'archives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('controller' => 'archive_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('controller' => 'archive_reels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->