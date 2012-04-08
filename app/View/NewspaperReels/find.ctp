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
echo $this->Form->hidden('deleted', array('default' => '0'));
echo $this->Form->submit(__('Search', true)/*, array('div' => false)*/);
echo $this->Form->end(); ?>	
	

	<table cellpadding="0" cellspacing="0">
	<tr>		
<!--			<th class="actions"><?php echo __('Actions');?></th>
-->			<th><input type="checkbox" id="nselectall" onclick="ntoggleChecked(this.checked)"></th>
			<th><?php echo $this->Paginator->sort('Newspaper.title','Title');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.city', 'City');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.county', 'County');?></th>
			<th><?php echo $this->Paginator->sort('Newspaper.aleph_number', 'Aleph Number');?></th>
			<th><?php echo $this->Paginator->sort('NewspaperContent.begin_date', 'Begin Date');?></th>
			<th><?php echo $this->Paginator->sort('NewspaperContent.end_date', 'End Date');?></th>
			
			<th><?php echo $this->Paginator->sort('newspaper_reel_id');?></th>
			
			
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
	</tr>
	<?php
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr id="<?php echo$newspaperRecord['NewspaperReel']['newspaper_reel_id']; ?>">
		
<!--		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'record', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newspaperRecord['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
		</td>
-->		<td><input type="checkbox" class="ncheckbox" id="<?php echo$newspaperRecord['NewspaperReel']['newspaper_reel_id']; ?>"/></td>
		
		<td class="editntitle" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['title']); ?></td>
		<td class="editncity" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['city']); ?></td>
		<td class="editncounty" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['county']); ?></td>
		<td class="editnalephnumber" id="<?php echo $newspaperRecord['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaperRecord['Newspaper']['aleph_number']); ?></td>

		<td><?php echo h($newspaperRecord['NewspaperContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperContent']['end_date']); ?>&nbsp;</td>		
		<td><?php echo h($newspaperRecord['NewspaperReel']['newspaper_reel_id']); ?>&nbsp;</td>		
		<td><?php echo h($newspaperRecord['NewspaperReel']['checked_out']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['modified']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['deleted']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('Display Selected'), array('controller' => 'newspaper_reels','action' => 'display')); ?></li>		
		<li><?php echo $this->Html->link(__('Clear All Selected'), array('controller' => 'newspaper_reels','action' => 'clear_all_check_boxes', 'find')); ?></li>		
	</ul>
</div>
