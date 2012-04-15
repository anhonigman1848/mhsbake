<?php $this->Access->setRole($current_user['role']); ?>
<div class="users index">
	<h2>Users</h2>
	<div id="results">

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions">Actions</th>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Role</th>
			<th>Created</th>
			<th>Modified</th>
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
			<td class="actions">
				<?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id'])); ?>
			</td>
			<td><?php echo $user['User']['id']; ?>&nbsp;</td>
			<td class="editfirstname" id="<?php echo $user['User']['id']; ?>"><?php echo $user['User']['first_name']; ?></td>
			<td class="editlastname" id="<?php echo $user['User']['id']; ?>"><?php echo $user['User']['last_name']; ?></td>
			<td class="editusername" id="<?php echo $user['User']['id']; ?>"><?php echo $user['User']['username']; ?></td>
			<td><?php echo $user['User']['role']; ?>&nbsp;</td>
			<td><?php echo $user['User']['created']; ?>&nbsp;</td>
			<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
</div>