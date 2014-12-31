<?php
App::uses('DispatcherFilter', 'Routing');
App::uses('ClassRegistry', 'Utility');
/**
 * Description of ApiDispatcher
 *
 * @author HK
 */
class ApiDispatcher extends DispatcherFilter {
    public $priority = 9;
    
    public function beforeDispatch(CakeEvent $event) {
        $request = $event->data['request'];
        $response = $event->data['response'];
        $url = $request->url;
        if (substr($url, 0, 4) === 'api/') {
            try {
                switch (substr($url, 4)) {
                    case 'libraries' :
                        $object = array(
                            'status' => 'success',
                            'data' => ClassRegistry::init('Library')->find('all')
                        );
                        break;
                    default :
                        throw new Exception('Unknown end-point');
                }
            } catch (Exception $ex) {
                $response->statusCode(500);
                $object = array(
                    'status' => 'error',
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode()
                );
                
                if (Configure::read('debug') > 0) {
                    $object['data'] = array(
                        'file' => $ex->getFile(),
                        'trace' => $ex->getTrace()
                    );
                }
            }
            $response->type('json');
            $response->body(json_encode($object));
            $event->stopPropagation();
            
            return $response;
        }
    }
}
