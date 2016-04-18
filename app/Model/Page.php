<?php

class Page extends AppModel{

	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'keywords',
			'description'
			)
		);
}