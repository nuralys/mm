<?php 

class Video extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title'
			)
		);
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название видео'
		),
		'link' => array(
			'rule' => 'notEmpty',
			'message' => 'Вставьте пожалуйста ссылку с youtube'
		)
	);

}