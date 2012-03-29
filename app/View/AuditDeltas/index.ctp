<div class="auditDeltas index">
	<h2><?php echo __('Audit Deltas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('property_name');?></th>
			<th><?php echo $this->Paginator->sort('old_value');?></th>
			<th><?php echo $this->Paginator->sort('new_value');?></th>
			<th><?php echo $this->Paginator->sort('audit_id');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
	</tr>
	<?php
	foreach ($auditDeltas as $auditDelta): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $auditDelta['AuditDelta']['id'])); ?>
		</td>
		<td><?php echo h($auditDelta['AuditDelta']['property_name']); ?>&nbsp;</td>
		<td><?php echo h($auditDelta['AuditDelta']['old_value']); ?>&nbsp;</td>
		<td><?php echo h($auditDelta['AuditDelta']['new_value']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($auditDelta['Audit']['id'], array('controller' => 'audits', 'action' => 'view', $auditDelta['Audit']['id'])); ?>
		</td>
		<td><?php echo h($auditDelta['AuditDelta']['id']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('List Audits'), array('controller' => 'audits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
