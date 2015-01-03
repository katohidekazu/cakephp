<div class="packages index">
    <h2><?php echo __('Packages'); ?></h2>
    <table>
        <tr>
            <th><?php echo $this->Paginator->sort('recipient'); ?></th>
            <th><?php echo $this->Paginator->sort('address'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($packages as $package): ?>
        <tr>
            <td><?php echo h($package['Package']['recipient']); ?>&nbsp;</td>
            <td><?php echo h($package['Package']['address']); ?>&nbsp;</td>
            <td><?php echo h($package['Package']['modified']); ?>&nbsp;</td>
            <td class="actions"><?php echo $this->Html->link(__('View'), array(
                'action' => 'view',
                $package['Package']['id']
            )); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => 'range'
        ));
        ?>
    </p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('Previous Page'), array(), null, array(
            'class' => 'prev disabled'
        ));
        echo $this->Paginator->next(__('Next Page') . ' >', array(), null, array(
            'class' => 'next desabled'
        ));
        ?>
    </div>
</div>

