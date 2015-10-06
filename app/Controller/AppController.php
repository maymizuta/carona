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
        'RequestHandler',
        'Auth' => array(
//            'authorize'         => array('Controller'),// Linha retirada: erro ao identificar o root como controller
            'authorize' => array('Actions' => array('actionPath' => 'controllers')),
            'RequestHandler',
        )
    );

    function beforeFilter() {

        $this->Auth->allow('index', 'view', 'api_login', 'login', 'display','home');
        //Definicao do formulario para login
        $this->Auth->authenticate = array(
            //username:campo do banco que sera usado para identificar o usuario
            AuthComponent::ALL => array('fields' => array('username' => 'email')), 'Form');
        $this->Auth->loginAction = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'api_login',
        );
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'json') {
            $this->Auth->authenticate = array('Basic');
            if (!$this->Auth->login()) {
                $this->response->statusCode(400);
                $data = array(
                    'status' => 400,
                    'message' => array($this->Auth->authError),
                );
                $this->set('data', $data);
                $this->set('_serialize', 'data');

                $this->viewClass = 'Json';
                $this->render();
            }
        }
    }

}
