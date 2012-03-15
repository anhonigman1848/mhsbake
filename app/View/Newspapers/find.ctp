<div class="newspapers index">

	<h2><?php echo __('Search Newspapers');?></h2>


<?php $this->Access->setRole($current_user['role']); 

echo $this->Form->create('Newspaper', array(
    'url' => array_merge(array('action' => 'find'), $this->params['pass'])
));
echo $this->Form->input('title', array('div' => false));
echo $this->Form->input('city', array('div' => false));
echo $this->Form->input('county', array('div' => false));
echo $this->Form->input('aleph_number', array('div' => false));
echo $this->Form->submit(__('Search', true), array('div' => false));
echo $this->Form->end(); ?>


	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('newspaper_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('county');?></th>
			<th><?php echo $this->Paginator->sort('title_control');?></th>
			<th><?php echo $this->Paginator->sort('aleph_number');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($newspapers as $newspaper): ?>
	<tr>
		<td><?php echo h($newspaper['Newspaper']['newspaper_id']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['title']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['city']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['county']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['title_control']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['aleph_number']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaper['Newspaper']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $newspaper['Newspaper']['newspaper_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaper['Newspaper']['newspaper_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newspaper['Newspaper']['newspaper_id']), null, __('Are you sure you want to delete # %s?', $newspaper['Newspaper']['newspaper_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Newspaper'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>