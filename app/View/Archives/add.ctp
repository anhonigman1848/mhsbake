<?php $this->Access->setRole($current_user['role']); ?>
<div class="archives form">
<?php echo $this->Form->create('Archive');?>
	<fieldset>
		<legend><?php echo __('Add Archive'); ?></legend>
	<?php
		echo $this->Form->input('series');
		echo $this->Form->input('series_number');
		echo $this->Form->input('author_citation');
		echo $this->Form->input('title');
		echo $this->Form->input('county');
		echo $this->Form->input('city');
		echo $this->Form->input('aleph_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Archives'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Archive Contents'), array('controller' => 'archive_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Archive Content'), array('controller' => 'archive_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
