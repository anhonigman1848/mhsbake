<?php $this->Access->setRole($current_user['role']); ?>
<div class="newspaperReels view">
<h2><?php  echo __('Newspaper Reel');?></h2>
	<dl>
		<dt><?php echo __('Newspaper Reel Id'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['newspaper_reel_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newspaper Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($newspaperReel['NewspaperContent']['newspaper_content_id'], array('controller' => 'newspaper_contents', 'action' => 'view', $newspaperReel['NewspaperContent']['newspaper_content_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Polarity'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['reel_polarity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generation'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['generation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Date'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['redox_quality_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Present'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['redox_quality_present']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scratches'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['scratches']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quality In'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['quality_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sdn Number'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['sdn_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Box'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['shipping_box']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Last Access'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['date_of_last_access']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Microfilm'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['date_of_microfilm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checked Out'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['checked_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($newspaperReel['NewspaperReel']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Newspaper Reel'), array('action' => 'edit', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Newspaper Reel'), array('action' => 'delete', $newspaperReel['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperReel['NewspaperReel']['newspaper_reel_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Reels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Reel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Contents'), array('controller' => 'newspaper_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Content'), array('controller' => 'newspaper_contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
-->