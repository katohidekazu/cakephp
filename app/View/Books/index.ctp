<h2><?php echo __('Books'); ?></h2>
<table>
    <tr>
        <th><?php echo __('Name'); ?></th>
        <th><?php echo __('Created'); ?></th>
        <th><?php echo __('Modified'); ?></th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($book['Book']['name'], array(
                'controller' => 'books',
                'action' => 'view',
                $book['Book']['id']
            )); ?>
        </td>
        <td>
            <?php echo $this->Time->nice($book['Book']['created']); ?>
        </td>
        <td>
            <?php echo $this->Time->nice($book['Book']['modified']); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

