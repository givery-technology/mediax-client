<?php
App::uses('AppModel', 'Model');
/**
 * Keyword Model
 *
 * @property Extra $Extra
 * @property Duration $Duration
 * @property User $User
 * @property Rankhistory $Rankhistory
 * @property Rankhistory $Rankhistory
 */
 
/**
 * Keyword Model
 *
 */
class Keyword extends AppModel
{

/**
 * Primary key field
 *
 * @var string
 */
    public $primaryKey = 'ID';

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'ID';

//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
    public $hasOne = [
        /*'Duration' => array(
            'className' => 'Duration',
            'foreignKey' => 'KeyID',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )*/
    ];

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = [
        'User' => [
            'className' => 'User',
            'foreignKey' => 'UserID',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ]
    ];

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = [
        'Rankhistory' => [
            'className' => 'Rankhistory',
            'foreignKey' => 'KeyID',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
        'Extra' => [
            'className' => 'Extra',
            'foreignKey' => 'KeyID',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'Duration' => [
            'className' => 'Duration',
            'foreignKey' => 'KeyID',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'Ranklog' => [
            'className' => 'Ranklog',
            'foreignKey' => 'keyword_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
    ];

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = [
        'UserID' => [
            'numeric' => [
                'rule' => ['numeric'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'Keyword' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
            'hankaku' => [
                'rule'=> ['hanKaku'],
                'message' => '英文また数字は全て半角です。'
            ],
        ],
        'Url' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'Engine' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'Strict' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'seika' => [
            'notempty' => [
                'rule' => ['notempty'],
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ],
        ],
        'nocontract' => [
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

/**
 * CSV export
 *
 * @var array
 */
    public $actsAs = [
        'CsvExport' => [
            'delimiter' => ',', //The delimiter for the values, default is ;
            'enclosure' => '"', //The enclosure, default is "
            'max_execution_time' => 360, //Increase for Models with lots of data, has no effect is php safemode is enabled.
            'encoding' => 'utf8' //Prefixes the return file with a BOM and attempts to utf_encode() data
        ]
    ];
}
