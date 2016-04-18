<aside class="side_bar">
	<div class="title_index">
		<h2><span><?= __('Стол заказов')?></span></h2>
	</div>
	<?php foreach($stol as $item): ?>
	<div class=" side_bar_item">
		<div class="news_index_list_img">
		<a href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><img src="/img/news/thumbs/<?=$item['News']['img']?>" alt=""></a>
		</div>	
		<div class="date">
			<?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?>
		</div>
		<a href="/<?=$lang?>news/view/<?=$item['News']['id']?>" class="news_index_title"><?=$item['News']['title']?></a>
		<div class="review">
			<?php echo $this->Visit->count_visits($item['News']['id']) ?>
		</div>
	</div>
	<?php endforeach ?>
	<div class="title_index">
		<h2><span><?= __('Медиатека')?></span></h2>
	</div>
	<?php foreach($galleries as $item): ?>
	<div class=" side_bar_item">
		<div class="news_index_list_img">
		<?php if(!empty($item['Gallery']['video'])): ?>
			<?php
				if (stripos($item['Gallery']['video'], 'youtube.com') !== false) {
					preg_match('#v=([^\&]+)#is', $item['Gallery']['video'], $videoId);
					if (count ($videoId) > 0) {
						//у нас есть id video, ссылка правильная
						// $videoId[1] - ID видео
						$id = $videoId[1];
					}
				}
				?>
		<iframe width="100%"  src="https://www.youtube.com/embed/<?=$id?>" frameborder="0" allowfullscreen></iframe>
		<?php else: ?>
			<a href="/<?=$lang?>gallery/views/<?=$item['Gallery']['id']?>"><img src="/img/gallery/thumbs/<?=$item['Gallery']['img']?>" alt=""></a>
		<?php endif ?>
		</div>	
		<div class="date">
			<?php echo $this->Time->format($item['Gallery']['date'], '%d.%m.%Y', 'invalid'); ?>
		</div>
		<a href=""class="news_index_title"><?=$item['Gallery']['title']?></a>
		<!-- <div class="review">
			2586
		</div> -->
	</div>
	<?php endforeach ?>
	
</aside>