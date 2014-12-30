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
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('New product created'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Could not create product'));
        }
    }
    
    public function edit($id) {
        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Product not found'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Product->id = $id;
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Product updated'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Could not update product'));
        } else {
            $this->request->data = $product;
        }
    }
}
