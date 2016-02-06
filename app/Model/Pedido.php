<?php
App::uses('AppModel', 'Model');
/**
 * Pedido Model
 *
 * @property User $User
 * @property Carona $Carona
 */
class Pedido extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'caronasolidaria';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => array('email','id','nome'),
			'order' => ''
		),
		'Carona' => array(
			'className' => 'Carona',
			'foreignKey' => 'carona_id',
			'conditions' => '',
			'fields' => array('id', 'user_id'),
			'order' => ''
		)
	);
}
