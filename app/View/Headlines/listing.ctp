<h2><?php echo __('Headlines for %s/%s', $year, $month); ?></h2>
<?php
$list = Hash::extract($headlines, '{n}.Headline.title');
echo $this->Html->nestedList($list);


debug(Router::url(array('controller' => 'headlines', 'action' => 'listing', 1)));