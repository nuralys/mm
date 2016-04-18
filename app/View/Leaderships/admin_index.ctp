<a href="/admin/leaderships/add">Добавить</a><br>
<?php 
// debug($data);
foreach ($data as $item) : ?>
	<?php foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	<?=$item['Leadership']['fio']?> Редактировать: <a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=en"> eng</a><br>
	<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Leadership']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <hr>
<?php endforeach; ?>