<?php

App::uses('AppModel', 'Model');

/**
 * Carona Model
 *
 */
class Carona extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'caronasolidaria';
    public $hasMany = array(
        'Pedido' => array(
            'className' => 'Pedido',
            'foreignKey' => 'carona_id',
            'conditions' => '',
            'fields' => array('id'),
            'order' => ''
    ));

}
