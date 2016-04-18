<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование статьи</h2>
	</div>
<?php 

echo $this->Form->create('Page', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
?>
<div class="edit_bot">
	
	<div class="bot_r">
	<?
	
	echo $this->Form->end('Редактировать');
	?>
	</div>
	<script type="text/javascript">
		 CKEDITOR.replace( 'editor' );
	</script>
</div>
</div>