<?php

App::uses('AppHelper', 'View/Helper', 'News');

class VisitHelper extends AppHelper {
    public function count_visits($id) {
    	App::import("Model", "Visit");  
		$model = new Visit();  
		$count = $model->find("count", array(
			'conditions' => array('Visit.news_id' => $id)
		));
		return $count;
    	// $count = $this->Page->query("SELECT * FROM news");
    	// $this->Visit->find('count', array(
     //         'conditions' => array('Visit.news_id' => $id)
     //     ));
    }
}