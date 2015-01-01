<?php
App::uses('AppModel', 'Model');

/**
 * Description of Category
 *
 * @author HK
 */
class Category extends AppModel {

    public $hasMany = array(
        'Package'  
    );
    
    public function getCategoryWarehouses($categoryId) {
        return $this->find('first', array(
            'conditions' => array(
                "{$this->alias}.{$this->primaryKey}" => $categoryId
            ),
            'contain' => array(
                'Package' => array(
                    'Warehouse' => array(
                        'fields' => array(
                            'Warehouse.id',
                            'Warehouse.name'
                        )
                    ),
                    'conditions' => array(
                        'Package.fragile' => false
                    ),
                    'fields' => array(
                        'Package.id',
                        'Package.address'
                    )
                )
            )
        ));
    }
}
