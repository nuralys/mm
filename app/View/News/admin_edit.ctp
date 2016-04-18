
<?php //debug($this->request->data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование новости/акции</h2>
	</div>
<?php 

echo $this->Form->create('News', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>
<?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
<?php echo $this->Form->input('date', array('label' => 'Дата:'));?>
<?php endif ?>
<?php
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	
	echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
	echo $this->Form->input('description', array('label' => 'Описание:'));
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>