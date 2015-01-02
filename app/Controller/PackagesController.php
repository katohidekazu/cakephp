<?php
App::uses('AppController', 'Controller');

/**
 * Description of PackagesController
 *
 * @author HK
 */
class PackagesController extends AppController {
    public function debug() {
        debug($this->Package->find('first', array(
            'contain' => array('Warehouse', 'Stock')
        )));
        $this->autoRender = false;
    }
    
    public function latest() {
        debug($this->Package->find('latest'));
        $this->_stop();
    }
    
    public function save() {
        $data = array(
            'Package' => array(
                'recipient' => 'John Doe',
                'address' => 'Sunset Boulevard 1, Los Angeles, CA'
            ),
            'Warehouse' => array(
                array(
                    'name' => 'Main Warehouse'
                )
            )
        );
        
        $this->Package->saveComplexPackages($data);
        $this->_stop();
    }
}
