<?php

App::uses('AppController', 'Controller');

/**
 * Description of PackagesController
 *
 * @author HK
 */
class PackagesController extends AppController {

    public $components = array('Paginator');
    public $helpers = array('Paginator');

    public function index() {
        $this->Paginator->settings = array(
            'Package' => array(
                'paramType' => 'querystring',
                'limit' => 5,
                'order' => array(
                    'Package.recipient' => 'asc'
                )
            )
        );
        $this->set('packages', $this->Paginator->paginate());
    }

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
    
    public function search() {
        if ($this->request->is('put') || $this->request->is('post')) {
            return $this->redirect(array(
               '?' => array(
                   'q' => $this->request->data('Package.searchQuery')
               ) 
            ));
        }
        $this->Package->recursive = 0;
        $searchQuery = $this->request->query('q');
        $this->Paginator->settings = array(
            'Package' => array(
                'findType' => 'search',
                'searchQuery' => $searchQuery
            )
        );
        $this->set('packages', $this->Paginator->paginate());
        $this->set('searchQuery', $searchQuery);
        $this->render('index');
    }

}
