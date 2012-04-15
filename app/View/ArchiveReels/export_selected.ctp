<!-- <div class="archiveReels form"> -->
<!-- 	'Archive Records Selected for Label Export'   -->
<!-- This should make the view into a file download on client side, but it saves the whole html page. 
So the view may just need to be stripped down to the data.  It's from 
http://stackoverflow.com/questions/1320620/how-to-convert-mysql-table-data-to-excel-or-csv-format-in-cakephp -->
<?php 
$filename = "exported_selected_arch.xls";
header('Content-type:application/vnd.ms-excel');
header('Content-disposition:attachment;filename='.$filename);
?>	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('archive_reel_id');?></th>			
			<th><?php echo $this->Paginator->sort('reel_polarity');?></th>			
			<th><?php echo $this->Paginator->sort('Archive.series', 'Series');?></th>
			<th><?php echo $this->Paginator->sort('Archive.series_number', 'Series Number');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.reel_number', 'Reel/Roll Number');?></th>
			<th><?php echo $this->Paginator->sort('Archive.title', 'Title');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.begin_date', 'Begin Date');?></th>
			<th><?php echo $this->Paginator->sort('ArchiveContent.end_date', 'End Date');?></th>			
<!-- 			<th><?php echo $this->Paginator->sort('deleted');?></th> -->
	</tr>
	<?php
	foreach ($archiveRecords as $archiveRecord): ?>
	<tr id="<?php echo$archiveRecord['ArchiveReel']['archive_reel_id']; ?>">		
		<td><?php echo h($archiveRecord['ArchiveReel']['archive_reel_id']); ?>&nbsp;</td>		
		<td><?php echo h($archiveRecord['ArchiveReel']['reel_polarity']); ?>&nbsp;</td>		
		<td><?php echo h($archiveRecord['Archive']['series']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['series_number']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveContent']['reel_number']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['Archive']['title']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($archiveRecord['ArchiveContent']['end_date']); ?>&nbsp;</td>		
<!-- 		<td><?php echo h($archiveRecord['ArchiveReel']['deleted']); ?>&nbsp;</td> -->
	</tr>
<?php endforeach; ?>
	</table>
<!-- </div> -->
