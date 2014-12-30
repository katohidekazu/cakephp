<h2><?php echo __('Edit Stock'); ?></h2>
<p>
    <?php echo __('Book') . ':' . h($this->request->data('Book.name')); ?>
</p>
<?php
echo $this->Form->create('Book');
echo $this->Form->input('id');
echo $this->Form->input('stock');
echo $this->Form->end(__('Submit'));
?>
