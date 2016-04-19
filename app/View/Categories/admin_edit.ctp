<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование категории</h2>
	</div>
<?php 
echo $this->Form->create('Category');
echo $this->Form->input('title', array('label' => 'Название:'));
?>
	<div class="edit_bot">
		<div class="bot_r">
			<?php echo $this->Form->end('Редактировать'); ?>
		</div>
	</div>
</div>