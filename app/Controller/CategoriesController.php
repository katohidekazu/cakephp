<?php
App::uses('AppController', 'Controller');

/**
 * Description of CategoriesController
 *
 * @author HK
 */
class CategoriesController extends AppController {
    
    public $components = array('Paginator', 'Search.Prg');
    
    public function index() {
        $this->Category->recursive = 0;
        $this->Prg->commonProcess(null, array(
            'paramType' => 'querystring'
        ));
        $this->Paginator->settings = array(
            'Category' => array(
                'paramType' => 'querystring',
                'conditions' => $this->Category->parseCriteria($this->Prg->parsedParams())
            )
        );
        $this->set('categories', $this->Paginator->paginate());
    }
    
    public function debug() {
        debug($this->Category->getCategoryWarehouses(1));
        $this->_stop();
    }
}
