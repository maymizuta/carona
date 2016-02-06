<?php

App::uses('AppController', 'Controller');

/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PedidosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session', 'RequestHandler', 'Auth');

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow(array('api_add', 'api_index', 'api_view', 'api_accept'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Pedido->recursive = 0;
        $this->set('pedidos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Pedido->exists($id)) {
            throw new NotFoundException(__('Invalid pedido'));
        }
        $options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
        $this->set('pedido', $this->Pedido->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Pedido->create();
            if ($this->Pedido->save($this->request->data)) {
                $this->Flash->success(__('The pedido has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $users = $this->Pedido->User->find('list');
        $caronas = $this->Pedido->Carona->find('list');
        $this->set(compact('users', 'caronas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Pedido->exists($id)) {
            throw new NotFoundException(__('Invalid pedido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pedido->save($this->request->data)) {
                $this->Flash->success(__('The pedido has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
            $this->request->data = $this->Pedido->find('first', $options);
        }
        $users = $this->Pedido->User->find('list');
        $caronas = $this->Pedido->Carona->find('list');
        $this->set(compact('users', 'caronas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Pedido->id = $id;
        if (!$this->Pedido->exists()) {
            throw new NotFoundException(__('Invalid pedido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pedido->delete()) {
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Lista pedidos de carona de acordo com o usuário caroneiro
     *
     * @return void
     */
    public function api_index() {
//Todo: Separar os pedidos de acordo com o id do usuário caroneiro
        $userId = $this->Session->read('User.id');
        $pedidos = $this->Pedido->findAllByUserId($userId);
        $this->set(array('Pedidos' => $pedidos, '_serialize' => 'Pedidos'));
    }

    /**
     * api_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function api_view($id = null) {
        $this->data = $this->request->input('json_decode');
        if (!$this->Pedido->exists($id)) {
            throw new NotFoundException(__('Invalid pedido'));
        }
        $options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
        $this->set(array('pedido' => $this->Pedido->find('first', $options), '_serialize' => array('pedido')));
    }

    /**
     * Adiciona pedidos de carona
     *
     * @return void
     */
    public function api_add() {
        $this->data = $this->request->input('json_decode');
        if ($this->request->is('post')) {
            $this->Pedido->create();
            $this->Pedido->User[array("id" => $this->Session->read('User.id'))];
            $message = ($this->Pedido->save($this->request->data)) ?
                    "Pedido salvo" :
                    "Não foi possível salvar o pedido";
            $this->set(array('message' => $message, '_serialize' => array('message')));
        }
    }

    /**
     * api_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function api_edit($id = null) {
        $this->data = $this->request->input('json_decode');
        if (!$this->Pedido->exists($id)) {
            throw new NotFoundException(__('Invalid pedido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pedido->save($this->request->data)) {
                $message = "O pedido foi salvo com sucesso";
                $this->set(array('message' => $message, '_serialize' => array('message')));
            } else {
                $message = "Não foi possível salvar o pedido";
                $this->set(array('message' => $message, '_serialize' => array('message')));
            }
        } else {
            $options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
            $this->request->data = $this->Pedido->find('first', $options);
        }
    }

    /**
     * Confirma o pedido por quem vai dar a carona via api json
     * Método POST
     */
    public function api_confirm() {
        $this->data = $this->request->input('json_decode');
        $pedido = $this->Pedido->findById($this->data->Pedido->id);
        try {
            if (isset($pedido))
                if ($this->request->is('post') &&
                        $pedido['Carona']['user_id'] == $this->Session->read('User.id')) {
                    CakeLog::write('debug', 'Aceita ou não o pedido');
                    $pedido[array('aceito' => $this->data->Pedido->aceito)];
                    $message = ($this->Pedido->save()) ?
                            "Pedido Salvo" :
                            "Não foi possível salvar o pedido";
                } else {
                    $message = "Não foi possível confirmar o pedido";
                }
        } catch (Exception $e) {
            CakeLog::write("debug", "Erro ao aceitar o pedido" . $e->getMessage());
            $message = "Erro ao aceitar o pedido";
        }
        $this->set(array('message' => $message, '_serialize' => array('message')));
    }

    /**
     * api_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function api_delete($id = null) {
        $this->data = $this->request->input('json_decode');
        $this->Pedido->id = $id;
        if (!$this->Pedido->exists()) {
            throw new NotFoundException(__('Invalid pedido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pedido->delete()) {
            $message = "O pedido foi deletado";
            $this->set(array('message' => $message, '_serialize' => array('message')));
        } else {
            $message = "O pedido não pode ser deletado, por favor tente novamente";
            $this->set(array('message' => $message, '_serialize' => array('message')));
        }
    }

}
