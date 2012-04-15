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
<div class="newspaperReels form">
	<h2><?php echo __('Newspaper Records Search');?></h2>

<?php $this->Access->setRole($current_user['role']);

echo $this->Form->create('NewspaperReel', array(
    'url' => array_merge(array('action' => 'find'), $this->params['pass'])
));

echo $this->Form->input('title', array('div' => false));
echo $this->Form->input('city', array('div' => false));
echo $this->Form->input('county', array('div' => false));
echo $this->Form->input('aleph_number', array('div' => false));
echo $this->Form->input('date_from', array('id'=>'datepicker1',
					   'label' => 'Content Date From',					   
					   'div' => false,					   
					   ));		
echo $this->Form->input('date_to', array('id'=>'datepicker2',
					 'label' => 'Content Date To',					
					 'div' => false,					 					 
					 ));
echo $this->Form->input('checked_out', array('div' => false));

echo $this->Form->input('deleted', array('div' => 'false'));
echo $this->Form->submit(__('Search', true));
echo $this->Form->end(); ?>	
	

	<div id="results">
	<table cellpadding="0" cellspacing="0">
	<tr>		
			<th><input type="checkbox" id="nselectall" onclick="ntoggleChecked(this.checked)"></th>
			<th><?php echo $this->Paginator->sort('newspaper_reel_id');?>ID</th>
			<th><?php echo $this->Paginator->sort('Newspaper.title','Title');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.city', 'City');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.county', 'County');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.aleph_number', 'Aleph Number');?></th>
			<th><?php echo $this->Paginator->sort('NewspaperContent.begin_date', 'Begin Date');?></th>
			<th><?php echo $this->Paginator->sort('NewspaperContent.end_date', 'End Date');?></th>
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<?php  if($this->Access->cat('deleted')){ echo '<th>'.$this->Paginator->sort('deleted').'</th>'; } ?>
	</tr>
	<?php
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr id="<?php echo$newspaperRecord['NewspaperReel']['newspaper_reel_id']; ?>">
		
		<td><input type="checkbox" class="ncheckbox" id="<?php echo$newspaperRecord['NewspaperReel']['newspaper_reel_id']; ?>"/></td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['newspaper_reel_id']); ?>&nbsp;</td>
		<td <?php  if($this->Access->cat('inlineedit')){ echo 'class="editntitle"'; } ?>
		    id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['title']); ?></td>
		<td class="editncity" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['city']); ?></td>
		<td class="editncounty" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['county']); ?></td>
		<td class="editnalephnumber" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['aleph_number']); ?></td>
		<td class="editncbegindate" id="<?php echo $newspaperRecord['NewspaperContent']['begin_date']; ?>"><?php echo h($newspaperRecord['NewspaperContent']['begin_date']); ?></td>
		<td class="editncenddate" id="<?php echo $newspaperRecord['NewspaperContent']['end_date']; ?>"><?php echo h($newspaperRecord['NewspaperContent']['end_date']); ?></td>
		<td class="editnrcheckedout" id="<?php echo $newspaperRecord['NewspaperReel']['checked_out']; ?>"><?php echo h($newspaperRecord['NewspaperReel']['checked_out']); ?></td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['modified']); ?>&nbsp;</td>
		<?php  if($this->Access->cat('deleted')){ echo '<td>'.h($newspaperRecord['NewspaperReel']['deleted']).'</td>'; } ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Display Selected'), array('controller' => 'newspaper_reels','action' => 'display')); ?></li>		
		<li><?php echo $this->Html->link(__('Clear All Selected'), array('controller' => 'newspaper_reels','action' => 'clear_all_check_boxes', 'find')); ?></li>		
	</ul>
</div>
