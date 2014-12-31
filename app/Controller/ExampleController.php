<?php
App::uses('AppController', 'Controller');

/**
 * Description of ExampleController
 *
 * @author HK
 */
class ExampleController extends AppController {
    
    public function language() {
        $this->set('language', Configure::read('Config.language'));
    }
    
    public function response() {
        if (!$this->request->query('text')) {
            $this->response->statusCode(404);
        }
        $this->response->header('X-Timestamp', date('H:i:s'));
        $this->response->type('txt');
        $this->response->body($this->request->query('text'));
        $this->response->send();
        $this->_stop();
    }
}
