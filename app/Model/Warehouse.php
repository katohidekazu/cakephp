<?php
App::uses('AppModel', 'Model');

/**
 * Description of Warehouse
 *
 * @author HK
 */
class Warehouse extends AppModel {
    public $hasAndBelongsToMany = array(
        'Package' => array(
            'className' => 'Package',
            'joinTable' => 'packages_warehouses',
            'foreignkey' => 'warehouse_id',
            'associationForeignkey' => 'package_id',
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
