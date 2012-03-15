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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newspapers'), array('controller' => 'newspapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper'), array('controller' => 'newspapers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('controller' => 'newspaper_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('controller' => 'newspaper_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="newspaperContents form">
<?php echo $this->Form->create('NewspaperContent');?>
	<fieldset>
		<legend><?php echo __('Add Newspaper Content for Newspaper ID '.$newspaper['Newspaper']['newspaper_id']); ?></legend>
	<?php
		echo $this->Form->hidden('newspaper_id', array('default' => $newspaper['Newspaper']['newspaper_id']));
		echo $this->Form->input('begin_date', $options = array('empty' => true));
		echo $this->Form->input('end_date', $options = array('empty' => true));
		echo $this->Form->input('reel_control');
		echo $this->Form->input('gaps');
		echo $this->Form->input('comments');
		echo $this->Form->input('usage_rights');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
