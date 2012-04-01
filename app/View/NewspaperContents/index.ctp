<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperContents index">
	<h2><?php echo __('Newspaper Contents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('newspaper_content_id');?></th>
			<th><?php echo $this->Paginator->sort('newspaper_id');?></th>
			<th><?php echo $this->Paginator->sort('begin_date');?></th>
			<th><?php echo $this->Paginator->sort('end_date');?></th>
			<th><?php echo $this->Paginator->sort('reel_control');?></th>
			<th><?php echo $this->Paginator->sort('gaps');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('usage_rights');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
	</tr>
	<?php
	foreach ($newspaperContents as $newspaperContent): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $newspaperContent['NewspaperContent']['newspaper_content_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaperContent['NewspaperContent']['newspaper_content_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newspaperContent['NewspaperContent']['newspaper_content_id']), null, __('Are you sure you want to delete # %s?', $newspaperContent['NewspaperContent']['newspaper_content_id'])); ?>
		</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['newspaper_content_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($newspaperContent['Newspaper']['title'], array('controller' => 'newspapers', 'action' => 'view', $newspaperContent['Newspaper']['newspaper_id'])); ?>
		</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['begin_date']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['reel_control']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['gaps']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['comments']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['usage_rights']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaperContent['NewspaperContent']['modified']); ?>&nbsp;</td>
                
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
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('controller' => 'newspapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper'), array('controller' => 'newspapers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('controller' => 'newspaper_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('controller' => 'newspaper_reels', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->