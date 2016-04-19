<a href="/admin/categories/add">Добавить категорию</a><br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
	<?php foreach ($data as $item) : ?>
	<tr>
		<td><?php  foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?></td> 
		<td><a href="/admin/categories/edit/<?=$item['Category']['id']?>?lang=ru"> рус</a> | 
		<a href="/admin/categories/edit/<?=$item['Category']['id']?>?lang=kz"> каз</a></td>
		<td><?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Category']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>
	</tr>
	<?php endforeach; ?>
</table>