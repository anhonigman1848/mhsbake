<?php $this->Access->setRole($current_user['role']); ?>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type'=>'password'));
		if($this->Access->cat('setusertypeadmin')) {
			$user_type = array('admin' => 'admin', 'staff' => 'staff', 'basic' => 'basic');
		} elseif ($this->Access->cat('setusertypestaff')) {
			$user_type = array( 'staff' => 'staff', 'basic' => 'basic');
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
