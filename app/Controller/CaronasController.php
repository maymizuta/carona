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
	public $components = array('Paginator','RequestHandler');

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
                $data =$this->Carona->find('all');
                $this->set(array('data'=>$data, '_serialize'=>array('data')));
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
	public function add() {
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
 * add method
 *
 * @return void
 */
        public function api_add() {
        $this->data = $this->request->input('json_decode');
                if ($this->request->is('post')) {
                        $this->Carona->create();
                        if ($this->Carona->save($this->request->data)) {
                                $message = "salvo com sucesso";
                                $this->set(array('message'=>$message,'_serialize'=>array('message')));

                             //   $this->Flash->success(__('The user has been saved.'));
                            //   return $this->redirect(array('action' => 'index'));
                        } else {
                              $message = "Não foi possível salvar";
                              $this->set(array('message'=>$message, '_serialize'=>array('message')));
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
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
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
