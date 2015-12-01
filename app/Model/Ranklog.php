<?php
App::uses('AppModel', 'Model');
/**
 * Ranklog Model
 *
 * @property Keyword $Keyword
 * @property Engine $Engine
 */
class Ranklog extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'keyword_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rank' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rankdate' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Keyword' => array(
			'className' => 'Keyword',
			'foreignKey' => 'keyword_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Engine' => array(
			'className' => 'Engine',
			'foreignKey' => 'engine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
/**
 * CSV export
 *
 * @var array
 */
    public $actsAs = array(
        'CsvExport' => array(
            'delimiter' => ',', //The delimiter for the values, default is ;
            'enclosure' => '"', //The enclosure, default is "
            'max_execution_time' => 360, //Increase for Models with lots of data, has no effect is php safemode is enabled.
            'encoding' => 'utf8' //Prefixes the return file with a BOM and attempts to utf_encode() data
        )
    );

	public function header_csv_by_keyword($headers, $mapHeader) {
        $data_headers = array();
        foreach ($headers as $key => $header) {
            if (isset($mapHeader[$header]) && !empty($mapHeader[$header])) {
                if($header=='Ranklog.rank'){
					$data_headers[] = $mapHeader[$header];
                }else{
                    $data_headers[] = $mapHeader[$header];
                }                                
            } else {
                $data_headers[$key] = $header;
            }
        }
        return $data_headers;
    }

    public function row_csv_by_keyword($values) {
        $data_values = array();
        foreach ($values as $key => $value) {
            if($key=='Ranklog.rank'){
                $value = $this->bestRank($value);
				$data_values[$key] = $value;
            }else if($key=='Ranklog.rankdate'){
                $data_values[$key] = $value;
            }else{
                $data_values[$key] = $value;
            }                        
        }
		
        return $data_values;
    }

/*------------------------------------------------------------------------------------------------------------
 *  best rank logic
 * 
 * author lecaoquochung@gmail.com
 * created 201510
 *-----------------------------------------------------------------------------------------------------------*/
	private function bestRank($rank_json) {
		$rank = json_decode($rank_json, true);
		@$min = min(array_diff($rank, array(0)));
		$min = ($min==True)?$min:0;
		
		return $min;
	}
}
