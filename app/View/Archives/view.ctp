<?php $this->Access->setRole($current_user['role']); ?>
<div class="archives view">
<h2><?php  echo __('Archive');?></h2>
	<dl>
		<dt><?php echo __('Archive Id'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['archive_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['series']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series Number'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['series_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Citation'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['author_citation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Archive'), array('action' => 'edit', $archive['Archive']['archive_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Archive'), array('action' => 'delete', $archive['Archive']['archive_id']), null, __('Are you sure you want to delete # %s?', $archive['Archive']['archive_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Archives'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Archive Contents');?></h3>
	<?php if (!empty($archive['ArchiveContent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Archive Content Id'); ?></th>
		<th><?php echo __('Archive Id'); ?></th>
		<th><?php echo __('Reel Number'); ?></th>
		<th><?php echo __('Begin Year'); ?></th>
		<th><?php echo __('Begin Month'); ?></th>
		<th><?php echo __('End Year'); ?></th>
		<th><?php echo __('End Month'); ?></th>
		<th><?php echo __('Contents'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Usage Rights'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($archive['ArchiveContent'] as $archiveContent): ?>
		<tr>
			<td><?php echo $archiveContent['archive_content_id'];?></td>
			<td><?php echo $archiveContent['archive_id'];?></td>
			<td><?php echo $archiveContent['reel_number'];?></td>
			<td><?php echo $archiveContent['begin_year'];?></td>
			<td><?php echo $archiveContent['begin_month'];?></td>
			<td><?php echo $archiveContent['end_year'];?></td>
			<td><?php echo $archiveContent['end_month'];?></td>
			<td><?php echo $archiveContent['contents'];?></td>
			<td><?php echo $archiveContent['comments'];?></td>
			<td><?php echo $archiveContent['usage_rights'];?></td>
			<td><?php echo $archiveContent['created'];?></td>
			<td><?php echo $archiveContent['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'archive_contents', 'action' => 'view', $archiveContent['archive_content_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'archive_contents', 'action' => 'edit', $archiveContent['archive_content_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'archive_contents', 'action' => 'delete', $archiveContent['archive_content_id']), null, __('Are you sure you want to delete # %s?', $archiveContent['archive_content_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add'));?> </li>
			<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
		</ul>
	</div>
</div>
