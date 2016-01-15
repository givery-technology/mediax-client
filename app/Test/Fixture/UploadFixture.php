<?php
/**
 * UploadFixture
 *
 */
class UploadFixture extends CakeTestFixture
{

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'],
        'filename' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'filename' => 'Lorem ipsum dolor sit amet',
            'created' => '2013-03-22 05:11:00',
            'modified' => '2013-03-22 05:11:00'
        ],
    ];
}
