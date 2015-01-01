<?php
App::uses('AppController', 'Controller');

/**
 * Description of CategoriesController
 *
 * @author HK
 */
class CategoriesController extends AppController {
    public function debug() {
        debug($this->Category->getCategoryWarehouses(1));
        $this->_stop();
    }
}
