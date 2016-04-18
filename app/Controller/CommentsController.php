<?php

class CommentsController extends AppController{
	public $uses = array('News', 'Comment');

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function add(){
		if($this->request->is('post')){
			// $this->Comment->create();
			$data = $this->request->data['Comment'];
			// debug($data);
			// die;
			if($this->Comment->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
}