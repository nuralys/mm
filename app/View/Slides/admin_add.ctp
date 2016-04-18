<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление слайда</h2>
	</div>
<?php 
echo $this->Form->create('Slide', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('link', array('label' => 'Номер новости:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Создать');
?>

</div>