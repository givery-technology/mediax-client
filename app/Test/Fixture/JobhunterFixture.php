<?php
/**
 * JobhunterFixture
 *
 */
class JobhunterFixture extends CakeTestFixture
{

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'],
        'name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'furigana' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'email' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'mobile_email' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'birthday' => ['type' => 'date', 'null' => true, 'default' => null],
        'gender' => ['type' => 'boolean', 'null' => true, 'default' => null],
        'address' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'phone' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'last_education' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'marriage' => ['type' => 'boolean', 'null' => true, 'default' => null],
        'job_change' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 1],
        'experience' => ['type' => 'boolean', 'null' => true, 'default' => null],
        'certificate' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'certificate_comment' => ['type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'income' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'introduce' => ['type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'company_name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'industry' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'working_period' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'employment_type' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'position' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'woking_content' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'top1_employment_type' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'top1_job' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'top1_workingplace' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'top1_income' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'top1_characteristic' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'personal_type' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'created_csv' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'modified_csv' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'register' => ['type' => 'boolean', 'null' => true, 'default' => null],
        'contact' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'postcode' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'prefecture' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'city' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'address_no' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'building_name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'station' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'time_to_station' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 96, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'memo' => ['type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'furigana' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'mobile_email' => 'Lorem ipsum dolor sit amet',
            'birthday' => '2013-03-22',
            'gender' => 1,
            'address' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsum d',
            'last_education' => 'Lorem ipsum dolor sit amet',
            'marriage' => 1,
            'job_change' => 1,
            'experience' => 1,
            'certificate' => 'Lorem ipsum dolor sit amet',
            'certificate_comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'income' => 'Lorem ipsum dolor sit amet',
            'introduce' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'company_name' => 'Lorem ipsum dolor sit amet',
            'industry' => 'Lorem ipsum dolor sit amet',
            'working_period' => 'Lorem ipsum dolor sit amet',
            'employment_type' => 'Lorem ipsum dolor sit amet',
            'position' => 'Lorem ipsum dolor sit amet',
            'woking_content' => 'Lorem ipsum dolor sit amet',
            'top1_employment_type' => 'Lorem ipsum dolor sit amet',
            'top1_job' => 'Lorem ipsum dolor sit amet',
            'top1_workingplace' => 'Lorem ipsum dolor sit amet',
            'top1_income' => 'Lorem ipsum dolor sit amet',
            'top1_characteristic' => 'Lorem ipsum dolor sit amet',
            'personal_type' => 'Lorem ipsum dolor sit amet',
            'created_csv' => '2013-03-22 05:08:36',
            'modified_csv' => '2013-03-22 05:08:36',
            'created' => '2013-03-22 05:08:36',
            'modified' => '2013-03-22 05:08:36',
            'register' => 1,
            'contact' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ip',
            'prefecture' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'address_no' => 'Lorem ipsum dolor sit amet',
            'building_name' => 'Lorem ipsum dolor sit amet',
            'station' => 'Lorem ipsum dolor sit amet',
            'time_to_station' => 'Lorem ipsum dolor sit amet',
            'memo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
