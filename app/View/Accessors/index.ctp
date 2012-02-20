<div class="accessors index">
	<h2><?php echo __('Accessors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('accessor_id');?></th>
			<th><?php echo $this->Paginator->sort('name_last');?></th>
			<th><?php echo $this->Paginator->sort('name_first');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($accessors as $accessor): ?>
	<tr>
		<td><?php echo h($accessor['Accessor']['accessor_id']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['name_last']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['name_first']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['username']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['password']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['role']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['created']); ?>&nbsp;</td>
		<td><?php echo h($accessor['Accessor']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessor['Accessor']['accessor_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accessor['Accessor']['accessor_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accessor['Accessor']['accessor_id']), null, __('Are you sure you want to delete # %s?', $accessor['Accessor']['accessor_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Accessor'), array('action' => 'add')); ?></li>
	</ul>
</div>
