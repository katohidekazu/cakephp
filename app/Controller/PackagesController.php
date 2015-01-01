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
}
