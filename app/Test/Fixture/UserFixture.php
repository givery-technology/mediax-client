<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture
{

/**
 * Table name
 *
 * @var string
 */
    public $table = 'user';

/**
 * Fields
 *
 * @var array
 */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'],
        'supportor' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4],
        'pwd' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'email' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'company' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'department' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'name' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'tel' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'fax' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'homepage' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'remark' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'status' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10],
        'date' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 12],
        'address' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'zipcode' => ['type' => 'string', 'null' => false, 'length' => 115, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'CHPCode' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'CHPTime' => ['type' => 'integer', 'null' => false, 'default' => '0'],
        'hosyou' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'seikou' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'loginip' => ['type' => 'string', 'null' => false, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'logintime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 14],
        'agent' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1],
        'money_bank' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'sellremark' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'techremark' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'billlastday' => ['type' => 'string', 'null' => false, 'default' => '翌月末', 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

/**
 * Records
 *
 * @var array
 */
    public $records = [
        [
            'id' => 1,
            'supportor' => 1,
            'pwd' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'company' => 'Lorem ipsum dolor sit amet',
            'department' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'tel' => 'Lorem ipsum dolor sit amet',
            'fax' => 'Lorem ipsum dolor sit amet',
            'homepage' => 'Lorem ipsum dolor sit amet',
            'remark' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'status' => 1,
            'date' => 1,
            'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'zipcode' => 'Lorem ipsum dolor sit amet',
            'CHPCode' => 'Lorem ipsum dolor sit amet',
            'CHPTime' => 1,
            'hosyou' => 'Lorem ipsum dolor sit amet',
            'seikou' => 'Lorem ipsum dolor sit amet',
            'loginip' => 'Lorem ipsum dolor ',
            'logintime' => 1,
            'agent' => 1,
            'money_bank' => 1,
            'sellremark' => 'Lorem ipsum dolor sit amet',
            'techremark' => 'Lorem ipsum dolor sit amet',
            'billlastday' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
