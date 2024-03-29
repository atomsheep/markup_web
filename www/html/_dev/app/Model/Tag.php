<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Project $Project
 * @property Ruberic $Ruberic
 */
class Tag extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Tags';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	var $validate = array(
        'name' => array(
            'rule'    => 'notEmpty',
            'message' => 'Must have a tag name'
        ),
        'color' => array(
        	'notEmpty' => array(
	            'rule'    => 'notEmpty',
	            'message' => 'Must have a tag colour'
	        ),
	        'between' => array(
	        	'rule'    => array('between', 6, 6),
	        	'message' => 'Must be 6 numbers in length'
	        )
        )
    );


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
