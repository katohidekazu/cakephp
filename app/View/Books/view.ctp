<h2><?php echo h($book['Book']['name']); ?></h2>
<dl>
    <dt><?php echo __('Stock'); ?></dt>
    <dd><?php echo $book['Book']['stock']; ?></dd>
    <dt><?php echo __('Created'); ?></dt>
    <dd><?php echo $this->Time->nice($book['Book']['created']); ?></dd>
    <dt><?php echo __('Modified'); ?></dt>
    <dd><?php echo $this->Time->nice($book['Book']['modified']); ?></dd>
</dl>
