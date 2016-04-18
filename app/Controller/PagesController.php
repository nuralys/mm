<?php

class PagesController extends AppController {

	public $uses = array('Page', 'News', 'Category', 'Partner', 'Blog', 'Gallery');
	public $component = array('Visit');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$this->Gallery->locale = Configure::read('Config.language');
		$this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
		$this->Blog->locale = Configure::read('Config.language');
		$this->Blog->bindTranslation(array('title' => 'titleTranslation'));
		$this->Category->locale = Configure::read('Config.language');
		$this->Category->bindTranslation(array('title' => 'titleTranslation'));
		$this->Page->locale = Configure::read('Config.language');
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title', 'date', 'img'),
		// 	'order' => array('News.date' => 'desc'),
		// 	'limit' => 8
		// 	));
		$blog = $this->Blog->find('first', array('order' => array('id' => 'desc')));
		$categories = $this->Category->find('all');
		$news = $this->News->find('all', array(
			'order' => array('News.id' => 'desc')
		));

		$galleries = $this->Gallery->find('all', array(
            'limit' => 3
        ));
		$stol = $this->News->find('all', array(
            'conditions' => array('category_id' => 5),
            'limit' => 3
        ));

		$page = $this->Page->findById(1);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		$anons = array();
		$anons[0] = $this->News->find('first', array('conditions' => array('News.anons'=>1)));
		$anons[1] = $this->News->find('first', array('conditions' => array('News.anons'=>2)));
		$anons[2] = $this->News->find('first', array('conditions' => array('News.anons'=>3)));
		
		if(!$anons[0]){
			$anons[0] = $this->News->find('first', array(
				'order' => array('News.id' => 'desc')
			));
		}

		if(!$anons[1]){
			// $anons2 = $this->News->find('all', array(
			// 	'order' => array('News.id' => 'desc')
			// ));
			$anons[1] = $news[1];
		}

		if(!$anons[2]){
			$anons[2] = $this->News->find('all', array(
				'order' => array('News.id' => 'desc')
			));
			$anons[2] = $news[2];
		}
		// debug($anons[0]);
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$this->set(compact('page', 'title_for_layout', 'meta', 'news', 'categories', 'anons', 'blog', 'stol', 'galleries'));
	}    

	public function page($page_alias = null){
		$this->Page->locale = Configure::read('Config.language');
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$this->News->locale = Configure::read('Config.language');
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$news = $this->News->find('all', array(
			'fields' => array('id', 'title'),
			'order' => array('News.created' => 'desc'),
			'limit' => 3
			));
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta', 'news'));
	}

	public function admin_index(){
		$this->Page->locale = 'ru';
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$pages = $this->Page->find('all');
		$test = 'test';
		$this->set(compact('pages', 'test'));
	}

	public function admin_edit($page_id){
		
		if(is_null($page_id) || !(int)$page_id || !$this->Page->exists($page_id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Page->findById($page_id);
		if(!$page_id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $page_id;
			// $this->Page->locale = Configure::read('Config.languages');
			// debug($this->Page->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Page'];
			

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Page->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Page->locale = 'en';
			}else{
				$this->Page->locale = 'ru';
			}
			// $this->Page->locale = 'kz';
			// debug($data1);
			$data1['id'] = $page_id;
			if($this->Page->save($data1)){
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
			$this->Page->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Page->read(null, $page_id);
		}
			$this->set(compact('page_id', 'data'));


	}
/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
