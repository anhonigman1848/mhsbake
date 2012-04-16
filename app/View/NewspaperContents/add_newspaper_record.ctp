<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspapers form">
<?php echo $this->Form->create('NewspaperContent');?>
	<fieldset>
		<legend><?php echo __('Add Newspaper'); ?></legend>
	<?php
		echo $this->Form->input('Newspaper.title');
		echo $this->Form->input('Newspaper.city');
		echo $this->Form->input('Newspaper.county');
		echo $this->Form->input('Newspaper.title_control');
		echo $this->Form->input('Newspaper.aleph_number');
		echo $this->Form->input('NewspaperContent.begin_date', array('default' => '0000-00-00'));
		echo $this->Form->input('NewspaperContent.end_date', array('default' => '0000-00-00'));
		echo $this->Form->input('NewspaperContent.reel_control');
		echo $this->Form->input('NewspaperContent.gaps');
		echo $this->Form->input('NewspaperContent.comments');
		echo $this->Form->input('NewspaperContent.usage_rights');
		echo $this->Form->input('NewspaperReel.0.reel_polarity');
		echo $this->Form->input('NewspaperReel.0.generation');
		echo $this->Form->input('NewspaperReel.0.redox_quality_date', $options = array('empty' => true));
		echo $this->Form->input('NewspaperReel.0.redox_quality_present');
		echo $this->Form->input('NewspaperReel.0.scratches');
		echo $this->Form->input('NewspaperReel.0.quality_in');
		echo $this->Form->input('NewspaperReel.0.sdn_number');
		echo $this->Form->input('NewspaperReel.0.shipping_box');
		echo $this->Form->input('NewspaperReel.0.date_of_last_access', $options = array('empty' => true));
		echo $this->Form->input('NewspaperReel.0.date_of_microfilm', $options = array('empty' => true));
		echo $this->Form->input('NewspaperReel.0.checked_out');
		//echo $this->Form->input('NewspaperReel.0.deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
