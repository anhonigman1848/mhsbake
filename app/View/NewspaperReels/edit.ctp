<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperReels view">
<h2><?php  echo __('Edit Newspaper Record');?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['Newspaper']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['Newspaper']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['Newspaper']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title Control'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['Newspaper']['title_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['Newspaper']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperContent']['begin_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperContent']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Control'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperContent']['reel_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gaps'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperContent']['gaps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage Rights'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperContent']['usage_rights']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="newspaperReels form">
<?php echo $this->Form->create('NewspaperReel');?>
	<fieldset>
	<?php
		echo $this->Form->input('reel_polarity');
		echo $this->Form->input('generation');
		echo $this->Form->input('redox_quality_date', $options = array('empty' => true));
		echo $this->Form->input('redox_quality_present');
		echo $this->Form->input('scratches');
		echo $this->Form->input('quality_in');
		echo $this->Form->input('sdn_number');
		echo $this->Form->input('shipping_box');
		echo $this->Form->input('date_of_last_access', $options = array('empty' => true));
		echo $this->Form->input('date_of_microfilm', $options = array('empty' => true));
		echo $this->Form->input('checked_out');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h2><?php echo __('Additional Actions'); ?></h2>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('NewspaperReel.newspaper_reel_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('NewspaperReel.newspaper_reel_id'))); ?></li>
		<li><?php echo $this->Html->link(__('Edit Newspaper'), array('controller' => 'newspapers', 'action' => 'edit', $newspaperReel['Newspaper']['newspaper_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'edit', $newspaperReel['NewspaperContent']['newspaper_content_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Copy This Record'), array('action' => 'addWithContent', $newspaperReel['NewspaperContent']['newspaper_content_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Record for This Newspaper'), array('controller' => 'newspaper_contents', 'action' => 'addWithNewspaper', $newspaperReel['Newspaper']['newspaper_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Record'), array('controller' => 'newspaper_contents', 'action' => 'addNewspaperRecord')); ?> </li>
	</ul>
</div>
