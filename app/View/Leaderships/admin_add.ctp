<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление руководителя</h2>
	</div>
<?php 

echo $this->Form->create('Leadership', array('type' => 'file'));

echo $this->Form->input('fio', array('label' => 'ФИО:'));
echo $this->Form->input('position', array('label' => 'Должность:'));
echo $this->Form->input('date_berth', array('label' => 'Дата рождения:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>