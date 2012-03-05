<div class="newspaperReels view">
<h2><?php  echo __('Newspaper Record');?></h2>
	<dl>
		<dt><?php echo __('Reel Id'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['newspaper_reel_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['Newspaper']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['Newspaper']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['Newspaper']['county']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title Control'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['Newspaper']['title_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aleph Number'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['Newspaper']['aleph_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin Date'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperContent']['begin_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperContent']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Control'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperContent']['reel_control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gaps'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperContent']['gaps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperContent']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usage Rights'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperContent']['usage_rights']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reel Polarity'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['reel_polarity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generation'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['generation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Date'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['redox_quality_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redox Quality Present'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['redox_quality_present']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scratches'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['scratches']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quality In'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['quality_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sdn Number'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['sdn_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Box'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['shipping_box']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Last Access'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['date_of_last_access']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Microfilm'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['date_of_microfilm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checked Out'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['checked_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($newspaperRecord['NewspaperReel']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Newspaper Record'), array('action' => 'edit', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Newspaper Record'), array('action' => 'delete', $newspaperRecord['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Newspaper Records'), array('action' => 'expanded')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newspaper Record'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>