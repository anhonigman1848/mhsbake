<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveReels index">
	<h2><?php echo __('Archive Records Expanded View');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php if($this->Access->cat('archive_reel_id')){ echo $this->Paginator->sort('archive_reel_id');} ?></th>
			<th><?php if($this->Access->cat('title')){ echo $this->Paginator->sort('title');} ?></th>
                        <th><?php if($this->Access->cat('city')){ echo $this->Paginator->sort('city');} ?></th>
                        <th><?php if($this->Access->cat('county')){ echo $this->Paginator->sort('county');} ?></th>                        
                        <th><?php if($this->Access->cat('aleph_number')){ echo $this->Paginator->sort('aleph_number');} ?></th>			
			<th><?php if($this->Access->cat('series')){ echo $this->Paginator->sort('series');} ?></th>
			<th><?php if($this->Access->cat('series_number')){ echo $this->Paginator->sort('series_number');} ?></th>
			<th><?php if($this->Access->cat('author_citation')){ echo $this->Paginator->sort('author_citation');} ?></th>			
			<th><?php if($this->Access->cat('reel_number')){ echo $this->Paginator->sort('reel_number');} ?></th>
			<th><?php if($this->Access->cat('begin_year')){ echo $this->Paginator->sort('begin_year');} ?></th>
			<th><?php if($this->Access->cat('begin_month')){ echo $this->Paginator->sort('begin_month');} ?></th>
			<th><?php if($this->Access->cat('end_year')){ echo $this->Paginator->sort('end_year');} ?></th>
			<th><?php if($this->Access->cat('end_month')){ echo $this->Paginator->sort('end_month');} ?></th>			
			<th><?php if($this->Access->cat('contents')){ echo $this->Paginator->sort('contents');} ?></th>
			<th><?php if($this->Access->cat('comments')){ echo $this->Paginator->sort('comments');} ?></th>			
			<th><?php if($this->Access->cat('usage_rights')){ echo $this->Paginator->sort('usage_rights');} ?></th>			
			<th><?php if($this->Access->cat('reel_polarity')){ echo $this->Paginator->sort('reel_polarity');} ?></th>
			<th><?php if($this->Access->cat('generation')){ echo $this->Paginator->sort('generation');} ?></th>
			<th><?php if($this->Access->cat('redox_quality_date')){ echo $this->Paginator->sort('redox_quality_date');} ?></th>
			<th><?php if($this->Access->cat('redox_quality_date')){ echo $this->Paginator->sort('redox_quality_present');} ?></th>
			<th><?php if($this->Access->cat('scratches')){ echo $this->Paginator->sort('scratches');} ?></th>
			<th><?php if($this->Access->cat('quality_in')){ echo $this->Paginator->sort('quality_in');} ?></th>
			<th><?php if($this->Access->cat('sdn_number')){ echo $this->Paginator->sort('sdn_number');} ?></th>
			<th><?php if($this->Access->cat('shipping_box')){ echo $this->Paginator->sort('shipping_box');} ?></th>
			<th><?php if($this->Access->cat('date_of_last_access')){ echo $this->Paginator->sort('date_of_last_access');} ?></th>
			<th><?php if($this->Access->cat('checked_out')){ echo $this->Paginator->sort('checked_out');} ?></th>
			<th><?php if($this->Access->cat('created')){ echo $this->Paginator->sort('created');} ?></th>
			<th><?php if($this->Access->cat('modified')){ echo $this->Paginator->sort('modified');} ?></th>
			<th><?php if($this->Access->cat('deleted')){ echo $this->Paginator->sort('deleted');} ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($archiveRecords as $archiveRecord): ?>
	<tr>
		<td><?php if($this->Access->cat('archive_reel_id')){ echo h($archiveRecord['ArchiveReel']['archive_reel_id']);} ?>&nbsp;</td>		
		<td><?php if($this->Access->cat('title')){ echo h($archiveRecord['Archive']['title']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('city')){ echo h($archiveRecord['Archive']['city']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('county')){ echo h($archiveRecord['Archive']['county']);} ?>&nbsp;</td>		
		<td><?php if($this->Access->cat('aleph_number')){ echo h($archiveRecord['Archive']['aleph_number']);} ?>&nbsp;</td>		
		<td><?php if($this->Access->cat('series')){ echo h($archiveRecord['Archive']['series']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('series_number')){ echo h($archiveRecord['Archive']['series_number']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('author_citation')){ echo h($archiveRecord['Archive']['author_citation']);} ?>&nbsp;</td>		
		<td><?php if($this->Access->cat('reel_number')){ echo h($archiveRecord['ArchiveContent']['reel_number']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('begin_year')){ echo h($archiveRecord['ArchiveContent']['begin_year']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('begin_month')){ echo h($archiveRecord['ArchiveContent']['begin_month']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('end_year')){ echo h($archiveRecord['ArchiveContent']['end_year']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('end_month')){ echo h($archiveRecord['ArchiveContent']['end_month']);} ?>&nbsp;</td>		
		<td><?php if($this->Access->cat('contents')){ echo h($archiveRecord['ArchiveContent']['contents']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('comments')){ echo h($archiveRecord['ArchiveContent']['comments']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('usage_rights')){ echo h($archiveRecord['ArchiveContent']['usage_rights']);} ?>&nbsp;</td>		
		<td><?php if($this->Access->cat('reel_polarity')){ echo h($archiveRecord['ArchiveReel']['reel_polarity']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('generation')){ echo h($archiveRecord['ArchiveReel']['generation']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('redox_quality_date')){ echo h($archiveRecord['ArchiveReel']['redox_quality_date']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('redox_quality_present')){ echo h($archiveRecord['ArchiveReel']['redox_quality_present']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('scratches')){ echo h($archiveRecord['ArchiveReel']['scratches']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('quality_in')){ echo h($archiveRecord['ArchiveReel']['quality_in']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('sdn_number')){ echo h($archiveRecord['ArchiveReel']['sdn_number']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('shipping_box')){ echo h($archiveRecord['ArchiveReel']['shipping_box']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('date_of_last_access')){ echo h($archiveRecord['ArchiveReel']['date_of_last_access']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('checked_out')){ echo h($archiveRecord['ArchiveReel']['checked_out']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('created')){ echo h($archiveRecord['ArchiveReel']['created']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('modified')){ echo h($archiveRecord['ArchiveReel']['modified']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('deleted')){ echo h($archiveRecord['ArchiveReel']['deleted']);} ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'archive_reels', 'action' => 'record', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?>
			<?php if($this->Access->cat('edit')){
				echo $this->Html->link(__('Edit'), array('action' => 'edit',
					$archiveRecord['ArchiveReel']['archive_reel_id']));} ?>
			<?php if($this->Access->cat('deleted')){
				echo $this->Form->postLink(__('Delete Forever'), array('action' => 'delete',
					$archiveRecord['ArchiveReel']['archive_reel_id']), null,
					__('Are you sure you want to delete # %s?',
					$archiveRecord['ArchiveReel']['archive_reel_id']));} ?>
			<?php if($this->Access->cat('soft_delete')){
				echo $this->Form->postLink(__('Delete'), array('action' => 'softdelete',
					$archiveRecord['ArchiveReel']['archive_reel_id']), null,
					__('Are you sure you want to delete # %s?',
					$archiveRecord['ArchiveReel']['archive_reel_id']));} ?>
			<?php if($this->Access->cat('deleted')){
				echo $this->Form->postLink(__('Restore'), array('action' => 'restore',
					$archiveRecord['ArchiveReel']['archive_reel_id']), null,
					__('Are you sure you want to restore # %s?',
					$archiveRecord['ArchiveReel']['archive_reel_id']));} ?>
		</td>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Archive Record'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
