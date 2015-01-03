<?php
App::uses('AppModel', 'Model');

/**
 * Description of Upload
 *
 * @author hidekazukato
 */
class Upload extends AppModel {
    
    protected function _processFile() {
        $file = $this->data['Upload']['file'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            $name = md5($file['name']);
            $path = WWW_ROOT . 'files' . DS . $name;
            if (is_uploaded_file($file['tmp_name']) && move_uploaded_file($file['tmp_name'], $path)) {
                $this->data['Upload']['name'] = $file['name'];
                $this->data['Upload']['size'] = $file['size'];
                $this->data['Upload']['mime'] = $file['type'];
                $this->data['Upload']['path'] = '/files/' . $name;
                unset($this->data['Upload']['file']);
                return true;
             }
        }
        return false;
    }
    
    public function beforeSave() {
        if (!parent::beforeSave()) {
            return false;
        }
        return $this->_processFile();
    }
}
