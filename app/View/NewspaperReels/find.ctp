
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
echo $this->Form->input('date_from',
		array('type' => 'date', 'dateFormat' => 'YMD', 'label' => 'Content Date From', 'empty' => true));
echo $this->Form->input('date_to',
		array('type' => 'date', 'dateFormat' => 'YMD', 'label' => 'Content Date To', 'empty' => true));
echo $this->Form->submit(__('Search', true), array('div' => false));
echo $this->Form->end(); ?>	
	

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('county');?></th>
			<th><?php echo $this->Paginator->sort('aleph_number');?></th>
			<th><?php echo $this->Paginator->sort('begin_date');?></th>
			<th><?php echo $this->Paginator->sort('end_date');?></th>
			
			<th><?php echo $this->Paginator->sort('newspaper_reel_id');?></th>
			<th><?php echo $this->Paginator->sort('newspaper_content_id');?></th>
			
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr>		
		<td><?php echo h($newspaperRecord['Newspaper']['title']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['Newspaper']['city']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['Newspaper']['county']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['Newspaper']['aleph_number']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperContent']['end_date']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($newspaperRecord['NewspaperReel']['newspaper_reel_id'], array('controller' => 'newspaper_reels', 'action' => 'view', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($newspaperRecord['NewspaperContent']['newspaper_content_id'], array('controller' => 'newspaper_contents', 'action' => 'view', $newspaperRecord['NewspaperContent']['newspaper_content_id'])); ?>
		</td>
		
		<td><?php echo h($newspaperRecord['NewspaperReel']['checked_out']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['modified']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'record', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newspaperRecord['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>