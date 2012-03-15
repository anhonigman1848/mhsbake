<?php $this->Access->setRole($current_user['role']); ?>
<div class="archives view">
<h2><?php  echo __('Archive');?></h2>
	<dl>
		<dt><?php echo __('Archive Id'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['archive_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['series']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Series Number'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['series_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Citation'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['author_citation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($archive['Archive']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Archive Contents'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archives'), array('controller' => 'archives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive'), array('controller' => 'archives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Archive Reels'), array('controller' => 'archive_reels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Reel'), array('controller' => 'archive_reels', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="archiveContents form">
<?php echo $this->Form->create('ArchiveContent');?>
	<fieldset>
		<legend><?php echo __('Add Archive Content for Archive ID '.$archive['Archive']['archive_id']); ?></legend>
	<?php
		echo $this->Form->hidden('archive_id', array('default' => $archive['Archive']['archive_id']));
		echo $this->Form->input('reel_number');
		echo $this->Form->input('begin_date');		
		echo $this->Form->input('end_date');		
		echo $this->Form->input('contents');
		echo $this->Form->input('comments');
		echo $this->Form->input('usage_rights');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
