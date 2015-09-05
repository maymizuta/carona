<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'caronasolidaria';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

}
