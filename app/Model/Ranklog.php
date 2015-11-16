<?php
App::uses('AppModel', 'Model');
/**
 * Ranklog Model
 *
 * @property Keyword $Keyword
 * @property Engine $Engine
 */
class Ranklog extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'keyword_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rank' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rankdate' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Keyword' => array(
			'className' => 'Keyword',
			'foreignKey' => 'keyword_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Engine' => array(
			'className' => 'Engine',
			'foreignKey' => 'engine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
