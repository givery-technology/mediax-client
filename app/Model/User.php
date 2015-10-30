<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Keyword $Keyword
 */
class User extends AppModel {

        public $actsAs = array('Containable');
/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'user';

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';


/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'pwd' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'on' => 'create'
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Eメールを記入してください',
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'このEメールは事前に登録しました。',
            ),          
        ),
        'company' => array(
            'notempty' => array(
                'rule' => array('notempty'),
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
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Keyword' => array(
            'className' => 'Keyword',
            'foreignKey' => 'UserID',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Contactus' => array(
            'className' => 'Contactus',
            'foreignKey' => 'userid',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
