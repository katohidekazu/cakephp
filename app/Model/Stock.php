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
    
    public $findMethods = array(
        'available' => true
    );
    
    protected function _findAvailable($state, $query, $results = array()) {
        if ($state === 'before') {
            $this->bindModel(array(
                'belongsTo' => array(
                    'Warehouse' => array(
                        'conditions' => array(
                            'Warehouse.active' => true
                        ),
                        'type' => 'inner'
                    ),
                    'Package' => array(
                        'conditions' => array(
                            'Package.active' => true
                        ),
                        'type' => 'inner'
                    )
                )
            ));
            $query['conditions'] = array('Stock.amount >' => 0);
            $query['contain'] = array('Warehouse', 'Package');
            return $query;
        }
        return $results;
    }
}
