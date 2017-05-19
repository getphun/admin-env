<?php
/**
 * System env management
 * @package admin-env
 * @version 0.0.1
 * @upgrade true
 */

namespace AdminEnv\Controller;

class EnvController extends \AdminController
{
    private function _defaultParams(){
        return [
            'title'             => 'System Environment',
            'nav_title'         => 'System',
            'active_menu'       => 'system',
            'active_submenu'    => 'environment',
            'pagination'        => []
        ];
    }
    
    public function indexAction(){
        if(!$this->user->login)
            return $this->show404();
        if(!$this->can_i->update_env)
            return $this->show404();
        
        $params = $this->_defaultParams();
        $params['saved'] = false;
        
        $object = new \stdClass();
        $object->env = file_get_contents(BASEPATH . '/etc/.env');
        
        if(false === ($form = $this->form->validate('admin-system-env-edit', $object)))
            return $this->respond('system/env/index', $params);
        
        if($form->env != $object->env){
            $f = fopen(BASEPATH . '/etc/.env', 'w');
            fwrite($f, $form->env);
            fclose($f);
        }
        
        $params['saved'] = true;
        return $this->respond('system/env/index', $params);
    }
}