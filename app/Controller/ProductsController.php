<?php
App::uses('AppController', 'Controller');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductsController
 *
 * @author HK
 */
class ProductsController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public $components = array('Session', 'Paginator');
    
    public $paginate = array(
        'limit' => 10
    );
    
    public function index() {
        $this->Product->recursive = -1;
        $this->set('products', $this->paginate());
    }
    
    public function view($id) {
        if (!($product = $this->Product->findById($id))) {
            throw new NotFoundException(__('Product not found'));
        }
        
        $this->set(compact('product'));
    }
}
