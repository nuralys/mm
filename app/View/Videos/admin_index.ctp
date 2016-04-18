<div class="admin_gallery">
<a href="/admin/videos/add">Добавить фото</a><br>
<?php foreach ($data as $v) :?>
	<?php foreach($v['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
		<?php endforeach; ?>
		<?=$v['Video']['title']?><br>
		<a href="/admin/videos/edit/<?=$v['Video']['id']?>?lang=ru">Редактировать ru</a>
	 <a href="/admin/videos/edit/<?=$v['Video']['id']?>?lang=kz">Редактировать kz</a><br>
	<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $v['Video']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	 <br><br>

<?php endforeach; ?>
</div>