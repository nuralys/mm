<?php 

class PartnersController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		// $this->Partner->locale = false;
		$this->Partner->locale = 'ru';
		$data = $this->Partner->find('all', array(
			'order' => array('id' => 'ASC')
		));
		$title_for_layout = __('Дочерние и совместные компании');
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$this->Partner->locale = 'ru';
		
		$data = $this->Partner->find('all');
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Partner->create();
			$data = $this->request->data['Partner'];

			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Partner->locale = 'kz';
			}else{
				$this->Partner->locale = 'ru';
			}
			if($this->Partner->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		
		if(is_null($id) || !(int)$id || !$this->Partner->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Partner->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Partner->id = $id;
			// $this->Partner->locale = Configure::read('Config.languages');
			// debug($this->Partner->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Partner'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Partner->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Partner->locale = 'en';
			}else{
				$this->Partner->locale = 'ru';
			}
			// $this->Partner->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
			if($this->Partner->save($data1)){
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
			$this->Partner->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Partner->read(null, $id);
		}
			$this->set(compact('id', 'data'));


	}

	public function admin_delete($id){
		if (!$this->Partner->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Partner->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
}