<a href="/admin/news/add">Добавить</a><br>
<table>
<th>Название</th><th>Категория</th><th>Анонс</th><th>Редактировать</th><th>Удаление</th>
<?php $i=1; foreach ($data as $item) : ?>
	<tr>
	<td>
	<?php  foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	 
	</td>
	<td>
	<?= $item['Category']['title'] ?>
	</td>
	<td>
		<form action="/admin/news/index" id="form<?=$i?>" method="POST">
			<select name="data[News][anons]" id="anons<?=$i?>">
				<option value="" >---</option>
				<option value="1" <?php if($item['News']['anons'] == 1) echo "selected" ?>>Анонс 1</option>
				<option value="2" <?php if($item['News']['anons'] == 2) echo "selected" ?>>Анонс 2</option>
				<option value="3" <?php if($item['News']['anons'] == 3) echo "selected" ?>>Анонс 3</option>
			</select>
			<input name="data[News][news_id]" value="<?=$item['News']['id']?>" type="hidden">
			<script type="text/javascript">
				$( document ).ready(function() {
					$(function(){
					    $("#anons<?=$i?>").change(function(){
					        $("#form<?=$i?>").submit();
					    });
					});
				});
			</script>
		</form>
	</td>
	<td>
	<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/news/edit/<?=$item['News']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/news/edit/<?=$item['News']['id']?>?lang=en"> eng</a></td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['News']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php $i++; endforeach; ?>
</table>
