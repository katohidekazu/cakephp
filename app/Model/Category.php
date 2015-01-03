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
    
    public $actsAs = array(
        'Search.Searchable'
    );
    
    public $filterArgs = array(
        'name' => array(
            'field' => 'Category.name',
            'type' => 'like'
        ),
        'packages_fragile_count' => array(
            'field' => 'Category.packages_fragile_count >=',
            'type' => 'value'
        )
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
