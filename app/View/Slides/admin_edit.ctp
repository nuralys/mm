
<?php //debug($this->request->data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование слайда</h2>
	</div>
<?php 

echo $this->Form->create('Slide', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('link', array('label' => 'Номер новости:'));
?>
<div class="edit_bot">
<?php if($this->request->query['lang'] == 'ru'): ?>
<img src="/img/slider/<?=$data['Slide']['img']?>">
	<div class="bot_r">
	<?
	echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
	endif;
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
</div>