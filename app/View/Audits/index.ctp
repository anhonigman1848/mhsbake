<?php $this->Access->setRole($current_user['role']); ?>
<div class="audits index">
	<h2><?php echo __('Audits');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('source_id');?></th>
			<th><?php echo $this->Paginator->sort('event');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('entity_id');?></th>
			<th><?php echo $this->Paginator->sort('audit.json_object', 'Attribute:Value Pairs');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
	</tr>
	<?php
	foreach ($audits as $audit): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $audit['Audit']['id'])); ?>
		</td>
		<td><?php echo h($audit['Audit']['created']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['source_id']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['event']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['model']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['entity_id']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['json_object']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['id']); ?>&nbsp;</td>
		<td><?php echo h($audit['Audit']['description']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('List Audit Deltas'), array('controller' => 'audit_deltas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
