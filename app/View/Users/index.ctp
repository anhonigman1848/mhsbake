<?php $this->Access->setRole($current_user['role']); ?>
<div class="users index">
	<h2>Users</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>id</th>
			<th>first name</th>
			<th>Last name</th>
			<th>username</th>
			<th>role</th>
			<th class="actions">Actions</th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'): ?>
			<td><?php echo $user['User']['id']; ?>&nbsp;</td>
			<td class="editfirstname" id="<?php echo $user['User']['id']; ?>"><?php echo $user['User']['first_name']; ?></td>
			<td class="editlastname" id="<?php echo $user['User']['id']; ?>"><?php echo $user['User']['last_name']; ?></td>
			<td><?php echo $user['User']['username']; ?>&nbsp;</td>
			<td><?php echo $user['User']['role']; ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id'])); ?>
				<?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
				<?php if($this->Access->cat('delete')){
					echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']),
								   array('confirm'=>'Are you sure you want to delete that user?')); } ?>
			</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php if($this->Access->cat('add')){
			echo $this->Html->link('New User', array('action' => 'add')); } ?></li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
