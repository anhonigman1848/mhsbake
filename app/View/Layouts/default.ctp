<?php $this->Access->setRole($current_user['role']); ?>
<?php
/**
*
* PHP 5
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link http://cakephp.org CakePHP(tm) Project
* @package Cake.View.Layouts
* @since CakePHP(tm) v 0.10.0.1076
* @license MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

$cakeDescription = 'Minnesota Historical Society Microfilm Collection';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title>
<?php echo $cakeDescription ?>:
<?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon');

echo $this->Html->css('cake.generic');

echo $this->Html->css('jquery-ui-1.8.4.custom.css');

echo $this->Html->css('horz_menu.css');

echo $this->Html->script('jquery.js');
echo $this->Html->script('jquery.jeditable.js');
echo $this->Html->script('jquery.jeditable.datepicker.js');
echo $this->Html->script('jquery.ui.js');
echo $this->Html->script('jquery.json-2.3.min.js');
echo $this->Html->script('jstorage.min.js');
echo $this->Html->script('functions.js');
echo $this->Html->script('superfish.js');
echo $this->Html->script('dropmenu.js');

echo $scripts_for_layout;
?>
</head>
<body>
<div id="container">
<div id="header">
<!--<h1><?php echo $this->Html->link('Sitemap', '/'); ?></h1>-->
</div>
<div id="content">
<h2><a href="/mhsbake/">Minnesota Historical Society Microfilm Database Application</a></h2>


<div style="text-align: right;">
<?php if ($logged_in): ?>
Welcome <?php echo $current_user['username']; ?>. <?php echo $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout')); ?>
<?php else: ?>
<?php echo $this->Html->link(__('Login'), array('controller'=>'users', 'action'=>'login')); ?>
<?php endif; ?>
</div>
<table id= "top" cellspacing="0" border="0">

<tr>
	<td id="nopad"><a href="/mhsbake/" id="mhc" ></a></td>

</tr>	

<tr><td id="nopad">
  <ul class="nav">
    <li><a href="/mhsbake/">Home</a></li>
 <li><a>Newspapers</a>
      <ul>
        <li><a href="/mhsbake/newspaper_reels/find">Standard Search</a></li> 
        <li><a href="/mhsbake/newspaper_reels/quality">Quality Search</a></li>
        <li><a href="/mhsbake/newspaper_contents/addNewspaperRecord">New Newspaper</a></li>
      </ul>
    </li>
 <li><a>Archives</a>
      <ul>
        <li><a href="/mhsbake/archive_reels/find">Standard Search</a></li>
        <li><a href="/mhsbake/archive_reels/quality">Quality Search</a></li>
        <li><a href="/mhsbake/archive_contents/addArchiveRecord">New Archive</a></li>
      </ul>
    </li>
    <li><a>Users</a>
      <ul>
        <li><a href="/mhsbake/users">List Users</a></li>
        <li><a href="/mhsbake/users/add">New User</a></li>
      </ul>
    </li>
    <li><a>Audits</a>
      <ul>
        <li><a href="/mhsbake/audits/index">Audit Log</a></li>
        <li><a href="/mhsbake/audit_deltas">Audit Deltas</a></li>
      </ul>
    </li> 
    <li><a href="/mhsbake/helps/view">Help</a></li> 
    </ul>
</td>
</tr>

</table>

<?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('auth'); ?>

<?php echo $content_for_layout; ?>

</div>
<div id="footer">
<!--?php echo $this->Html->link(
$this->Html->image('cake.power.gif', array('alt'=> $cakeDescription, 'border' => '0')),
'http://www.cakephp.org/',
array('target' => '_blank', 'escape' => false)
);
?-->
</div>
</div>
<!--<?php echo $this->element('sql_dump'); ?>-->
</body>
</html>
