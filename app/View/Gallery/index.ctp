<div class="content_title">Галерея</div>
<div class="gallery">
<?php foreach ($data as $v) :?>
	<a class="fancybox" rel="gallery" href="/img/gallery/<?=$v['Gallery']['img'] ?>">
		<img src="/img/gallery/<?=$v['Gallery']['img'] ?>" alt="<?=$v['Gallery']['title'] ?>" />
	</a>
<?php endforeach; ?>
</div>