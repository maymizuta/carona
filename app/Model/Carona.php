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
    public $hasOne = array('User'=>
        array(
            'className' => 'User',
            'foreignKey' =>'',
            'fields'=> array('id','nome')
        ));
    
    /**
     * Método para encontrar as caronas mais próximas, de acordo com um ponto 
     * de origem.
     * @param type $lat latitude
     * @param type $long longitude
     * @param type $radius distancia máxima a ser localizada
     * @return type
     */
    public function findNear($lat,$long, $radius = 10){
        /**
         * @link http://www.plumislandmedia.net/mysql/haversine-mysql-nearest-loc/ Havisine
         * DEGREES(ACOS(COS(RADIANS('inicialLatitude')) * COS(RADIANS($lat)) *
             COS(RADIANS('inicialLongitude') - RADIANS($long)) +
             SIN(RADIANS('inicialLatitude')) * SIN(RADIANS($lat)))) * 111.045 <= $radius
         * 111.045 = distancia em kilometros
         */
        return $this->find('all',array("conditions"=> "DEGREES(ACOS(COS(RADIANS('inicialLatitude')) * COS(RADIANS($lat)) * " .
                                                      "COS(RADIANS('inicialLongitude') - RADIANS($long)) + " .
                                                      "SIN(RADIANS('inicialLatitude')) * SIN(RADIANS($lat))))* 111.045 <= $radius"));
    }
}
