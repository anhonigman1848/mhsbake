<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperContents view">
<h2><?php  echo __('Newspaper Content');?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['Newspaper']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['Newspaper']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['Newspaper']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title Control'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['Newspaper']['title_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($newspaperContent['Newspaper']['aleph_number']); ?>
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

		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
<div class="newspaperReels form">
<?php echo $this->Form->create('NewspaperReel');?>
	<fieldset>
		<legend><?php echo __('Add Newspaper Reel with Newspaper Content ID '.$newspaperContent['NewspaperContent']['newspaper_content_id']); ?></legend>
	<?php
		echo $this->Form->hidden('newspaper_content_id', array('default' => $newspaperContent['NewspaperContent']['newspaper_content_id']));
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
