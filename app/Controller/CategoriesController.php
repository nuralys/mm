<?php

class CategoriesController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function admin_index(){
		$this->Category->locale = 'ru';
		$this->Category->bindTranslation(array(
			'title' => 'titleTranslation'
		));
		$data = $this->Category->find('all');
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Category->create();
			$data = $this->request->data['Category'];

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Category->locale = 'kz';
			}else{
				$this->Category->locale = 'ru';
			}
			if($this->Category->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Category->exists($id)){
			throw new NotFoundException('Такой категории нет...');
		}
		$data = $this->Category->findById($id);
		if(!$id){
			throw new NotFoundException('Такой категории нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Category->id = $id;
			// $this->Category->locale = Configure::read('Config.languages');
			// debug($this->Category->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Category'];

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Category->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Category->locale = 'en';
			}else{
				$this->Category->locale = 'ru';
			}
			// $this->Category->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			if($this->Category->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Category->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Category->read(null, $id);
		}
			$this->set(compact('id', 'data'));
	}

	public function admin_delete($id){
		if (!$this->Category->exists($id)) {
			throw new NotFounddException('Такой категории нет');
		}
		if($this->Category->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}