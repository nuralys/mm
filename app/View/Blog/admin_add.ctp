<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление материала</h2>
	</div>
<?php 
echo $this->Form->create('Blog', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('date', array('label' => 'Дата:'));
?>
<div id="cropContainerEyecandy"></div>

    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/croppic.css" rel="stylesheet">
   	<script src="/js/croppic.min.js"></script>
    <script>
		var croppicContainerEyecandyOptions = {
				uploadUrl:'/ajax/img_save_to_file.php',
				cropUrl:'/ajax/img_crop_to_file.php',
				imgEyecandy:false,				
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(data){ console.info(data);},
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(data){ console.info(data.url); console.info(data.urlsource);				
				$('.imgcrop').val(data.url);
				$('.imgsource').val(data.urlsource);
				},
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);

	</script>
<input type="text" required="required" name="data[Blog][imgsource]" class="imgsource" value="" />
<input type="text" required="required" name="data[Blog][imgcrop]" class="imgcrop" value="" />
<?php
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>