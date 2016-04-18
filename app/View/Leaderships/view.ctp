<div class="title">
	<h1>Руководство</h1>
</div>

<div class="leader_item">
	<div class="leader_item_img">
		<a href="/<?=$lang?>leaderships/view/<?=$data['Leadership']['id'] ?>">
			<img src="/img/leadership/thumbs/<?=$data['Leadership']['img'] ?>" alt="<?=$data['Leadership']['fio'] ?>">
		</a>
	</div>
	<div class="leader_des">
		<div class="name"><?=$data['Leadership']['fio'] ?></div>
		<div class="position">
			<span>Занимаемая должность:</span>
			<?=$data['Leadership']['position'] ?>
		</div>
		<div class="date_of_birth">
			<span>Дата рождения:</span>
			<?=$data['Leadership']['date_berth'] ?>
		</div>
	</div>
	<?=$data['Leadership']['body'] ?>
</div>