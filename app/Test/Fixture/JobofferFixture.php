<?php
/**
 * JobofferFixture
 *
 */
class JobofferFixture extends CakeTestFixture
{

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'],
        'company_id' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 20],
        'status' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 1],
        'accept_number' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'job_cat1' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'job_cat2' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'job_cat3' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'job_cat4' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'age' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'education_history' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'working_place' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'working_content' => ['type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'experience_need' => ['type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'income' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'employment_type' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'working_time' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'insurance' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'benefit' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'dayoff' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'year_dayoff' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'postcode' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'prefecture' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'city' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'address_no' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'building_name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'contact' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => true, 'default' => null],
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
            'company_id' => 1,
            'status' => 1,
            'accept_number' => 'Lorem ipsum dolor sit amet',
            'job_cat1' => 'Lorem ipsum dolor sit amet',
            'job_cat2' => 'Lorem ipsum dolor sit amet',
            'job_cat3' => 'Lorem ipsum dolor sit amet',
            'job_cat4' => 'Lorem ipsum dolor sit amet',
            'age' => 'Lorem ipsum dolor sit amet',
            'education_history' => 'Lorem ipsum dolor sit amet',
            'working_place' => 'Lorem ipsum dolor sit amet',
            'working_content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'experience_need' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'income' => 'Lorem ipsum dolor sit amet',
            'employment_type' => 'Lorem ipsum dolor sit amet',
            'working_time' => 'Lorem ipsum dolor sit amet',
            'insurance' => 'Lorem ipsum dolor sit amet',
            'benefit' => 'Lorem ipsum dolor sit amet',
            'dayoff' => 'Lorem ipsum dolor sit amet',
            'year_dayoff' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ip',
            'prefecture' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'address_no' => 'Lorem ipsum dolor sit amet',
            'building_name' => 'Lorem ipsum dolor sit amet',
            'contact' => 'Lorem ipsum dolor sit amet',
            'created' => '2013-03-22 05:09:45',
            'modified' => '2013-03-22 05:09:45'
        ],
    ];
}
