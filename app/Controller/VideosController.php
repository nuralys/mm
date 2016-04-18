<?php

class VideosController extends AppController{

	public function admin_index(){
			$this->Video->locale = 'ru';
			$this->Video->bindTranslation(array('title' => 'titleTranslation'));
			$data = $this->Video->find('all');
			$this->set(compact('data'));
		}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Video->create();
			$data = $this->request->data['Video'];
			
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Video->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Video->locale = 'en';
			}else{
				$this->Video->locale = 'ru';
			}
			if($this->Video->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Video->exists($id)){
			throw new NotFoundException('Такого видео нет...');
		}
		$data = $this->Video->findById($id);
		if(!$id){
			throw new NotFoundException('Такого видео нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Video->id = $id;
			$data1 = $this->request->data['Video'];
			
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Video->locale = 'kz';
			}else{
				$this->Video->locale = 'ru';
			}
			$data1['id'] = $id;
			if($this->Video->save($data1)){
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
			$this->Video->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Video->read(null, $id);
		}
			$this->set(compact('id', 'data'));
	}

	public function admin_delete($id){
		if (!$this->Video->exists($id)) {
			throw new NotFounddException('Такого видео нету');
		}
		if($this->Video->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}



}