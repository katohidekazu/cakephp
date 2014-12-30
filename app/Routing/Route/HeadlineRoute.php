<?php

App::uses('CakeRoute', 'Routing/Route');
App::uses('ClassRegistry', 'Utility');

class HeadlineRoute extends CakeRoute {

    public function parse($url) {
        $params = parent::parse($url);
        if (empty($params)) {
            return false;
        }
        $cacheKey = $params['year'] . '-' . $params['month'];
        $headlines = Cache::remember($cacheKey, function () use ($params) {
                    return ClassRegistry::init('Headline')->find('all', array(
                                'conditions' => array(
                                    'Headline.year' => (int) $params['year'],
                                    'Headline.month' => (int) $params['month']
                                )
                    ));
                });
        if (!empty($headlines)) {
            return $params;
        }
        return false;
    }
    
    public function match($url) {
        if ($url['controller'] === 'headlines' && $url['action'] === 'listing' && !empty($url[0])) {
            $headline = ClassRegistry::init('Headline')->find('first', array(
               'conditions' => array(
                   'id' => $url[0]
               ) 
            ));
            if (!empty($headline)) {
                $url['year'] = $headline['Headline']['year'];
                $url['month'] = $headline['Headline']['month'];
                unset($url[0]);
                return parent::match($url);
            }
        }
        
        return false;
    }

}
