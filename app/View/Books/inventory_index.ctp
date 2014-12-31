<?php
$this->Html->script('https://code.jquery.com/jquery-2.1.1.min.js', array('block' => 'script'));
?>
<h2><?php echo __('Books stock'); ?></h2>
<ul>
    <li>
        <?php echo h($book['Book']['name']); ?>
        <input id="<?php echo $book['Book']['id']; ?>" name="stock" type="text" value="<?php echo $book['Book']['stock']; ?>" />
        <?php echo $this->Html->scriptBlock(
                '$("#' . $book['Book']['id'] . '").keyup(function(e) {'
                . 'if (e.keyCode === 13 {'
                . 'update($(this));'
                . '});');
        ?>
    </li>
</ul>
<?php
$url = $this->Html->url(array('action' => 'update'));
$success = __('Updated!');
$error = __('Could not update stock');
$script = <<<JS
    function update(node) {
        var stock = node.val();
        if (stock === '' || stock.match(/[^\d]+/) {
            node.val('0');
            stock = '0';
        }
        var data = {
            id: node.attr('id'),
            stock: stock
        }
        $.post("$url", data)
            .done(function() { alert("$succes"); })
            .fail(function() { alert("$error"); });
    }
JS;

$this->Html->scriptBlock($script, array('block' => 'script'));