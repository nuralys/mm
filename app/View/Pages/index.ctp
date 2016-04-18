<div class="main">
	<div class="cr">
		<div class="big_anons_left">
			<a href="/<?=$lang?>news/view/<?=$anons[0]['News']['id']?>"><img src="/img/news/<?=$anons[0]['News']['img']?>" alt=""/></a>
			<div class="title_anon">
				<a href="/<?=$lang?>news/view/<?=$anons[0]['News']['id']?>"><?=$anons[0]['News']['title']?></a>
			</div>
		</div>
		<div class="anons_right">
			<div class="anons_item fl_l">
				<div class="anon_item_card">
					<a href="/<?=$lang?>news/view/<?=$anons[1]['News']['id']?>"><img src="/img/news/thumbs/<?=$anons[1]['News']['img']?>" alt=""></a>
					<div class="title_anon">
						<a href="/<?=$lang?>news/view/<?=$anons[1]['News']['id']?>"><?=$anons[1]['News']['title']?></a>
					</div>
				</div>
				<div class="anon_item_card">
					<a href="/<?=$lang?>news/view/<?=$anons[2]['News']['id']?>"><img src="/img/news/thumbs/<?=$anons[2]['News']['img']?>" alt=""></a>	
					<div class="title_anon">
						<a href="/<?=$lang?>news/view/<?=$anons[2]['News']['id']?>"><?=$anons[2]['News']['title']?></a>
					</div>
				</div>
			</div>
			<div class="anons_item fl_r">
				<a href="/<?=$lang?>blog/view/<?=$blog['Blog']['id']?>"><img src="/img/blog/thumbs/<?=$blog['Blog']['img']?>" alt=""></a>
					<div class="title_anon">
						<a href="/<?=$lang?>blog/view/<?=$blog['Blog']['id']?>"><?=$blog['Blog']['title']?></a>
					</div>
			</div>
		</div>
	</div>
</div> <!-- main end -->
<div class="content">
	<div class="news_index_container">
		<div class="title_index">
			<h2><?= __('Новости')?></h2>
		</div>
		<?php //debug($category) ?>
		<ul class="news_index_list">
		<?php foreach($news as $item): ?>
			
			<li>
				<div class="news_index_content">
					<div class="news_index_list_img">
						<a href="/<?=$lang?>news/view/<?=$item['News']['id'] ?>"><img src="/img/news/thumbs/<?=$item['News']['img'] ?>" alt="<?=$item['News']['title'] ?>"></a>
						<!-- <img src="./img/news1.jpg" alt=""> -->
					</div>	
					<div class="date">
						<?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?>
					</div>
					<div class="category_news">
					<?php foreach($categories as $cat): ?>
						<?php if($cat['Category']['id'] == $item['News']['category_id']) echo $cat['Category']['title'] ?>
					<?php endforeach ?>
					</div>
					<a href="/<?=$lang?>news/view/<?=$item['News']['id'] ?>" class="news_index_title"><?= $this->Text->truncate(strip_tags($item['News']['title']), 70, array('ellipsis' => '...', 'exact' => true)) ?></a>
					<div class="review">
						<?php echo $this->Visit->count_visits($item['News']['id']) ?>
					</div>
				</div>
			</li>
		
		<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php echo $this->element('sidebar'); ?>
<?php echo $this->element('partners'); ?>