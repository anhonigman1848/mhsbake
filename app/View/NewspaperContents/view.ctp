<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperContents view">
<h2><?php  echo __('Newspaper Content');?></h2>
	<dl>
		<dt><?php echo __('Newspaper Content Id'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['newspaper_content_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newspaper'); ?></dt>
		<dd>
			<?php echo $this->Html->link($newspaperContent['Newspaper']['title'], array('controller' => 'newspapers', 'action' => 'view', $newspaperContent['Newspaper']['newspaper_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['begin_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Control'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['reel_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gaps'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['gaps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage Rights'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['usage_rights']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['NewspaperContent']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Newspaper Content'), array('action' => 'edit', $newspaperContent['NewspaperContent']['newspaper_content_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Newspaper Content'), array('action' => 'delete', $newspaperContent['NewspaperContent']['newspaper_content_id']), null, __('Are you sure you want to delete # %s?', $newspaperContent['NewspaperContent']['newspaper_content_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('controller' => 'newspapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper'), array('controller' => 'newspapers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('controller' => 'newspaper_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('controller' => 'newspaper_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
<div class="related">
	<h3><?php echo __('Related Newspaper Reels');?></h3>
	<?php if (!empty($newspaperContent['NewspaperReel'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th class="actions"><?php echo __('Actions');?></th>
		<th><?php echo __('Newspaper Reel Id'); ?></th>
		<th><?php echo __('Newspaper Content Id'); ?></th>
		<th><?php echo __('Reel Polarity'); ?></th>
		<th><?php echo __('Generation'); ?></th>
		<th><?php echo __('Redox Quality Date'); ?></th>
		<th><?php echo __('Redox Quality Present'); ?></th>
		<th><?php echo __('Scratches'); ?></th>
		<th><?php echo __('Quality In'); ?></th>
		<th><?php echo __('Sdn Number'); ?></th>
		<th><?php echo __('Shipping Box'); ?></th>
		<th><?php echo __('Date Of Last Access'); ?></th>
		<th><?php echo __('Date Of Microfilm'); ?></th>
		<th><?php echo __('Checked Out'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($newspaperContent['NewspaperReel'] as $newspaperReel): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'newspaper_reels', 'action' => 'view', $newspaperReel['newspaper_reel_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'newspaper_reels', 'action' => 'edit', $newspaperReel['newspaper_reel_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'newspaper_reels', 'action' => 'delete', $newspaperReel['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperReel['newspaper_reel_id'])); ?>
			</td>
			<td><?php echo $newspaperReel['newspaper_reel_id'];?></td>
			<td><?php echo $newspaperReel['newspaper_content_id'];?></td>
			<td><?php echo $newspaperReel['reel_polarity'];?></td>
			<td><?php echo $newspaperReel['generation'];?></td>
			<td><?php echo $newspaperReel['redox_quality_date'];?></td>
			<td><?php echo $newspaperReel['redox_quality_present'];?></td>
			<td><?php echo $newspaperReel['scratches'];?></td>
			<td><?php echo $newspaperReel['quality_in'];?></td>
			<td><?php echo $newspaperReel['sdn_number'];?></td>
			<td><?php echo $newspaperReel['shipping_box'];?></td>
			<td><?php echo $newspaperReel['date_of_last_access'];?></td>
			<td><?php echo $newspaperReel['date_of_microfilm'];?></td>
			<td><?php echo $newspaperReel['checked_out'];?></td>
			<td><?php echo $newspaperReel['created'];?></td>
			<td><?php echo $newspaperReel['modified'];?></td>
			<td><?php echo $newspaperReel['deleted'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<!--	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('controller' => 'newspaper_reels', 'action' => 'add'));?> </li>
			<li><?php echo $this->Html->link(__('New Reel with This Content'), array('controller' => 'newspaper_reels', 'action' => 'addWithContent', $newspaperContent['NewspaperContent']['newspaper_content_id']));?> </li>
			<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
		</ul>
	</div>-->
</div>
