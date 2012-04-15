<script>
$(function() {
$( "#datepicker1" ).datepicker({changeYear: true,
			       changeMonth: true,
			       yearRange: '1800:2032',
			       dateFormat: 'yy-mm-dd'});
});
$(function() {
$( "#datepicker2" ).datepicker({changeYear: true,
			       changeMonth: true,
			       yearRange: '1800:2032',
			       dateFormat: 'yy-mm-dd'});
});
</script>
<div class="archiveReels form">
	<h2><?php echo __('Display Selected Archive Records & Search');?></h2>
<?php $this->Access->setRole($current_user['role']);

echo $this->Form->create('ArchiveReel', array(
    'url' => array_merge(array('action' => 'find'), $this->params['pass'])
));
echo $this->Form->input('title', array('div' => false));
echo $this->Form->input('city', array('div' => false));
echo $this->Form->input('county', array('div' => false));
echo $this->Form->input('aleph_number', array('div' => false));
echo $this->Form->input('series', array('div' => false));
echo $this->Form->input('series_number', array('div' => false));
echo $this->Form->input('author_citation', array('div' => false));
echo $this->Form->input('date_from', array('id'=>'datepicker1',
					   'label' => 'Content Date From',					   
					   'div' => false,					   
					   ));		
echo $this->Form->input('date_to', array('id'=>'datepicker2',
					 'label' => 'Content Date To',					
					 'div' => false,					 					 
					 ));
echo $this->Form->input('checked_out', array('div' => false));
echo $this->Form->submit(__('Search', true));
echo $this->Form->end(); ?>	
	

	<div id="results">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><input type="checkbox" id="aselectall" onclick="atoggleChecked(this.checked)"></th>
			<th><?php echo $this->Paginator->sort('Archive.title', 'Title');?></th>
			<th><?php echo $this->Paginator->sort('Archive.city', 'City');?></th>
			<th><?php echo $this->Paginator->sort('Archive.county', 'County');?></th>
			<th><?php echo $this->Paginator->sort('Archive.aleph_number', 'aleph_number');?></th>
			<th><?php echo $this->Paginator->sort('Archive.series', 'Series');?></th>
			<th><?php echo $this->Paginator->sort('Archive.series_number', 'Series Number');?></th>
			<th><?php echo $this->Paginator->sort('Archive.author_citation', 'Author Citation');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.begin_date', 'Begin Date');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.end_date', 'End Date');?></th>			
			<th><?php echo $this->Paginator->sort('archive_reel_id');?></th>			
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
	</tr>
	<?php
	foreach ($archiveRecords as $archiveRecord): ?>
	<tr id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>">		
		<td><input type="checkbox" class="acheckbox" id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>"/></td>		
		<td><?php echo h($archiveRecord['Archive']['title']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['city']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['county']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['aleph_number']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['series']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['series_number']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['author_citation']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveContent']['end_date']); ?>&nbsp;</td>		
		<td><?php echo h($archiveRecord['ArchiveReel']['archive_reel_id']); ?>&nbsp;</td>		
		<td><?php echo h($archiveRecord['ArchiveReel']['checked_out']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveReel']['modified']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
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
<div class="bnav">
	<ul>
		<li><?php echo $this->Html->link(__('Display Selected'), array('controller' => 'archive_reels','action' => 'display_quality')); ?></li>
		<li><?php echo $this->Html->link(__('Clear All Selected'), array('controller' => 'archive_reels','action' => 'clear_all_check_boxes', 'display')); ?></li>
		<li><?php  if($this->Access->cat('inlineedit')){ echo $this->Html->link(__('Export Selected for Labels'), array('controller' => 'archive_reels','action' => 'export_selected')); } ?></li>
		<li><?php if($this->Access->cat('inlineedit')){
			       echo "<input type='button' onclick='goOfflineA(".json_encode($archiveRecords).")' value='Go offline' />"; } ?></li>
	</ul>
</div>
