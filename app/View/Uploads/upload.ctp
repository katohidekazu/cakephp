<h2><?php echo __('Upload file'); ?></h2>
<?php
echo $this->Form->create('Upload', array('type' => 'file'));
echo $this->Form->file('file');
echo $this->Form->end(__('Upload'));