<?php $this->Access->setRole($current_user['role']); ?>
<div class="archiveReels index">
	<h2><?php echo __('Archive Records Expanded View');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th><?php if($this->Access->cat('selected')){ echo $this->Paginator->sort('selected');} ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php if($this->Access->cat('archive_reel_id')){ echo $this->Paginator->sort('archive_reel_id') . " ID";} ?></th>
			<th><?php if($this->Access->cat('title')){ echo $this->Paginator->sort('title');} ?></th>
                        <th><?php if($this->Access->cat('city')){ echo $this->Paginator->sort('city');} ?></th>
                        <th><?php if($this->Access->cat('county')){ echo $this->Paginator->sort('county');} ?></th>                        
                        <th><?php if($this->Access->cat('aleph_number')){ echo $this->Paginator->sort('aleph_number');} ?></th>			
			<th><?php if($this->Access->cat('series')){ echo $this->Paginator->sort('series');} ?></th>
			<th><?php if($this->Access->cat('series_number')){ echo $this->Paginator->sort('series_number');} ?></th>
			<th><?php if($this->Access->cat('author_citation')){ echo $this->Paginator->sort('author_citation');} ?></th>			
			<th><?php if($this->Access->cat('reel_number')){ echo $this->Paginator->sort('reel_number');} ?></th>
			<th><?php if($this->Access->cat('begin_date')){ echo $this->Paginator->sort('begin_date');} ?></th>			
			<th><?php if($this->Access->cat('end_date')){ echo $this->Paginator->sort('end_date');} ?></th>						
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
	</tr>
	<?php
	foreach ($archiveRecords as $archiveRecord): ?>
	<tr>		
		<td><?php if($this->Access->cat('selected')){ echo $this->Form->checkbox('selected');} ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'archive_reels', 'action' => 'record', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?>
			<?php if($this->Access->cat('edit')){
				echo $this->Html->link(__('Edit'), array('action' => 'editArchiveRecord',
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
		<td><?php if($this->Access->cat('archive_reel_id')){ echo h($archiveRecord['ArchiveReel']['archive_reel_id']);} ?>&nbsp;</td>		
		<td class="editatitle" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('title')){ echo h($archiveRecord['Archive']['title']);} ?></td>
		<td class="editacity" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('city')){ echo h($archiveRecord['Archive']['city']);} ?></td>
		<td class="editacounty" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('county')){ echo h($archiveRecord['Archive']['county']);} ?></td>		
		<td class="editaalephnumber" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('aleph_number')){ echo h($archiveRecord['Archive']['aleph_number']);} ?></td>		
		<td class="editaseries" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('series')){ echo h($archiveRecord['Archive']['series']);} ?></td>
		<td class="editaseriesnumber" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('series_number')){ echo h($archiveRecord['Archive']['series_number']);} ?></td>
		<td class="editaauthorcitation" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php if($this->Access->cat('author_citation')){ echo h($archiveRecord['Archive']['author_citation']);} ?></td>		
		<td class="editacreelnumber" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php if($this->Access->cat('reel_number')){ echo h($archiveRecord['ArchiveContent']['reel_number']);} ?></td>
		<td class="editacbegindate" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php if($this->Access->cat('begin_date')){ echo h($archiveRecord['ArchiveContent']['begin_date']);} ?></td>		
		<td class="editacenddate" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php if($this->Access->cat('end_date')){ echo h($archiveRecord['ArchiveContent']['end_date']);} ?></td>			
		<td class="editaccontents" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php if($this->Access->cat('contents')){ echo h($archiveRecord['ArchiveContent']['contents']);} ?></td>
		<td class="editaccomments" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php if($this->Access->cat('comments')){ echo h($archiveRecord['ArchiveContent']['comments']);} ?></td>
		<td class="editacusagerights" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php if($this->Access->cat('usage_rights')){ echo h($archiveRecord['ArchiveContent']['usage_rights']);} ?></td>		
		<td class="editarreelpolarity" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('reel_polarity')){ echo h($archiveRecord['ArchiveReel']['reel_polarity']);} ?></td>
		<td class="editargeneration" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('generation')){ echo h($archiveRecord['ArchiveReel']['generation']);} ?></td>
		<td class="editarredoxqualitydate" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('redox_quality_date')){ echo h($archiveRecord['ArchiveReel']['redox_quality_date']);} ?></td>
		<td class="editarredoxqualitypresent" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('redox_quality_present')){ echo h($archiveRecord['ArchiveReel']['redox_quality_present']);} ?></td>
		<td class="editarscratches" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('scratches')){ echo h($archiveRecord['ArchiveReel']['scratches']);} ?></td>
		<td class="editarqualityin" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('quality_in')){ echo h($archiveRecord['ArchiveReel']['quality_in']);} ?></td>
		<td class="editarsdnnumber" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('sdn_number')){ echo h($archiveRecord['ArchiveReel']['sdn_number']);} ?></td>
		<td class="editarshippingbox" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('shipping_box')){ echo h($archiveRecord['ArchiveReel']['shipping_box']);} ?></td>
		<td class="editardateoflastaccess" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('date_of_last_access')){ echo h($archiveRecord['ArchiveReel']['date_of_last_access']);} ?></td>
		<td class="editarcheckedout" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php if($this->Access->cat('checked_out')){ echo h($archiveRecord['ArchiveReel']['checked_out']);} ?></td>
		<td><?php if($this->Access->cat('created')){ echo h($archiveRecord['ArchiveReel']['created']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('modified')){ echo h($archiveRecord['ArchiveReel']['modified']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('deleted')){ echo h($archiveRecord['ArchiveReel']['deleted']);} ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('New Archive Record'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->