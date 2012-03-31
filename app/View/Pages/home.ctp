<?php $this->Access->setRole($current_user['role']); ?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<title>
		Minnesota Historical Society Microfilm Database Application
		Home	</title>
<body>
<br />	
<h2>Minnesota Historical Society Microfilm Database Application</h2>

<br />
<hr />
<br />
<br />
<?php echo $this->Html->link('Newspaper Records', array('controller' => 'newspaper_reels', 'action' => 'expanded')); ?>
<br />
<?php echo $this->Html->link('Newspaper Records Search', array('controller' => 'newspaper_reels', 'action' => 'find')); ?>
<br />
<?php echo $this->Html->link('Newspaper Records Quality Search', array('controller' => 'newspaper_reels', 'action' => 'quality')); ?>
<br />
<br />
<?php echo $this->Html->link('Archive Records', array('controller' => 'archive_reels', 'action' => 'expanded')); ?>
<br />
<?php echo $this->Html->link('Archive Records Search', array('controller' => 'archive_reels', 'action' => 'find')); ?>
<br />
<?php echo $this->Html->link('Archive Records Quality Search', array('controller' => 'archive_reels', 'action' => 'quality')); ?>
<br />
<br />
<?php echo $this->Html->link('Users', array('controller' => 'users')); ?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />	
</body><link rel="stylesheet" type="text/css" href="data:text/css,"></html>