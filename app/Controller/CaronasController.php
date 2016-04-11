<?php

App::uses('AppController', 'Controller');

/**
 * Caronas Controller
 *
 * @property Carona $Carona
 * @property PaginatorComponent $Paginator
 */
class CaronasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Carona->recursive = 0;
        $this->set('caronas', $this->Paginator->paginate());
    }


    /**
     * index method api
     *
     * @return void
     */
    public function api_index() {

        $lat = isset($this->request->query['lat']);
        $long = isset($this->request->query['long']);
        
        $carona = $this->Carona->findNear($lat,$long);
        $this->set(array('carona' => $carona, '_serialize' => 'carona'));
    }
    
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Carona->exists($id)) {
            throw new NotFoundException(__('Invalid carona'));
        }
        $options = array('conditions' => array('Carona.' . $this->Carona->primaryKey => $id));
        $this->set('carona', $this->Carona->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function api_add() {
        $this->data = $this->request->input('json_decode');
        if ($this->request->is('post')) {
            $this->Carona->create();
            if ($this->Carona->save($this->request->data)) {
                $message = "Salvo com sucesso";
            } else {
                $message = "Não foi possível salvar";
            }
            $this->set(array('message' => $message, '_serialize' => 'message'));
        }
    }

    
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function api_edit() {
        $this->data = $this->request->input('json_decode');
        if (!$this->Carona->exists($this->data->Carona->id)) {
            $message = array('message'=>"Carona inexistente");
            $this->set(array('message' => $message, '_serialize' => 'message'));
            return;
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Carona->save($this->request->data)) {
                $message = array('message'=>"Carona salva");
            } else {
                $message = array('message'=>"Não foi possível salvar a carona");
            }
        }
        $this->set(array('message' => $message, '_serialize' => 'message'));
    }

    
    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function api_delete($id = null) {
        $this->data = $this->request->input('json_decode');
        $this->request->allowMethod('post', 'delete');
        if (!$this->Carona->exists($this->data->Carona->id)) {
            $message = "A carona não existe";
            $this->set(array('message' => $message, '_serialize' => array('message')));
            return;
        }
        if ($this->Carona->delete($this->data->Carona->id)) {
            $message = "A carona foi deletada";
        } else {
            $message = "A carona não pode ser deletada, por favor tente novamente";
        }
        $this->set(array('message' => $message, '_serialize' => array('message')));
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Carona->recursive = 0;
        $this->set('caronas', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Carona->exists($id)) {
            throw new NotFoundException(__('Invalid carona'));
        }
        $options = array('conditions' => array('Carona.' . $this->Carona->primaryKey => $id));
        $this->set('carona', $this->Carona->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Carona->create();
            if ($this->Carona->save($this->request->data)) {
                $this->Flash->success(__('The carona has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The carona could not be saved. Please, try again.'));
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
        if (!$this->Carona->exists($id)) {
            throw new NotFoundException(__('Invalid carona'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Carona->save($this->request->data)) {
                $this->Flash->success(__('The carona has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The carona could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Carona.' . $this->Carona->primaryKey => $id));
            $this->request->data = $this->Carona->find('first', $options);
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
        $this->Carona->id = $id;
        if (!$this->Carona->exists()) {
            throw new NotFoundException(__('Invalid carona'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Carona->delete()) {
            $this->Flash->success(__('The carona has been deleted.'));
        } else {
            $this->Flash->error(__('The carona could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
