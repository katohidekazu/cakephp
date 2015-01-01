<?php
App::uses('AppController', 'Controller');

/**
 * Description of PackagesController
 *
 * @author HK
 */
class PackagesController extends AppController {
    public function debug() {
        debug($this->Packge->find('first', array(
            'contain' => array('Warehouse')
        )));
        $this->autoRender = false;
    }
}
