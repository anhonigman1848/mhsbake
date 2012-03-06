<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperReels form">
<?php echo $this->Form->create('NewspaperReel');?>
	<fieldset>
		<legend><?php echo __('Edit Newspaper Reel'); ?></legend>
	<?php
		echo $this->Form->input('newspaper_reel_id');
		echo $this->Form->input('newspaper_content_id');
		echo $this->Form->input('reel_polarity');
		echo $this->Form->input('generation');
		echo $this->Form->input('redox_quality_date');
		echo $this->Form->input('redox_quality_present');
		echo $this->Form->input('scratches');
		echo $this->Form->input('quality_in');
		echo $this->Form->input('sdn_number');
		echo $this->Form->input('shipping_box');
		echo $this->Form->input('date_of_last_access');
		echo $this->Form->input('date_of_microfilm');
		echo $this->Form->input('checked_out');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('NewspaperReel.newspaper_reel_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('NewspaperReel.newspaper_reel_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
