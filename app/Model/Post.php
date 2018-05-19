<?php

class Post extends AppModel{
	public $hasMany = 'Comment';
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => '空です'
		),
		'body' => array(
			'rule' => 'notEmpty',
			'message' => '空です'
		)
	);
}