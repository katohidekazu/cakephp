<div class="packages index">
    <h2><?php echo __('Categories'); ?></h2>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('name');
    echo $this->Form->input('packages_fragile_count', array(
        'label' => __('Minimum fragile packages')
    )); 
    echo $this->Form->end(__('Submit'));
    
    ?>
    <table>
        <tr>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('packages_fragile_count'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
            <td><?php echo h($category['Category']['packages_fragile_count']); ?>&nbsp;</td>
            <td class="actions">
                <?php 
                echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id']));
                ?>
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
            'class' => 'next disabled'
        ));
        ?>
    </div>
</div>
