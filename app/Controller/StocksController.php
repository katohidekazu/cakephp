<?php
App::uses('AppController', 'Controller');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StocksController
 *
 * @author HK
 */
class StocksController extends AppController {
    public function debug() {
        debug($this->Stock->find('available'));
        $this->_stop();
    }
}
