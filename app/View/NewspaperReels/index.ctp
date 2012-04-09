<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperReels index">
	<h2><?php echo __('Newspaper Reels');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('newspaper_reel_id');?></th>
			<th><?php echo $this->Paginator->sort('newspaper_content_id');?></th>
			<th><?php echo $this->Paginator->sort('reel_polarity');?></th>
			<th><?php echo $this->Paginator->sort('generation');?></th>
			<th><?php echo $this->Paginator->sort('redox_quality_date');?></th>
			<th><?php echo $this->Paginator->sort('redox_quality_present');?></th>
			<th><?php echo $this->Paginator->sort('scratches');?></th>
			<th><?php echo $this->Paginator->sort('quality_in');?></th>
			<th><?php echo $this->Paginator->sort('sdn_number');?></th>
			<th><?php echo $this->Paginator->sort('shipping_box');?></th>
			<th><?php echo $this->Paginator->sort('date_of_last_access');?></th>
			<th><?php echo $this->Paginator->sort('date_of_microfilm');?></th>
			<th><?php echo $this->Paginator->sort('checked_out');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
	</tr>
	<?php
	foreach ($newspaperReels as $newspaperReel): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete Forever'), array('action' => 'delete', $newspaperReel['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'softdelete', $newspaperReel['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Restore'), array('action' => 'restore', $newspaperReel['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to restore # %s?', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?>
		</td>
		<td><?php echo h($newspaperReel['NewspaperReel']['newspaper_reel_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($newspaperReel['NewspaperContent']['newspaper_content_id'], array('controller' => 'newspaper_contents', 'action' => 'view', $newspaperReel['NewspaperContent']['newspaper_content_id'])); ?>
		</td>
		<td class="editnrreelpolarity" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['reel_polarity']); ?></td>
		<td class="editnrgeneration" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['generation']); ?></td>
		<td class="editnrredoxqualitydate" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['redox_quality_date']); ?></td>
		<td class="editnrredoxqualitypresent" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['redox_quality_present']); ?></td>
		<td class="editnrscratches" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['scratches']); ?></td>
		<td class="editnrqualityin" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['quality_in']); ?></td>
		<td class="editnrsdnnumber" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['sdn_number']); ?></td>
		<td class="editnrshippingbox" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['shipping_box']); ?></td>
		<td class="editnrdateoflastaccess" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['date_of_last_access']); ?></td>
		<td class="editnrdateofmicrofilm" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['date_of_microfilm']); ?></td>
		<td class="editnrcheckedout" id="<?php echo $newspaperReel['NewspaperReel']['newspaper_reel_id']; ?>"><?php echo h($newspaperReel['NewspaperReel']['checked_out']); ?></td>
		<td><?php echo h($newspaperReel['NewspaperReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaperReel['NewspaperReel']['modified']); ?>&nbsp;</td>
		<td><?php echo h($newspaperReel['NewspaperReel']['deleted']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->