<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperRecords index">
	<h2><?php echo __('Selected Newspaper Records');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php if($this->Access->cat('selected')){ echo 'Selected';} ?></th>
			<th><?php if($this->Access->cat('newspaper_reel_id')){ echo 'Newspaper Reel Id';}?></th>
                        <th><?php if($this->Access->cat('title')){ echo 'Title';}?></th>
                        <th><?php if($this->Access->cat('city')){ echo 'City';}?></th>
                        <th><?php if($this->Access->cat('county')){ echo 'County';}?></th>
                        <th><?php if($this->Access->cat('title_control')){ echo 'Title Control';}?></th>
                        <th><?php if($this->Access->cat('aleph_number')){ echo 'Aleph Number';}?></th>
			<th><?php if($this->Access->cat('begin_date')){ echo 'Begin Date';}?></th>
                        <th><?php if($this->Access->cat('end_date')){ echo 'End Date';}?></th>
                        <th><?php if($this->Access->cat('reel_control')){ echo 'Reel Control';}?></th>
                        <th><?php if($this->Access->cat('gaps')){ echo 'Gaps';}?></th>
                        <th><?php if($this->Access->cat('comments')){ echo 'Comments';}?></th>
                        <th><?php if($this->Access->cat('usage_rights')){ echo 'Usage Rights';}?></th>
			<th><?php if($this->Access->cat('reel_polarity')){ echo 'Reel Polarity';}?></th>
			<th><?php if($this->Access->cat('generation')){ echo 'Generation';}?></th>
			<th><?php if($this->Access->cat('redox_quality_date')){ echo 'Redox Quality Date';}?></th>
			<th><?php if($this->Access->cat('redox_quality_present')){ echo 'Redox Quality Present';}?></th>
			<th><?php if($this->Access->cat('scratches')){ echo 'Scratches';}?></th>
			<th><?php if($this->Access->cat('quality_in')){ echo 'Quality In';}?></th>
			<th><?php if($this->Access->cat('sdn_number')){ echo 'SDN Number';}?></th>
			<th><?php if($this->Access->cat('shipping_box')){ echo 'Shipping Box';}?></th>
			<th><?php if($this->Access->cat('date_of_last_access')){ echo 'Last Accessed Date';}?></th>
			<th><?php if($this->Access->cat('date_of_microfilm')){ echo 'Microfilm Date';}?></th>
			<th><?php if($this->Access->cat('checked_out')){ echo 'Checked Out';}?></th>
			<th><?php if($this->Access->cat('created')){ echo 'Created';}?></th>
			<th><?php if($this->Access->cat('modified')){ echo 'Modified';}?></th>
			<th><?php if($this->Access->cat('deleted')){ echo 'Deleted';}?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php 
	foreach ($newspaperRecords as $newspaperRecord): ?>
	<tr>
		<td><?php if($this->Access->cat('selected')){ echo $this->Form->checkbox('selected');} ?>&nbsp;</td>
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
	
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Newspaper Record'), array('controller' => 'newspaper_contents', 'action' => 'addWithAssociated')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>

