<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование материала</h2>
	</div>
<?php 
echo $this->Form->create('Partner', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
?>
<div class="edit_bot">
<img src="/img/partner/thumbs/<?=$data['Partner']['img']?>">
	<div class="bot_r">
	<?
	echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
	
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>

</div>