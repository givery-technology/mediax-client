<?php
App::uses('AppModel', 'Model');
/**
 * Notice Model
 *
 */
class Notice extends AppModel
{

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'notice';

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = [
        'title' => [
            'notEmpty' => [
                'rule' => ['notEmpty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'content' => [
            'notEmpty' => [
                'rule' => ['notEmpty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'label' => [
            'notEmpty' => [
                'rule' => ['notEmpty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'history' => [
            'date' => [
                'rule' => ['date'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
    ];
}
