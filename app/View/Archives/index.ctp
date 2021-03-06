<?php $this->Access->setRole($current_user['role']); ?>
<div class="archives index">
	<h2><?php echo __('Archives');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('archive_id');?></th>
			<th><?php echo $this->Paginator->sort('series');?></th>
			<th><?php echo $this->Paginator->sort('series_number');?></th>
			<th><?php echo $this->Paginator->sort('author_citation');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('county');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('aleph_number');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($archives as $archive): ?>
	<tr>
		<td><?php echo h($archive['Archive']['archive_id']); ?>&nbsp;</td>
		<td class="editaseries" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['series']); ?></td>
		<td class="editaseriesnumber" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['series_number']); ?></td>
		<td class="editaauthorcitation" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['author_citation']); ?></td>
		<td class="editatitle" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['title']); ?></td>
		<td class="editacounty" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['county']); ?></td>
		<td class="editacity" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['city']); ?></td>
		<td class="editaalephnumber" id="<?php echo $archive['Archive']['archive_id']; ?>"><?php echo h($archive['Archive']['aleph_number']); ?></td>
		<td><?php echo h($archive['Archive']['created']); ?>&nbsp;</td>
		<td><?php echo h($archive['Archive']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $archive['Archive']['archive_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $archive['Archive']['archive_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $archive['Archive']['archive_id']), null, __('Are you sure you want to delete # %s?', $archive['Archive']['archive_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Archive'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Archive Record'), array('controller' => 'archive_contents', 'action' => 'addWithAssociated')); ?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
