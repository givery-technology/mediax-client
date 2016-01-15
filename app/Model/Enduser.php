<?php
App::uses('AppModel', 'Model');
/**
 * Enduser Model
 *
 * @property User $User
 */
class Enduser extends AppModel
{

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'enduser';

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
    public $validate = [
        'company' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'pwd' => [
            'notempty' => [
                'rule' => ['notempty'],
                'on' => 'create'
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'email' => [
            'email' => [
                'rule' => ['email'],
                'message' => 'Eメールを記入してください',
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
            'unique' => [
                'rule' => 'isUnique',
                'message' => 'このEメールは事前に登録しました。',
            ],
        ],
        'keystr' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
    ];


    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = [
        'User' => [
            'className' => 'User',
            'foreignKey' => 'parent',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ]
    ];
}
