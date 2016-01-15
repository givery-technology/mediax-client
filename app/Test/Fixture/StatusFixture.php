<?php
/**
 * StatusFixture
 *
 */
class StatusFixture extends CakeTestFixture
{

/**
 * Table name
 *
 * @var string
 */
    public $table = 'status';

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'],
        'jobhunter_id' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 20],
        'companies_id' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 20],
        'flag' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 4],
        'end_date' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'modifield' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB']
    ];

/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'jobhunter_id' => 1,
            'companies_id' => 1,
            'flag' => 1,
            'end_date' => '2013-03-22 05:10:16',
            'created' => '2013-03-22 05:10:16',
            'modifield' => '2013-03-22 05:10:16'
        ],
    ];
}
