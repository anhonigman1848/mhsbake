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
echo $this->Form->submit(__('Search', true)/*, array('div' => false)*/);
echo $this->Form->end(); ?>	
	

	<table cellpadding="0" cellspacing="0">
	<tr>			
<!--			<th class="actions"><?php echo __('Actions');?></th>
-->			<th><input type="checkbox" id="aselectall" onclick="atoggleChecked(this.checked)"></th>
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
                        
                        <th><?php echo $this->Paginator->sort('archive_reel_id');?></th>
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			
	</tr>
	<?php
	foreach ($archiveRecords as $archiveRecord): ?>
	<tr id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>">		
<!--		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'record', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'editArchiveRecord', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $archiveRecord['ArchiveReel']['archive_reel_id']), null, __('Are you sure you want to delete # %s?', $archiveRecord['ArchiveReel']['archive_reel_id'])); ?>
		</td>-->
		<td><input type="checkbox" class="acheckbox" id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>"/></td>
		<td><?php echo h($archiveRecord['Archive']['title']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['city']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['county']); ?>&nbsp;</td>
		
		<td><?php echo h($archiveRecord['Archive']['series']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['series_number']); ?>&nbsp;</td>                
		<td><?php echo h($archiveRecord['ArchiveContent']['reel_number']); ?>&nbsp;</td>
                
		<td><?php echo h($archiveRecord['ArchiveContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveContent']['end_date']); ?>&nbsp;</td>
                
                <td><?php echo h($archiveRecord['ArchiveReel']['redox_quality_date']); ?>&nbsp;</td>
                <td><?php echo h($archiveRecord['ArchiveReel']['redox_quality_present']); ?>&nbsp;</td>
                
		<td><?php echo h($archiveRecord['ArchiveReel']['archive_reel_id']); ?>&nbsp;</td>		
		<td><?php echo h($archiveRecord['ArchiveReel']['checked_out']); ?>&nbsp;</td>
		
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
		<li><?php echo $this->Html->link(__('Display Selected'), array('controller' => 'archive_reels','action' => 'display_quality')); ?></li>
		<li><?php echo $this->Html->link(__('Clear All Selected'), array('controller' => 'archive_reels','action' => 'clear_all_check_boxes', 'quality')); ?></li>
	</ul>
</div>
