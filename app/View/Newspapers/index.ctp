<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspapers index">
	<h2><?php echo __('Newspapers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('newspaper_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('county');?></th>
			<th><?php echo $this->Paginator->sort('title_control');?></th>
			<th><?php echo $this->Paginator->sort('aleph_number');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
	</tr>
	<?php
	foreach ($newspapers as $newspaper): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $newspaper['Newspaper']['newspaper_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaper['Newspaper']['newspaper_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newspaper['Newspaper']['newspaper_id']), null, __('Are you sure you want to delete # %s?', $newspaper['Newspaper']['newspaper_id'])); ?>
		</td>
		<td><?php echo h($newspaper['Newspaper']['newspaper_id']); ?>&nbsp;</td>
		<td class="editntitle" id="<?php echo $newspaper['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaper['Newspaper']['title']); ?></td>
		<td class="editncity" id="<?php echo $newspaper['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaper['Newspaper']['city']); ?></td>
		<td class="editncounty" id="<?php echo $newspaper['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaper['Newspaper']['county']); ?></td>
		<td class="editntitlecontrol" id="<?php echo $newspaper['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaper['Newspaper']['title_control']); ?></td>
		<td class="editnalephnumber" id="<?php echo $newspaper['Newspaper']['newspaper_id']; ?>"><?php echo h($newspaper['Newspaper']['aleph_number']); ?></td>
		<td><?php echo h($newspaper['Newspaper']['created']); ?></td>
		<td><?php echo h($newspaper['Newspaper']['modified']); ?></td>
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
		<li><?php echo $this->Html->link(__('New Newspaper'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Newspaper Record'), array('controller' => 'newspaper_contents', 'action' => 'addWithAssociated')); ?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
2	</ul>
</div>
-->