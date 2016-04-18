<div class="content">
	<div class="news_index_container">
		<div class="title_index">
			<h2><?php echo __('Результаты поиска') ?></h2>
		</div>
		<?php 
			$arr = array();
			foreach ($search_res as $item) {
				if($item['i18n']['field'] == 'title'){
					$arr[] = $item['i18n'];
				}
			}
		 ?>
		<ul class="news_index_list">
			<?php if(is_array($arr)): ?>
				<?php if(empty($arr)): ?>
					<li>По данному запросу 0 результатов...</li>
				<?php endif ?>
			<?php foreach($arr as $item): ?>
			<li>
				<div class="news_index_content">
					<a href="/<?=$item['locale'] ?>/news/view/<?=$item['foreign_key'] ?>" class="news_index_title"><?= $this->Text->truncate(strip_tags($item['content']), 70, array('ellipsis' => '...', 'exact' => true)) ?></a>
				</div>
			</li>
			<?php endforeach; ?>
		<?php else: ?>
			<li><?php echo $arr ?></li>
		<?php endif ?>	
		</ul>
	</div>
</div> <!-- content -->
<?php echo $this->element('sidebar'); ?>

<?php echo $this->element('partners'); ?>