<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspapers view">
<h2><?php  echo __('Newspaper');?></h2>
	<dl>
		<dt><?php echo __('Newspaper Id'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['newspaper_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title Control'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['title_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($newspaper['Newspaper']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('controller' => 'newspapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper'), array('controller' => 'newspapers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('controller' => 'newspaper_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('controller' => 'newspaper_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
<div class="newspaperContents form">
<?php echo $this->Form->create('NewspaperContent');?>
	<fieldset>
		<legend><?php echo __('Add Record for Newspaper ID '.$newspaper['Newspaper']['newspaper_id']); ?></legend>
	<?php
		echo $this->Form->hidden('NewspaperContent.newspaper_id', array('default' => $newspaper['Newspaper']['newspaper_id']));
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
		echo $this->Form->input('NewspaperReel.0.deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
