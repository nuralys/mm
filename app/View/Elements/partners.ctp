<div class="title_index">
	<h2><?php echo __('Дочерние и совместные компании')?></h2>
</div>
<div class="partners">
	<ul class="partners_item">
	<?php foreach ($partners as $item):?>
		<li>
			<div class="partners_item_list">
				<?php if($item['Partner']['link']): ?>
					<a href="<?=$item['Partner']['link']?>">
				<?php endif ?>
					<img src="/img/partner/thumbs/<?=$item['Partner']['img']?>" alt="<?=$item['Partner']['title']?>">
				<?php if($item['Partner']['link']): ?>
					</a>
				<?php endif ?>
			</div>
		</li>
	<?php endforeach ?>
	</ul>
</div>