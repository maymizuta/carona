<?php
App::uses('AppController', 'Controller');
/**
 * Agendamentos Controller
 *
 * @property Agendamento $Agendamento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AgendamentosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agendamento->recursive = 0;
		$this->set('agendamentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Agendamento->exists($id)) {
			throw new NotFoundException(__('Invalid agendamento'));
		}
		$options = array('conditions' => array('Agendamento.' . $this->Agendamento->primaryKey => $id));
		$this->set('agendamento', $this->Agendamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Agendamento->create();
			if ($this->Agendamento->save($this->request->data)) {
				$this->Flash->success(__('The agendamento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The agendamento could not be saved. Please, try again.'));
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
		if (!$this->Agendamento->exists($id)) {
			throw new NotFoundException(__('Invalid agendamento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Agendamento->save($this->request->data)) {
				$this->Flash->success(__('The agendamento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The agendamento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Agendamento.' . $this->Agendamento->primaryKey => $id));
			$this->request->data = $this->Agendamento->find('first', $options);
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
		$this->Agendamento->id = $id;
		if (!$this->Agendamento->exists()) {
			throw new NotFoundException(__('Invalid agendamento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Agendamento->delete()) {
			$this->Flash->success(__('The agendamento has been deleted.'));
		} else {
			$this->Flash->error(__('The agendamento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Agendamento->recursive = 0;
		$this->set('agendamentos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Agendamento->exists($id)) {
			throw new NotFoundException(__('Invalid agendamento'));
		}
		$options = array('conditions' => array('Agendamento.' . $this->Agendamento->primaryKey => $id));
		$this->set('agendamento', $this->Agendamento->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Agendamento->create();
			if ($this->Agendamento->save($this->request->data)) {
				$this->Flash->success(__('The agendamento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The agendamento could not be saved. Please, try again.'));
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
		if (!$this->Agendamento->exists($id)) {
			throw new NotFoundException(__('Invalid agendamento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Agendamento->save($this->request->data)) {
				$this->Flash->success(__('The agendamento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The agendamento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Agendamento.' . $this->Agendamento->primaryKey => $id));
			$this->request->data = $this->Agendamento->find('first', $options);
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
		$this->Agendamento->id = $id;
		if (!$this->Agendamento->exists()) {
			throw new NotFoundException(__('Invalid agendamento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Agendamento->delete()) {
			$this->Flash->success(__('The agendamento has been deleted.'));
		} else {
			$this->Flash->error(__('The agendamento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
