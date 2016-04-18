<div class="content">
	<div class="title_index">
		<h1><?=$post['News']['title']?></h1>
	</div>
	<div class="news_second_lvl">
		<img src="/img/news/<?=$post['News']['img']?>" alt="<?=$post['News']['title']?>">
		<div class="date"><?php echo $this->Time->format($post['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
		<div class="review">
			<?php echo $this->Visit->count_visits($post['News']['id']) ?>
		</div>
		<div class="category_news">
			<?php 
			if(isset($categories['Category']['title']) && $categories['Category']['title']){
				echo $categories['Category']['title']; 
			}?>
		</div>
		<div class="title">
			<h2><?=$post['News']['title']?></h2>
		</div>
		<?=$post['News']['body']?>
		
	</div>
	<div class="reviews">
		<div class="title_second">
			<h2><span><?= __('Написать комментарий')?></span></h2>
		</div>
		<div class="reviews_form">
			<form action="/comments/add"  method="POST">
				<input type="text" name="data[Comment][title]" placeholder="<?= __('ФИО')?>" class="input_review"/>
				<input type="text" name="data[Comment][email]" placeholder="<?= __('Эл.почта')?>" class="input_review"/>
				<textarea name="data[Comment][body]" id="" cols="30" class="textarea_review"placeholder="<?= __('Текст комментарии')?>" rows="10"></textarea>
				<input type="hidden" value="<?=$post['News']['id']?>" name="data[Comment][news_id]" >
				<button type="submit" class="button"><?= __('Отправить')?></button>
			</form>
		</div>
		<div class="title_second">
			<h2><?= __('Комментарии')?></h2>
		</div>
		<ul class="review_list">
			<?php foreach($comments as $item): ?>
				<li>
				<div class="name"><?=$item['Comment']['title']?></div>
					<p><?=$item['Comment']['body']?></p>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>
<?php echo $this->element('sidebar'); ?>

<?php echo $this->element('partners'); ?>