<div class="newspapers view">
<h2><?php  echo __('Newspaper');?></h2>
	<dl>
		<dt><?php echo __('Newspaper Id'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['newspaper_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title Control'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['title_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Newspaper'), array('action' => 'edit', $newspaper['Newspaper']['newspaper_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Newspaper'), array('action' => 'delete', $newspaper['Newspaper']['newspaper_id']), null, __('Are you sure you want to delete # %s?', $newspaper['Newspaper']['newspaper_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Newspaper Contents');?></h3>
	<?php if (!empty($newspaper['NewspaperContent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Newspaper Content Id'); ?></th>
		<th><?php echo __('Newspaper Id'); ?></th>
		<th><?php echo __('Begin Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Reel Control'); ?></th>
		<th><?php echo __('Gaps'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Usage Rights'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($newspaper['NewspaperContent'] as $newspaperContent): ?>
		<tr>
			<td><?php echo $newspaperContent['newspaper_content_id'];?></td>
			<td><?php echo $newspaperContent['newspaper_id'];?></td>
			<td><?php echo $newspaperContent['begin_date'];?></td>
			<td><?php echo $newspaperContent['end_date'];?></td>
			<td><?php echo $newspaperContent['reel_control'];?></td>
			<td><?php echo $newspaperContent['gaps'];?></td>
			<td><?php echo $newspaperContent['comments'];?></td>
			<td><?php echo $newspaperContent['usage_rights'];?></td>
			<td><?php echo $newspaperContent['created'];?></td>
			<td><?php echo $newspaperContent['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'newspaper_contents', 'action' => 'view', $newspaperContent['newspaper_content_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'newspaper_contents', 'action' => 'edit', $newspaperContent['newspaper_content_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'newspaper_contents', 'action' => 'delete', $newspaperContent['newspaper_content_id']), null, __('Are you sure you want to delete # %s?', $newspaperContent['newspaper_content_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
