<?php
App::uses('CakeRoute', 'Routing/Route');
App::uses('ClassRegistry', 'Utility');

class HeadlineRoute extends CakeRoute {
    
    public function parse($url) {
        $params = parent::parse($url);
        if (empty($params)) {
            return false;
        }
        
        $cachekey = $params['year'] . '-' . $params['month'];
        $headlines = Cache::remember($cachekey, function () use ($params) {
            return ClassRegistry::init('Headline')->find('all', array(
                'conditions' => array(
                    'Headline.year' => (int)$params['year'],
                    'Headline.month' => (int)$params['month']
                )
            ));
        });
        
        if (!empty($headlines)) {
            return $params;
        }
        
        return false;
    }
}

