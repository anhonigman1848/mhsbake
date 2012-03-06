<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperRecords index">
	<h2><?php echo __('Newspaper Records Expanded View');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('newspaper_reel_id');?></th>
                        <th><?php echo $this->Paginator->sort('title');?></th>
                        <th><?php echo $this->Paginator->sort('city');?></th>
                        <th><?php echo $this->Paginator->sort('county');?></th>
                        <th><?php echo $this->Paginator->sort('title_control');?></th>
                        <th><?php echo $this->Paginator->sort('aleph_number');?></th>
			<th><?php echo $this->Paginator->sort('begin_date');?></th>
                        <th><?php echo $this->Paginator->sort('end_date');?></th>
                        <th><?php echo $this->Paginator->sort('reel_control');?></th>
                        <th><?php echo $this->Paginator->sort('gaps');?></th>
                        <th><?php echo $this->Paginator->sort('comments');?></th>
                        <th><?php echo $this->Paginator->sort('usage_rights');?></th>
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
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php 
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr>
		<td><?php echo h($newspaperRecord['NewspaperReel']['newspaper_reel_id']); ?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['Newspaper']['title']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['Newspaper']['city']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['Newspaper']['county']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['Newspaper']['title_control']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['Newspaper']['aleph_number']);?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperContent']['begin_date']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['NewspaperContent']['end_date']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['NewspaperContent']['reel_control']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['NewspaperContent']['gaps']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['NewspaperContent']['comments']);?>&nbsp;</td>
                <td><?php echo h($newspaperRecord['NewspaperContent']['usage_rights']);?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['reel_polarity']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['generation']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['redox_quality_date']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['redox_quality_present']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['scratches']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['quality_in']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['sdn_number']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['shipping_box']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['date_of_last_access']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['date_of_microfilm']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['checked_out']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['created']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['modified']); ?>&nbsp;</td>
		<td><?php echo h($newspaperRecord['NewspaperReel']['deleted']); ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newspaperRecord['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Newspaper Record'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>		
	</ul>
</div>

