<div class="title">
	<h1>Руководство</h1>
</div>
<?php foreach($data as $item): ?>
<div class="leader_item">
	<div class="leader_item_img">
		<a href="/<?=$lang?>leaderships/view/<?=$item['Leadership']['id'] ?>">
			<img src="/img/leadership/thumbs/<?=$item['Leadership']['img'] ?>" alt="<?=$item['Leadership']['fio'] ?>">
		</a>
	</div>
	<div class="leader_des">
		<div class="name"><?=$item['Leadership']['fio'] ?></div>
		<div class="position">
			<span>Занимаемая должность:</span>
			<?=$item['Leadership']['position'] ?>
		</div>
		<div class="date_of_birth">
			<span>Дата рождения:</span>
			<?=$item['Leadership']['date_berth'] ?>
		</div>
	</div>
	<div class="buttons leader">
		<a href="/<?=$lang?>leaderships/view/<?=$item['Leadership']['id'] ?>">Читать полностью</a>
	</div>
</div>
<?php endforeach ?>