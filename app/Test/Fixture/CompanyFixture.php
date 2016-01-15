<?php
/**
 * CompanyFixture
 *
 */
class CompanyFixture extends CakeTestFixture
{

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'],
        'contact' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'furigana' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'working_time' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'welfare_facilities' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'benefit' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'dayoff' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'postcode' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'prefecture' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'city' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'address_no' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'building_name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'billing_destination' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
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
            'contact' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'furigana' => 'Lorem ipsum dolor sit amet',
            'working_time' => 'Lorem ipsum dolor sit amet',
            'welfare_facilities' => 'Lorem ipsum dolor sit amet',
            'benefit' => 'Lorem ipsum dolor sit amet',
            'dayoff' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ip',
            'prefecture' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'address_no' => 'Lorem ipsum dolor sit amet',
            'building_name' => 'Lorem ipsum dolor sit amet',
            'billing_destination' => 'Lorem ipsum dolor sit amet',
            'created' => '2013-03-22 05:08:54',
            'modifield' => '2013-03-22 05:08:54'
        ],
    ];
}
