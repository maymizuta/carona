<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array()
    );

    function beforeFilter() {
        //Definicao do formulario para login
        $this->Auth->authenticate = array(
            //username:campo do banco que sera usado para identificar o usuario
            AuthComponent::ALL => array('fields' => array('username' => 'email')),
                                        'Basic' =>array('userModel'=>'User') ,
                                        'Form'=>array('userModel'=>'User'));
        $this->Auth->loginAction = null;
        
        $this->Auth->allow('index', 'view', 'api_login', 'login', 'api_index', 'api_add');
        
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'json') {
            //$this->Auth->autoRedirect = false;

           /* $this->Auth->authenticate = array('Basic'=>array('userModel'=>'User'), 
                                              'Form'=>array('userModel'=>'User'));*/
            if (!$this->Auth->loggedIn()) {
                $this->Auth->authError = "Usuário não logado";
                $data = array(
                    'status' => 401,
                    'message' => $this->Auth->authError,
                );
                $this->set('data', $data);
                $this->set('_serialize', 'data');
                $this->viewClass = 'Json';
                $this->render();
                $this->header('HTTP/1.1 401');
            }
        }
    }

}
