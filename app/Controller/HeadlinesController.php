<?php
App::uses('AppController', 'Controller');

/**
 * Description of HeadlinesController
 *
 * @author HK
 */
class HeadlinesController extends AppController {
    
    public function listing() {
        $year = $this->request->params['year'];
        $month = $this->request->params['month'];
        $headlines = Cache::read($year . '-' . $month);
        $this->set(compact('year', 'month', 'headlines'));
    }
}
