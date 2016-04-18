<?php

class SlidesController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function admin_index(){
		$this->Slide->locale = 'ru';
		$this->Slide->bindTranslation(array(
			'title' => 'titleTranslation'
		));
		$data = $this->Slide->find('all');
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Slide->create();
			$data = $this->request->data['Slide'];
			// debug($this->request->data);
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Slide->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Slide->locale = 'en';
			}else{
				$this->Slide->locale = 'ru';
			}
			// $this->Slide->locale = 'ru';

			if($this->Slide->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Slide->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Slide->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Slide->id = $id;
			// $this->Slide->locale = Configure::read('Config.languages');
			// debug($this->Slide->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Slide'];
			if(isset($data1['img']['name']) && !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Slide->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Slide->locale = 'en';
			}else{
				$this->Slide->locale = 'ru';
			}
			// $this->Slide->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			if($this->Slide->save($data1)){
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
			$this->Slide->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Slide->read(null, $id);
		}
			$this->set(compact('id', 'data'));


	}

	public function admin_delete($id){
		if (!$this->Slide->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Slide->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}