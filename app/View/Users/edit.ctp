<?php $this->Access->setRole($current_user['role']); ?>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php		
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		if($this->Access->cat('setusertypeadmin')) {
			$user_type = array('admin' => 'admin', 'staff' => 'staff', 'basic' => 'basic');
		} elseif ($this->Access->cat('setusertypestaff')) {
			$user_type = array( 'staff' => 'staff');
		} else {
			$user_type = array( 'basic' => 'basic');
		}
		echo $this->Form->input('role', array(
			'options' => $user_type
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="bnav">
	<ul>

		<li><?php if($this->Access->cat('delete')){  echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); } ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
	</ul>
</div>
