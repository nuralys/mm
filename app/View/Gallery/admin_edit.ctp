<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование новости/акции</h2>
	</div>
<?php 
	echo $this->Form->create('Gallery', array('type' => 'file'));
	echo $this->Form->input('title', array('label' => 'Название:'));?>
	<?php if($this->request->query['lang'] == 'ru'): ?>
		<img src="/img/gallery/thumbs/<?=$data['Gallery']['img']?>">
	<?php
	echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
	endif;
	echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
	echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
	echo $this->Form->input('description', array('label' => 'Описание:'));
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
 ?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>