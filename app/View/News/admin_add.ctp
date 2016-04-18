<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление новости/акции</h2>
	</div>
<?php 
echo $this->Form->create('News', array('type' => 'file'));
?>
<div class="input select">
<label for="NewsCategoryId">Категория:</label>
	<select required name="data[News][category_id]" id="NewsCategoryId">
		<option value="">Выберите категорию</option>
		<option value="1">Трансформация</option>
		<option value="2">Производство</option>
		<option value="3">Экономика</option>
		<option value="4">Молодежь</option>
		<option value="5">Стол заказов</option>
	</select>
</div>

<?php
echo $this->Form->input('title', array('label' => 'Название:'));

echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('date', array('label' => 'Дата:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>