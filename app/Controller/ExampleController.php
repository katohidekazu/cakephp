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
}
