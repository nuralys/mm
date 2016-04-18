<?php 

class Gallery extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'keywords',
			'description'
			)
		);
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название товара'
		),
		'img' => array(
			
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
				'message' => 'Разрешены к загрузке картинки JPG, PNG и GIF',
				'allowEmpty' => true
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'Максимальный размер файла - 1 Мб',
				'allowEmpty' => true
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки загрузки картинки',
				'allowEmpty' => true
			)
		)
	);

	public function customUploadImg($file = array()){
		if(!is_uploaded_file($file['img']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/gallery/' . $fileName;
		$path_th = WWW_ROOT . 'img/gallery/thumbs/' . $fileName;
		if(!move_uploaded_file($file['img']['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 182, 122, $ext);
		$this->data[$this->alias]['img'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/gallery/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}

	public function resizeImg($target, $dest, $wmax = 269, $hmax = 178, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}
}