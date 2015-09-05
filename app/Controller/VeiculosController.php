<?php
App::uses('AppController', 'Controller');
/**
 * Veiculos Controller
 *
 * @property Veiculo $Veiculo
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */
class VeiculosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Veiculo->recursive = 0;
		$this->set('veiculos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Veiculo->exists($id)) {
			throw new NotFoundException(__('Invalid veiculo'));
		}
		$options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
		$this->set('veiculo', $this->Veiculo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Veiculo->create();
			if ($this->Veiculo->save($this->request->data)) {
				return $this->flash(__('The veiculo has been saved.'), array('action' => 'index'));
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
		if (!$this->Veiculo->exists($id)) {
			throw new NotFoundException(__('Invalid veiculo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Veiculo->save($this->request->data)) {
				return $this->flash(__('The veiculo has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
			$this->request->data = $this->Veiculo->find('first', $options);
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
		$this->Veiculo->id = $id;
		if (!$this->Veiculo->exists()) {
			throw new NotFoundException(__('Invalid veiculo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Veiculo->delete()) {
			return $this->flash(__('The veiculo has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The veiculo could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Veiculo->recursive = 0;
		$this->set('veiculos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Veiculo->exists($id)) {
			throw new NotFoundException(__('Invalid veiculo'));
		}
		$options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
		$this->set('veiculo', $this->Veiculo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Veiculo->create();
			if ($this->Veiculo->save($this->request->data)) {
				return $this->flash(__('The veiculo has been saved.'), array('action' => 'index'));
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
		if (!$this->Veiculo->exists($id)) {
			throw new NotFoundException(__('Invalid veiculo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Veiculo->save($this->request->data)) {
				return $this->flash(__('The veiculo has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
			$this->request->data = $this->Veiculo->find('first', $options);
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
		$this->Veiculo->id = $id;
		if (!$this->Veiculo->exists()) {
			throw new NotFoundException(__('Invalid veiculo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Veiculo->delete()) {
			return $this->flash(__('The veiculo has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The veiculo could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
