<div class="content">
	<div class="news_index_container">
		<div class="title_index">
			<h2><?php echo $title_for_layout ?></h2>
		</div>
		
		<ul class="news_index_list">
		<?php foreach($data as $item): ?>
			<li>
				<div class="news_index_content">
					<div class="news_index_list_img">
						<a href="/<?=$lang?>news/view/<?=$item['News']['id'] ?>"><img src="/img/news/thumbs/<?=$item['News']['img'] ?>" alt="<?=$item['News']['title'] ?>"></a>
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
</div> <!-- content -->
<?php echo $this->element('sidebar'); ?>

<?php echo $this->element('partners'); ?>