<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperRecords index">
	<h2><?php echo __('Newspaper Records Expanded View');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php if($this->Access->cat('newspaper_reel_id')){ echo $this->Paginator->sort('newspaper_reel_id');}?></th>
                        <th><?php if($this->Access->cat('title')){ echo $this->Paginator->sort('title');}?></th>
                        <th><?php if($this->Access->cat('city')){ echo $this->Paginator->sort('city');}?></th>
                        <th><?php if($this->Access->cat('county')){ echo $this->Paginator->sort('county');}?></th>
                        <th><?php if($this->Access->cat('title_control')){ echo $this->Paginator->sort('title_control');}?></th>
                        <th><?php if($this->Access->cat('aleph_number')){ echo $this->Paginator->sort('aleph_number');}?></th>
			<th><?php if($this->Access->cat('begin_date')){ echo $this->Paginator->sort('begin_date');}?></th>
                        <th><?php if($this->Access->cat('end_date')){ echo $this->Paginator->sort('end_date');}?></th>
                        <th><?php if($this->Access->cat('reel_control')){ echo $this->Paginator->sort('reel_control');}?></th>
                        <th><?php if($this->Access->cat('gaps')){ echo $this->Paginator->sort('gaps');}?></th>
                        <th><?php if($this->Access->cat('comments')){ echo $this->Paginator->sort('comments');}?></th>
                        <th><?php if($this->Access->cat('usage_rights')){ echo $this->Paginator->sort('usage_rights');}?></th>
			<th><?php if($this->Access->cat('reel_polarity')){ echo $this->Paginator->sort('reel_polarity');}?></th>
			<th><?php if($this->Access->cat('generation')){ echo $this->Paginator->sort('generation');}?></th>
			<th><?php if($this->Access->cat('redox_quality_date')){ echo $this->Paginator->sort('redox_quality_date');}?></th>
			<th><?php if($this->Access->cat('redox_quality_present')){ echo $this->Paginator->sort('redox_quality_present');}?></th>
			<th><?php if($this->Access->cat('scratches')){ echo $this->Paginator->sort('scratches');}?></th>
			<th><?php if($this->Access->cat('quality_in')){ echo $this->Paginator->sort('quality_in');}?></th>
			<th><?php if($this->Access->cat('sdn_number')){ echo $this->Paginator->sort('sdn_number');}?></th>
			<th><?php if($this->Access->cat('shipping_box')){ echo $this->Paginator->sort('shipping_box');}?></th>
			<th><?php if($this->Access->cat('date_of_last_access')){ echo $this->Paginator->sort('date_of_last_access');}?></th>
			<th><?php if($this->Access->cat('date_of_microfilm')){ echo $this->Paginator->sort('date_of_microfilm');}?></th>
			<th><?php if($this->Access->cat('checked_out')){ echo $this->Paginator->sort('checked_out');}?></th>
			<th><?php if($this->Access->cat('created')){ echo $this->Paginator->sort('created');}?></th>
			<th><?php if($this->Access->cat('modified')){ echo $this->Paginator->sort('modified');}?></th>
			<th><?php if($this->Access->cat('deleted')){ echo $this->Paginator->sort('deleted');}?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php 
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr>
		<td><?php if($this->Access->cat('newspaper_reel_id')){ echo h($newspaperRecord['NewspaperReel']['newspaper_reel_id']);} ?>&nbsp;</td>
                <td><?php if($this->Access->cat('title')){ echo h($newspaperRecord['Newspaper']['title']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('city')){ echo h($newspaperRecord['Newspaper']['city']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('county')){ echo h($newspaperRecord['Newspaper']['county']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('title_control')){ echo h($newspaperRecord['Newspaper']['title_control']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('aleph_number')){ echo h($newspaperRecord['Newspaper']['aleph_number']);}?>&nbsp;</td>
		<td><?php if($this->Access->cat('begin_date')){ echo h($newspaperRecord['NewspaperContent']['begin_date']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('end_date')){ echo h($newspaperRecord['NewspaperContent']['end_date']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('reel_control')){ echo h($newspaperRecord['NewspaperContent']['reel_control']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('gaps')){ echo h($newspaperRecord['NewspaperContent']['gaps']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('comments')){ echo h($newspaperRecord['NewspaperContent']['comments']);}?>&nbsp;</td>
                <td><?php if($this->Access->cat('usage_rights')){ echo h($newspaperRecord['NewspaperContent']['usage_rights']);}?>&nbsp;</td>
		<td><?php if($this->Access->cat('reel_polarity')){ echo h($newspaperRecord['NewspaperReel']['reel_polarity']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('generation')){ echo h($newspaperRecord['NewspaperReel']['generation']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('redox_quality_date')){ echo h($newspaperRecord['NewspaperReel']['redox_quality_date']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('redox_quality_present')){ echo h($newspaperRecord['NewspaperReel']['redox_quality_present']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('scratches')){ echo h($newspaperRecord['NewspaperReel']['scratches']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('quality_in')){ echo h($newspaperRecord['NewspaperReel']['quality_in']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('sdn_number')){ echo h($newspaperRecord['NewspaperReel']['sdn_number']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('shipping_box')){ echo h($newspaperRecord['NewspaperReel']['shipping_box']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('date_of_last_access')){ echo h($newspaperRecord['NewspaperReel']['date_of_last_access']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('date_of_microfilm')){ echo h($newspaperRecord['NewspaperReel']['date_of_microfilm']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('checked_out')){ echo h($newspaperRecord['NewspaperReel']['checked_out']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('created')){ echo h($newspaperRecord['NewspaperReel']['created']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('modified')){ echo h($newspaperRecord['NewspaperReel']['modified']);} ?>&nbsp;</td>
		<td><?php if($this->Access->cat('deleted')){ echo h($newspaperRecord['NewspaperReel']['deleted']);} ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'newspaper_reels', 'action' => 'record', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?>
			<?php if($this->Access->cat('edit')){
				echo $this->Html->link(__('Edit'), array('action' => 'edit',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']));} ?>
			<?php if($this->Access->cat('deleted')){
				echo $this->Form->postLink(__('Delete Forever'), array('action' => 'delete',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']), null,
					__('Are you sure you want to delete # %s?',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']));} ?>
			<?php if($this->Access->cat('soft_delete')){
				echo $this->Form->postLink(__('Delete'), array('action' => 'softdelete',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']), null,
					__('Are you sure you want to delete # %s?',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']));} ?>
			<?php if($this->Access->cat('deleted')){
				echo $this->Form->postLink(__('Restore'), array('action' => 'restore',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']), null,
					__('Are you sure you want to restore # %s?',
					$newspaperRecord['NewspaperReel']['newspaper_reel_id']));} ?>
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
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>

