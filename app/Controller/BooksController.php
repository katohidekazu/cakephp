<?php
App::uses('AppController', 'Controller');

/**
 * Description of BooksController
 *
 * @author HK
 */
class BooksController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public function index() {
        $this->set('books', $this->Book->find('all', array(
            'conditions' => array(
                'Book.stock >' => 0
            )
        )));
    }
    
    public function view($id) {
        if (!($book = $this->Book->findById($id))) {
            throw new NotFoundException(__('Book not found'));
        }
        
        if ($book['Book']['stock'] < 1) {
            throw new CakeException(__('Book not in stock'));
        }
        
        $this->set(compact('book'));
    }
    
    public function inventory_stock() {
        $this->set('books', $this->Book->find('all'));
    }

    public function inventory_edit($id) {
        $book = $this->Book->findById($id);
        if (!book) {
            throw new NotFoundException(__('Book not found'));
        }
        
        if ($this->request->is('post')) {
            $this->Book->id = $id;
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('Book stock updated'));
                return $this->redirect(array(
                    'prefix' => 'inventory',
                    'action' => 'stock'
                ));
            }
            $this->Session->setFlash(__('Could not update book stock'));
        } else {
            $this->request->data = $book;
        }
    }
}
