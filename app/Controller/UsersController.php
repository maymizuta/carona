<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('api_add', 'add', 'api_login', 'login'); // Permitindo que os usuários se registrem
        // Basic setup
//      $this->Auth->authenticate = array('Basic','Form');
        // Pass settings in
        $this->Auth->authenticate = array(
            'Basic' => array('userModel' => 'User', 'username' => 'email', 'password' => 'password'),
            'Form' => array('userModel' => 'User', 'username' => 'email', 'password' => 'password'),
        );
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * index method api
     *
     * @return void
     */
    public function api_index() {
        $users = $this->User->find('all');
        $this->set(array('users' => $users, '_serialize' => 'users'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function api_add() {
        $this->data = $this->request->input('json_decode');
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $message = "usuário salvo";
                $this->set(array('message' => $message, '_serialize' => array('message')));

                //   $this->Flash->success(__('The user has been saved.'));
                //   return $this->redirect(array('action' => 'index'));
            } else {
                $message = "Não foi possível salvar o usuário";
                $this->set(array('message' => $message, '_serialize' => array('message')));
                //   $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Função para login do usuário
     * @return type
     */
    public function api_login() {
        $this->Auth->logout();
        $this->data = $this->request->input('json_decode');
        $tmpUser['User']['email'] = $this->data->email;
        $tmpUser['User']['password'] = $this->data->password;

        $this->data = array(
            $this->Auth->userModel => array(
                    'email' => $tmpUser['User']['email'],
                    'password' => $tmpUser['User']['password'],
                ),
        );
        if ($this->request->is('post')) {
            $identifiedUser = $this->autentica($this->data);
            if ($identifiedUser !== false) {
                $this->Auth->login($identifiedUser);
                $this->response->statusCode(200);
                $status = $this->response->statusCode();
                $messages = array(__('Login com sucesso'));
            } else {
                $this->response->statusCode(400);
                $status = $this->response->statusCode();
                $messages = array(__("Senha ou email incorretos"));
            }
            $this->set(array(
                'status' => $status,
                'message' => array_values($messages),
                '_serialize' => array('status', 'message')
            ));
        }
        $this->viewClass = 'Json';
        $this->render();
    }

    /**
     * Função para finalizar a autenticação do usuário da sessão
     */
    public function api_logout() {
        $this->Auth->logout();
        $this->viewClass = 'Json';
        $this->render();
    }

    /**
     * Autenticação do usuário.
     * fonte: http://stackoverflow.com/questions/21745320/cakephp-authentication-on-rest-api
     * @param type $data
     * @return boolean | userModel
     */
    private function autentica($data) {
        $user = $this->User->find('first', array(
            'conditions' => array('User.email' => $data['']['email']),
        ));
        var_dump($user);
        if(is_null($user))
            return false;
        if($user['User']['password'] !== AuthComponent::password($data['']['password'])) {
            return false;
        }

        unset($user['User']['password']); 
        return $user;//retorna o usuário caso deseje utilizar o Authcomponent::login
    }

}
