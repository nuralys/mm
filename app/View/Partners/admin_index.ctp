<a href="/admin/partners/add">Добавить</a><br>
<table>
<th>ID</th><th>Изображение</th><th>Название</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Partner']['id']; ?></td>
	<td>
		<img src="/img/partner/thumbs/<?=$item['Partner']['img']?>">
	</td>
	
	<td>
	
		<?= $item['Partner']['title']; ?>
	
	 </td>
	 <td><a href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=ru">Редактировать</a> |
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Partner']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
