<h2><?php echo __('Book Stock'); ?></h2>
<table>
    <tr>
        <th><?php echo __('Name') ?></th>
        <th><?php echo __('Stock') ?></th>
        <th><?php echo __('Created') ?></th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($book['Book']['name'], array(
                'prefix' => 'inventory',
                'controller' => 'books',
                'action' => 'edit',
                $book['Book']['id']
            )); ?>
        </td>
        <td>
            <?php echo $book['Book']['stock']; ?>
        </td>
        <td>
            <?php echo $this->Time->nice($book['Book']['created']); ?>
        </td>
    </tr>
    
    <?php endforeach; ?>
</table>
