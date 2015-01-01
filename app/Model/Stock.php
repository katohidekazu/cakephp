<?php
App::uses('AppModel', 'Model');

/**
 * Description of Stock
 *
 * @author HK
 */
class Stock extends AppModel {
    public $useTable = 'packages_warehouses';
    
    public $belongsTo = array(
        'Package',
        'Warehouse'
    );
}
