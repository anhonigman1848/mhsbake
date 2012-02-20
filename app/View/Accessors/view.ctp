<div class="accessors view">
<h2><?php  echo __('Accessor');?></h2>
	<dl>
		<dt><?php echo __('Accessor Id'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['accessor_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Last'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['name_last']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name First'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['name_first']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accessor['Accessor']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accessor'), array('action' => 'edit', $accessor['Accessor']['accessor_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accessor'), array('action' => 'delete', $accessor['Accessor']['accessor_id']), null, __('Are you sure you want to delete # %s?', $accessor['Accessor']['accessor_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accessors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accessor'), array('action' => 'add')); ?> </li>
	</ul>
</div>
