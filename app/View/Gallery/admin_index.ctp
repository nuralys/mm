<a href="/admin/gallery/add">Добавить материал</a><br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td>
	<?php  foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	 
	</td>
	
	
	<td>
	<a href="/admin/gallery/edit/<?=$item['Gallery']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/gallery/edit/<?=$item['Gallery']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/gallery/edit/<?=$item['Gallery']['id']?>?lang=en"> eng</a></td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Gallery']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
