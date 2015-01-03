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
            'finderQuery' => '',
            'with' => 'Stock'
        )
    );
    
    public $belongsTo =  array('Category');
    
    public $hasMany = array(
      'Stock'  
    );
    
    public $findMethods = array(
        'latest' => true
    );
    
    protected function _findLatest($state, $query, $results = array()) {
        if ($state === 'before') {
            $query['conditions']['Package.fragile'] = false;
            $query['order'] = array('Package.created' => 'desc');
            $query['contain'] = array('Warehouse');
            return $query;
        }
        
        foreach ($results as &$result) {
            $warehouseCount = count($result['Warehouse']);
            $result = Hash::insert($result, 'Package.multiple_warehouses', $warehouseCount > 1);
        }
        return $results;
    }
    
    public function saveComplexPackages($data) {
        $dataSource = $this->getDataSource();
        
        try {
            $dataSource->begin();
            $this->_complexSave1($data);
            $this->_complexSave2($data);
            $dataSource->commit();
        } catch (Exception $ex) {
            $dataSource->rollback();
        }
    }
    
    protected function _complexSave1($data) {
        $saveResult = $this->saveAssociated($data);
        if (!$saveResult) {
            throw new OutOfBoundsException(__('Unable to save %s', __METHOD__));
        }
    }
    
    protected function _complexSave2($data) {
        // do another complex save operation
        
        return true;
    }
            
}
