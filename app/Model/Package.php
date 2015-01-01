<?php
App::uses('AppModel', 'Model');
/**
 * Description of Package
 *
 * @author HK
 */
class Package extends AppModel {
    public $hasAndBelongsToMany = array(
        'Warehouse' => array(
            'className' => 'Warehouse',
            'joinTable' => 'packages_warehouses',
            'foreignkey' => 'package_id',
            'associationForeignkey' => 'warehouse_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => ''
        )
    );
}
