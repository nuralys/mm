<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление видео</h2>
	</div>
<?php 
echo $this->Form->create('Video', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('link', array('label' => 'Ссылка с youtube'));
echo $this->Form->end('Создать');
?>

</div>