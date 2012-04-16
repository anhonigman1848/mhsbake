<?php $this->Access->setRole($current_user['role']); ?>
<div class="subnav">
      <?php  if($this->Access->cat('edit')){ 
        echo '<h2>Actions</h2>';
        echo '<ul>';
          echo '<li>'.$this->Html->link(__('Edit Record'), array('action' => 'editNewspaperRecord', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])).'</li>';
	  echo '<li>'.$this->Form->postLink(__('Delete Record'), array('action' => 'softdelete', $newspaperRecord['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to delete # %s?', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])).'</li>';
	  if($this->Access->cat('delete')){
	    echo '<li>'.$this->Form->postLink(__('Delete Forever'), array('action' => 'delete', $newspaperRecord['NewspaperReel']['newspaper_reel_id']), null, __('Are you sure you want to PERMANENTLY delete # %s?', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])).'</li>';
	    echo '<li>'.$this->Form->postLink(__('Restore Deleted Record'), array('action' => 'restore', $newspaperRecord['NewspaperReel']['newspaper_reel_id'])).'</li>';
	  }
	  echo '<li>'.$this->Html->link(__('Copy Record'), array('action' => 'addWithContent', $newspaperRecord['NewspaperContent']['newspaper_content_id'])).'</li>';
	  echo '<li>'.$this->Html->link(__('New Content'), array('controller' => 'newspaper_contents', 'action' => 'addWithNewspaper', $newspaperRecord['Newspaper']['newspaper_id'])).'</li>';
        echo '</ul>';
      }
      ?>
</div>
<div class="newspaperReels viewFloatRight">
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
		<dt><?php if($this->Access->cat('deleted')){ echo __('Deleted'); } ?></dt>
		<dd>
			<?php if($this->Access->cat('deleted')){ echo h($newspaperRecord['NewspaperReel']['deleted']); } ?>
		</dd>
	</dl>
</div>
