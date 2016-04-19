<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление категории</h2>
	</div>
<?php 
echo $this->Form->create('Category');
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->end('Создать');
?>
</div>