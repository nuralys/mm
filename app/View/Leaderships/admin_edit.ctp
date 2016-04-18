
<?php //debug($this->request->data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование руководства</h2>
	</div>
<?php 
echo $this->Form->create('Leadership', array('type' => 'file'));
echo $this->Form->input('fio', array('label' => 'ФИО:'));
echo $this->Form->input('position', array('label' => 'Должность:'));
// echo $this->Form->input('Leadership.title.kz', array('label' => 'Название kz:'));
if($this->request->query['lang'] == 'ru'){
	echo $this->Form->input('date_berth', array('label' => 'Дата рождения:'));
}
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));

if($this->request->query['lang'] == 'ru'){ ?>
	<img src="/img/leadership/thumbs/<?=$data['Leadership']['img']?>">
	<? echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
}

echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->input('id');
echo $this->Form->end('Редактировать');
?>


<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>