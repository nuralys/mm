<table>
<th>Название</th><th>Редактировать</th>
	<?php foreach ($pages as $page) : ?>
	<tr>
		<td><?=$page['Page']['title']?></td> 
		<td><a href="/admin/pages/edit/<?=$page['Page']['id']?>?lang=ru"> рус</a> | 
		<a href="/admin/pages/edit/<?=$page['Page']['id']?>?lang=kz"> каз</a> |
		<a href="/admin/pages/edit/<?=$page['Page']['id']?>?lang=en"> eng</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>