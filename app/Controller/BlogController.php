<?php 

class BlogController extends AppController{

	public $uses = array('Blog', 'Blog', 'Category', 'Visit');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function admin_index(){
		$this->Blog->locale = 'ru';
		$this->Blog->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->Blog->find('all');
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			// debug($this->request->data);
			// die;
			$this->Blog->create();
			$data = $this->request->data['Blog'];
			// debug($data);
			if(isset($data['imgsource']) && !empty($data['imgsource'])){
				$getmime = getimagesize(WWW_ROOT . trim($data["imgsource"], '/'));
				// debug($getmime['mime']);
				// die();
				$r = explode("/",  $data["imgsource"]);
				$file= end($r);
				$data["img"]= array(
					"name"=> $file,
					"tmp_name" => WWW_ROOT . trim($data["imgsource"], '/'),
					"error"=> 0,
					"mimeType"=>$getmime['mime'],
					"size"=>filesize (WWW_ROOT . trim($data["imgsource"], '/'))
				);
			}

			 if(!isset($data['img']['name']) || !$data['img']['name']){
			 	unset($data['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Blog->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Blog->locale = 'en';
			}else{
				$this->Blog->locale = 'ru';
			}
			// $this->Blog->locale = 'ru';

			if($this->Blog->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Blog->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Blog->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Blog->id = $id;
			$data1 = $this->request->data['Blog'];
			/*ws begin*/
			if(isset($data1['imgsource']) && !empty($data1['imgsource'])){
				$getmime = getimagesize(WWW_ROOT . trim($data1["imgsource"], '/'));
				// $file= end(explode("/",  $data1["imgsource"]));
				$r = explode("/",  $data1["imgsource"]);
				$file= end($r);
				$data1["img"]= array(
					"name"=> $file,
					"tmp_name" => WWW_ROOT . trim($data1["imgsource"], '/'),
					"error"=> 0,
					"mime"=>$getmime['mime'],
					"size"=>filesize (WWW_ROOT . trim($data1["imgsource"], '/'))
				);
			}
			
			// debug($data1);
			// die();
			/*ws end*/
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Blog->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Blog->locale = 'en';
			}else{
				$this->Blog->locale = 'ru';
			}
			// debug($this->Blog->save($data1));
			$data1['id'] = $id;
			if($this->Blog->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Blog->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Blog->read(null, $id);
		}
			$this->set(compact('id', 'data'));
	}

	public function admin_delete($id){
		if (!$this->Blog->exists($id)) {
			throw new NotFounddException('Такого материала нет');
		}
		if($this->Blog->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Blog->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$this->Category->locale = Configure::read('Config.language');
		$this->Category->bindTranslation(array('title' => 'titleTranslation'));
		$this->Blog->locale = Configure::read('Config.language');
		$this->Blog->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));

		$post = $this->Blog->findById($id);
	}
}