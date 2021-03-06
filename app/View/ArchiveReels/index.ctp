<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveReels index">
	<h2><?php echo __('Archive Reels');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('archive_reel_id');?></th>
			<th><?php echo $this->Paginator->sort('archive_content_id');?></th>
			<th><?php echo $this->Paginator->sort('reel_polarity');?></th>
			<th><?php echo $this->Paginator->sort('generation');?></th>
			<th><?php echo $this->Paginator->sort('redox_quality_date');?></th>
			<th><?php echo $this->Paginator->sort('redox_quality_present');?></th>
			<th><?php echo $this->Paginator->sort('scratches');?></th>
			<th><?php echo $this->Paginator->sort('quality_in');?></th>
			<th><?php echo $this->Paginator->sort('sdn_number');?></th>
			<th><?php echo $this->Paginator->sort('shipping_box');?></th>
			<th><?php echo $this->Paginator->sort('date_of_last_access');?></th>
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
	</tr>
	<?php
	foreach ($archiveReels as $archiveReel): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $archiveReel['ArchiveReel']['archive_reel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'editArchiveRecord', $archiveReel['ArchiveReel']['archive_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $archiveReel['ArchiveReel']['archive_reel_id']), null, __('Are you sure you want to delete # %s?', $archiveReel['ArchiveReel']['archive_reel_id'])); ?>
		</td>
		<td><?php echo h($archiveReel['ArchiveReel']['archive_reel_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($archiveReel['ArchiveContent']['archive_content_id'], array('controller' => 'archive_contents', 'action' => 'view', $archiveReel['ArchiveContent']['archive_content_id'])); ?>
		</td>
		<td class="editarreelpolarity" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['reel_polarity']); ?></td>
		<td class="editargeneration" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['generation']); ?></td>
		<td class="editarredoxqualitydate" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['redox_quality_date']); ?></td>
		<td class="editarredoxqualitypresent" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['redox_quality_present']); ?></td>
		<td class="editarscratches" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['scratches']); ?></td>
		<td class="editarqualityin" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['quality_in']); ?></td>
		<td class="editarsdnnumber" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['sdn_number']); ?></td>
		<td class="editarshippingbox" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['shipping_box']); ?></td>
		<td class="editardateoflastaccess" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['date_of_last_access']); ?></td>
		<td class="editarcheckedout" id="<?php echo $archiveReel['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveReel['ArchiveReel']['checked_out']); ?></td>
		<td><?php echo h($archiveReel['ArchiveReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($archiveReel['ArchiveReel']['modified']); ?>&nbsp;</td>
		<td><?php echo h($archiveReel['ArchiveReel']['deleted']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->