<?php
class AppSchema extends CakeSchema
{

    public function before($event = [])
    {
        return true;
    }

    public function after($event = [])
    {
    }

    public $contactus = [
        'subject' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'body' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'userid' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'date' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'status' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $durations = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'StartDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'EndDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'Flag' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => false],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'sjis', 'collate' => 'sjis_japanese_ci', 'engine' => 'MyISAM']
    ];

    public $emaildb = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'company' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'name' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'tel' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'email' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'content' => ['type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'time' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 12, 'unsigned' => false],
        'ip' => ['type' => 'string', 'null' => false, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'url' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'supportor' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'status' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'userid' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'unsigned' => false],
        'subject' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $enduser = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'],
        'supportor' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'pwd' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'email' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'company' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'department' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'name' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'tel' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'fax' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'homepage' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'remark' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'status' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true],
        'date' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 12, 'unsigned' => true],
        'address' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'zipcode' => ['type' => 'string', 'null' => false, 'length' => 115, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'CHPCode' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'CHPTime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'hosyou' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'seikou' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'loginip' => ['type' => 'string', 'null' => false, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'logintime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 14, 'unsigned' => false],
        'agent' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false],
        'money_bank' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'sellremark' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'techremark' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'billlastday' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'parent' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'custom' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'keystr' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $engines = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'primary'],
        'Name' => ['type' => 'string', 'null' => false, 'length' => 20, 'collate' => 'sjis_japanese_ci', 'charset' => 'sjis'],
        'ShowName' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Short' => ['type' => 'string', 'null' => false, 'length' => 10, 'collate' => 'sjis_japanese_ci', 'charset' => 'sjis'],
        'Code' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'sjis', 'collate' => 'sjis_japanese_ci', 'engine' => 'MyISAM']
    ];

    public $extra = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'primary'],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => false, 'key' => 'index'],
        'ExtraType' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => false, 'comment' => '1 - in top 5, 2 - in top 3'],
        'Price' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1],
            'keyi' => ['column' => 'KeyID', 'unique' => 0]
        ],
        'tableParameters' => ['charset' => 'sjis', 'collate' => 'sjis_japanese_ci', 'engine' => 'MyISAM']
    ];

    public $keywords = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'primary'],
        'UserID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => false, 'key' => 'index'],
        'server_id' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false],
        'Keyword' => ['type' => 'string', 'null' => false, 'length' => 100, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Url' => ['type' => 'string', 'null' => false, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Engine' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'key' => 'index'],
        'g_local' => ['type' => 'string', 'null' => false, 'default' => '1', 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'cost' => ['type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false],
        'Price' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false, 'key' => 'index'],
        'limit_price' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false],
        'limit_price_group' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false, 'comment' => 'set limit price group: 1,2,3'],
        'upday' => ['type' => 'string', 'null' => false, 'default' => '0', 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'goukeifee' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'sengoukeifee' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        '$sensengoukeifee' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'Enabled' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'Strict' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'Extra' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'start' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'rankstart' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'rankend' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'kaiyaku_reason' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'middle' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'middleinfo' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false],
        'seika' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'nocontract' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'csv_type' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'comment' => '[1=直営,2=直営2 , 3=代理店,4=ビスカス,5=アサミ,6=エニー]'],
        'penalty' => ['type' => 'boolean', 'null' => false, 'default' => null],
        'service' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false],
        'mobile' => ['type' => 'boolean', 'null' => false, 'default' => null],
        'c_logic' => ['type' => 'boolean', 'null' => false, 'default' => null, 'comment' => 'Ranking restricted to company logic'],
        'sales' => ['type' => 'boolean', 'null' => true, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'sitename' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'CSV', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1],
            'ke' => ['column' => ['UserID', 'Enabled'], 'unique' => 0],
            'Price' => ['column' => 'Price', 'unique' => 0],
            'Engine' => ['column' => 'Engine', 'unique' => 0],
            'Keyword' => ['column' => 'Keyword', 'type' => 'fulltext']
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $logs = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'user_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false],
        'log' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'pre&after data log', 'charset' => 'utf8'],
        'ip' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'useragent' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'mvc' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'read' => ['type' => 'boolean', 'null' => false, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $m_rankhistories = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'keyword_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false],
        'engine_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false],
        'keyword' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'url' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'rank' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'rankdate' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $nocontractkey = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'primary'],
        'UserID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => false, 'key' => 'index'],
        'Keyword' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Url' => ['type' => 'string', 'null' => false, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Engine' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'Price' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false, 'key' => 'index'],
        'upday' => ['type' => 'string', 'null' => false, 'default' => '0', 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'goukeifee' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'sengoukeifee' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        '$sensengoukeifee' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'Enabled' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'Strict' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'Extra' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'start' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'rankstart' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'rankend' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'kaiyaku_reason' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'middle' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'middleinfo' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1],
            'ke' => ['column' => ['UserID', 'Enabled'], 'unique' => 0],
            'Price' => ['column' => 'Price', 'unique' => 0]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $notice = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'title' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'content' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'label' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'history' => ['type' => 'date', 'null' => false, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $orders = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false, 'key' => 'primary'],
        'UserID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => false],
        'Keywords' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Url' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'TotalPrice' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false],
        'Enabled' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'OrderDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'EnableDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'sjis', 'collate' => 'sjis_japanese_ci', 'engine' => 'MyISAM']
    ];

    public $quote_supportor = [
        'supportorid' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 12, 'unsigned' => false, 'key' => 'primary'],
        'name' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'email' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'fullname' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'supportorid', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $rankhistory = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'Url' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'Rank' => ['type' => 'string', 'null' => false, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'RankDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'params' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $rankhistoryss = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'Url' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'Rank' => ['type' => 'string', 'null' => false, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'RankDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $rankkeywords = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'Keyword' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'google_jp' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'yahoo_jp' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'google_en' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'yahoo_en' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'bing' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $ranklogs = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'keyword_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false],
        'engine_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false],
        'keyword' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'url' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'rank' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'params' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'rankdate' => ['type' => 'date', 'null' => false, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB']
    ];

    public $ranks = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'keyword_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false],
        'engine_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false],
        'keyword' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'url' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'rank' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'rankdate' => ['type' => 'date', 'null' => false, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $resell_endcustom = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'resellid' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'customid' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $sales_goals = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'type' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '1:seika montly 2:seika daily'],
        'goal' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false],
        'target' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => 'target day, month or year', 'charset' => 'utf8'],
        'date' => ['type' => 'date', 'null' => false, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $sales_keywords = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'keyword_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false],
        'user_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false],
        'keyword' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'rank' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'sales' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false],
        'cost' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false],
        'profit' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false],
        'limit' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false],
        'date' => ['type' => 'date', 'null' => false, 'default' => null],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $sendemail = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'],
        'status' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $seohistory = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'primary'],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'Remark' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Finish' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'AddDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $servers = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
        'code' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false, 'comment' => 'Server Code'],
        'name' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'ip' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'location' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'api' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'memo' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'timestamp', 'null' => false, 'default' => null],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $servicelog = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'],
        'LogTime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'Content' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'Type' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => false],
        'Checked' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $syslog = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'],
        'LogTime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'Content' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'ip' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'indexes' => [
            'PRIMARY' => ['column' => 'ID', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];

    public $tmp = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'Url' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'Rank' => ['type' => 'string', 'null' => false, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'RankDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'params' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM']
    ];

    public $tmp_rankhistory = [
        'ID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'KeyID' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false],
        'Url' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'Rank' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'RankDate' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'params' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'indexes' => [
            
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
    ];

    public $user = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'],
        'supportor' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false],
        'pwd' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'email' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'company' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'department' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'name' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'tel' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'fax' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'homepage' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'remark' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'status' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true],
        'date' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 12, 'unsigned' => true],
        'address' => ['type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'zipcode' => ['type' => 'string', 'null' => false, 'length' => 115, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'CHPCode' => ['type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'CHPTime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false],
        'hosyou' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'seikou' => ['type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'loginip' => ['type' => 'string', 'null' => false, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'logintime' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 14, 'unsigned' => false],
        'agent' => ['type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false],
        'money_bank' => ['type' => 'boolean', 'null' => false, 'default' => '0'],
        'sellremark' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'techremark' => ['type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'billlastday' => ['type' => 'string', 'null' => false, 'default' => '翌月末', 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'password' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'role' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 5, 'unsigned' => false],
        'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'updated' => ['type' => 'datetime', 'null' => false, 'default' => null],
        'logo' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
        'limit_price_multi' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false],
        'limit_price_multi2' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false],
        'limit_price_multi3' => ['type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1]
        ],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
    ];
}
