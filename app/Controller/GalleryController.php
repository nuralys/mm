<?php

class GalleryController extends AppController{

	public $uses = array('Gallery');
	
	public function index(){
		$this->Gallery->locale = Configure::read('Config.language');
		// $this->News->locale = Configure::read('Config.language');
		$data = $this->Gallery->find('all');
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title'),
		// 	'order' => array('News.created' => 'desc'),
		// 	'limit' => 3
		// 	));
		$this->set(compact('data'));
	}

	public function admin_index(){
			$this->Gallery->locale = 'ru';
			$this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
			$data = $this->Gallery->find('all');
			$this->set(compact('data'));
		}

	public function admin_add(){
		// debug($this->request->data['Gallery']);
		// die;
		if($this->request->is('post')){
			$this->Gallery->create();
			$data = $this->request->data['Gallery'];
			if(!$data['img']['name']){
				unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Gallery->locale = 'kz';
			}else{
				$this->Gallery->locale = 'ru';
			}
			if($this->Gallery->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Gallery->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Gallery->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Gallery->id = $id;
			$data1 = $this->request->data['Gallery'];
			if(isset($data1['img']['name']) && !$data1['img']['name']){
				unset($data1['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Gallery->locale = 'kz';
			}else{
				$this->Gallery->locale = 'ru';
			}
			$data1['id'] = $id;
			if($this->Gallery->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				debug($this->request->data1);
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Gallery->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Gallery->read(null, $id);
		}
			$this->set(compact('id', 'data'));
	}

	public function admin_delete($id){
		if (!$this->Gallery->exists($id)) {
			throw new NotFounddException('Такой фотографии нету');
		}
		if($this->Gallery->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}



}