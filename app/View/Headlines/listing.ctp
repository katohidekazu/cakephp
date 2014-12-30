<h2><?php echo __('Headline for %s/%s', $year, $month); ?></h2>
<?php
$list = Hash::extract($headlines, '{n}.Headline.title');
echo $this->Html->nestedList($list);


