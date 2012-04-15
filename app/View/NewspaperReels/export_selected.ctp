<!-- <div class="newspaperReels form"> -->
<!-- 	'Newspaper Records Selected for Label Export'   -->
<!-- This should make the view into a file download on client side, but it saves the whole html page. 
So the view may just need to be stripped down to the data.  It's from 
http://stackoverflow.com/questions/1320620/how-to-convert-mysql-table-data-to-excel-or-csv-format-in-cakephp -->
<?php 
$filename = "exported_selected_news.xls";
header('Content-type:application/vnd.ms-excel');
header('Content-disposition:attachment;filename='.$filename);
?>	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('newspaper_reel_id');?></th>			
			<th><?php echo $this->Paginator->sort('reel_polarity');?></th>			
			<th><?php echo $this->Paginator->sort('Newspaper.city', 'City');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.title','Title');?></th>
			<th><?php echo $this->Paginator->sort('NewspaperContent.begin_date', 'Begin Date');?></th>
			<th><?php echo $this->Paginator->sort('NewspaperContent.end_date', 'End Date');?></th>
<!-- 			<th><?php echo $this->Paginator->sort('deleted');?></th> -->
	</tr>
	<?php
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr id="<?php echo$newspaperRecord['NewspaperReel']['newspaper_reel_id']; ?>">		
		<td><?php echo h($newspaperRecord['NewspaperReel']['newspaper_reel_id']); ?>&nbsp;</td>		
		<td><?php echo h($newspaperRecord['NewspaperReel']['reel_polarity']); ?>&nbsp;</td>		
		<td><?php echo h($newspaperRecord['Newspaper']['city']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['Newspaper']['title']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperContent']['end_date']); ?>&nbsp;</td>		
<!-- 		<td><?php echo h($newspaperRecord['NewspaperReel']['deleted']); ?>&nbsp;</td> -->
	</tr>
<?php endforeach; ?>
	</table>
<!-- </div> -->
