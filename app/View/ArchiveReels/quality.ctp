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
$(function() {
$( "#datepicker3" ).datepicker({changeYear: true,
			       changeMonth: true,
			       yearRange: '1800:2032',
			       dateFormat: 'yy-mm-dd'});
});
$(function() {
$( "#datepicker4" ).datepicker({changeYear: true,
			       changeMonth: true,
			       yearRange: '1800:2032',
			       dateFormat: 'yy-mm-dd'});
});
</script>
<div class="archiveReels form">
	<h2><?php echo __('Archive Records Quality Search');?></h2>
<?php $this->Access->setRole($current_user['role']);

echo $this->Form->create('ArchiveReel', array(
    'url' => array_merge(array('action' => 'quality'), $this->params['pass'])
));
echo $this->Form->input('title', array('div' => false));
echo $this->Form->input('city', array('div' => false));
echo $this->Form->input('county', array('div' => false));

echo $this->Form->input('series', array('div' => false));
echo $this->Form->input('series_number', array('div' => false));
echo $this->Form->input('reel_number', array('div' => false));
echo $this->Form->input('date_from', array('id'=>'datepicker1',
					   'label' => 'Content Date From',					   
					   'div' => false,					   
					   ));		
echo $this->Form->input('date_to', array('id'=>'datepicker2',
					 'label' => 'Content Date To',					
					 'div' => false,					 					 
					 ));
echo $this->Form->input('redox_from', array('id'=>'datepicker3',
					   'label' => 'Redox Date From',					   
					   'div' => false,					   
					   ));		
echo $this->Form->input('redox_to', array('id'=>'datepicker4',
					 'label' => 'Redox Date To',					
					 'div' => false,					 					 
					 ));
echo $this->Form->input('redox_quality_present', array('div' => false));
echo $this->Form->input('checked_out', array('div' => false));
echo $this->Form->input('deleted', array('div' => 'false'));
echo $this->Form->submit(__('Search', true));
echo $this->Form->end(); ?>	
	

	<div id="results">
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th><input type="checkbox" id="aselectall" onclick="atoggleChecked(this.checked)"></th>
                        <th><?php echo $this->Paginator->sort('archive_reel_id') . " ID";?></th>
			<th><?php echo $this->Paginator->sort('Archive.title', 'Title');?></th>
			<th><?php echo $this->Paginator->sort('Archive.city', 'City');?></th>
			<th><?php echo $this->Paginator->sort('Archive.county', 'County');?></th>
			
			<th><?php echo $this->Paginator->sort('Archive.series', 'Series');?></th>
			<th><?php echo $this->Paginator->sort('Archive.series_number', 'Series Number');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.reel_number', 'Reel Number');?></th>
                        
			<th><?php echo $this->Paginator->sort('ArchiveContent.begin_date', 'Begin Date');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.end_date', 'End Date');?></th>			
			
                        <th><?php echo $this->Paginator->sort('redox_quality_date');?></th>
                        <th><?php echo $this->Paginator->sort('redox_quality_present');?></th>
                        
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			
	</tr>
	<?php
	foreach ($archiveRecords as $archiveRecord): ?>
	<tr id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>">		
		<td><input type="checkbox" class="acheckbox" id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>"/></td>
		<td><?php echo h($archiveRecord['ArchiveReel']['archive_reel_id']); ?></td>
		<td class="editatitle" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php echo h($archiveRecord['Archive']['title']); ?></td>
		<td class="editacity" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php echo h($archiveRecord['Archive']['city']); ?></td>
		<td class="editacounty" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php echo h($archiveRecord['Archive']['county']); ?></td>
		
		<td class="editaseries" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php echo h($archiveRecord['Archive']['series']); ?></td>
		<td class="editaseriesnumber" id="<?php echo $archiveRecord['Archive']['archive_id']; ?>"><?php echo h($archiveRecord['Archive']['series_number']); ?></td>                
		<td class="editacreelnumber" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php echo h($archiveRecord['ArchiveContent']['reel_number']); ?></td>
                
		<td class="editacbegindate" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php echo h($archiveRecord['ArchiveContent']['begin_date']); ?></td>
		<td class="editacenddate" id="<?php echo $archiveRecord['ArchiveContent']['archive_content_id']; ?>"><?php echo h($archiveRecord['ArchiveContent']['end_date']); ?></td>
                
                <td class="editarredoxqualitydate" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveRecord['ArchiveReel']['redox_quality_date']); ?></td>
                <td class="editarredoxqualitypresent" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveRecord['ArchiveReel']['redox_quality_present']); ?></td>
                		
		<td class="editarcheckedout" id="<?php echo $archiveRecord['ArchiveReel']['archive_reel_id']; ?>"><?php echo h($archiveRecord['ArchiveReel']['checked_out']); ?></td>
		
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
		<li><?php echo $this->Html->link(__('Clear All Selected'), array('controller' => 'archive_reels','action' => 'clear_all_check_boxes', 'quality')); ?></li>
	</ul>
</div>
