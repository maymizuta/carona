<?php
App::uses('AppController', 'Controller');
/**
 * Historicos Controller
 *
 * @property Historico $Historico
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */
class HistoricosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session','RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Historico->recursive = 0;
		$this->set('historicos', $this->Paginator->paginate());
	}
    //new 
          public function api_index() {
                $historico =$this->Historico->find('all');
                $this->set(array('historico'=>$historico, '_serialize'=>'historico'));
        }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Historico->exists($id)) {
			throw new NotFoundException(__('Invalid historico'));
		}
		$options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
		$this->set('historico', $this->Historico->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Historico->create();
			if ($this->Historico->save($this->request->data)) {
				return $this->flash(__('The historico has been saved.'), array('action' => 'index'));
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
                        $this->Historico->create();
                        if ($this->Historico->save($this->request->data)) {
				$message = "Historico realizado com sucesso";
	          	      $this->set(array('message'=>$message, '_serialize'=>array('message')));

                             //   $this->Flash->success(__('The user has been saved.'));
                            //   return $this->redirect(array('action' => 'index'));
                        } else {
                              $message = "Não foi possível salvar o historico";
                              $this->set(array('message'=>$message, '_serialize'=>array('message')));
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
		if (!$this->Historico->exists($id)) {
			throw new NotFoundException(__('Invalid historico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Historico->save($this->request->data)) {
				return $this->flash(__('The historico has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
			$this->request->data = $this->Historico->find('first', $options);
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
		$this->Historico->id = $id;
		if (!$this->Historico->exists()) {
			throw new NotFoundException(__('Invalid historico'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Historico->delete()) {
			return $this->flash(__('The historico has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The historico could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Historico->recursive = 0;
		$this->set('historicos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Historico->exists($id)) {
			throw new NotFoundException(__('Invalid historico'));
		}
		$options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
		$this->set('historico', $this->Historico->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Historico->create();
			if ($this->Historico->save($this->request->data)) {
				return $this->flash(__('The historico has been saved.'), array('action' => 'index'));
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
		if (!$this->Historico->exists($id)) {
			throw new NotFoundException(__('Invalid historico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Historico->save($this->request->data)) {
				return $this->flash(__('The historico has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
			$this->request->data = $this->Historico->find('first', $options);
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
		$this->Historico->id = $id;
		if (!$this->Historico->exists()) {
			throw new NotFoundException(__('Invalid historico'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Historico->delete()) {
			return $this->flash(__('The historico has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The historico could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
