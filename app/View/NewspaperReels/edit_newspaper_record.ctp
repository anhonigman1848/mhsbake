<?php $this->Access->setRole($current_user['role']); ?>
<h2><?php  echo __('Edit Newspaper Record');?></h2>
<div class="newspapers form">
<?php echo $this->Form->create('NewspaperReel');?>
	<fieldset>
		<legend><?php echo __('Newspaper Fields (edits will change multiple records)'); ?></legend>
	<?php
		echo $this->Form->hidden('Newspaper.newspaper_id');
		echo $this->Form->input('Newspaper.title');
		echo $this->Form->input('Newspaper.city');
		echo $this->Form->input('Newspaper.county');
		echo $this->Form->input('Newspaper.title_control');
		echo $this->Form->input('Newspaper.aleph_number');
	?>
	</fieldset>
	<fieldset>
		<legend><?php echo __('Content Fields (edits will change multiple records)'); ?></legend>
	<?php
		echo $this->Form->hidden('NewspaperContent.newspaper_content_id');
		echo $this->Form->hidden('Newspaper.newspaper_id');
		echo $this->Form->input('NewspaperContent.begin_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('NewspaperContent.end_date', array('default' => '0000-00-00'));		
		echo $this->Form->input('NewspaperContent.reel_control');
		echo $this->Form->input('NewspaperContent.gaps');
		echo $this->Form->input('NewspaperContent.comments');
		echo $this->Form->input('NewspaperContent.usage_rights');
	?>
	</fieldset>
	<fieldset>
		<legend><?php echo __('Reel Fields (edits will change this record only)'); ?></legend>
	<?php
		echo $this->Form->hidden('NewspaperReel.newspaper_reel_id');
		echo $this->Form->hidden('NewspaperContent.newspaper_content_id');
		echo $this->Form->input('NewspaperReel.reel_polarity');
		echo $this->Form->input('NewspaperReel.generation');
		echo $this->Form->input('NewspaperReel.redox_quality_date', $options = array('empty' => true));
		echo $this->Form->input('NewspaperReel.redox_quality_present');
		echo $this->Form->input('NewspaperReel.scratches');
		echo $this->Form->input('NewspaperReel.quality_in');
		echo $this->Form->input('NewspaperReel.sdn_number');
		echo $this->Form->input('NewspaperReel.shipping_box');
		echo $this->Form->input('NewspaperReel.date_of_last_access', $options = array('empty' => true));
		echo $this->Form->input('NewspaperReel.date_of_microfilm', $options = array('empty' => true));
		echo $this->Form->input('NewspaperReel.checked_out');
		echo $this->Form->input('NewspaperReel.deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

<div id="cancel">
  <ul>
	<li><?php echo $this->Html->link(__('Cancel Edit'), array('action' => 'cancel', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?> </li>
  </ul>

</div>
