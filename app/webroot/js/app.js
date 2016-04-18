jQuery(document).ready(function() { // Р·Р°РїСѓСЃРєР°РµРј СЃРєСЂРёРїС‚ РїРѕСЃР»Рµ Р·Р°РіСЂСѓР·РєРё РІСЃРµС… СЌР»РµРјРµРЅС‚РѕРІ
    /* Р·Р°СЃСѓРЅРµРј СЃСЂР°Р·Сѓ РІСЃРµ СЌР»РµРјРµРЅС‚С‹ РІ РїРµСЂРµРјРµРЅРЅС‹Рµ, С‡С‚РѕР±С‹ СЃРєСЂРёРїС‚Сѓ РЅРµ РїСЂРёС…РѕРґРёР»РѕСЃСЊ РёС… РєР°Р¶РґС‹Р№ СЂР°Р· РёСЃРєР°С‚СЊ РїСЂРё РєР»РёРєР°С… */
    var overlay = $('#overlay'); // РїРѕРґР»РѕР¶РєР°, РґРѕР»Р¶РЅР° Р±С‹С‚СЊ РѕРґРЅР° РЅР° СЃС‚СЂР°РЅРёС†Рµ
    var open_modal = $('.open_modal'); // РІСЃРµ СЃСЃС‹Р»РєРё, РєРѕС‚РѕСЂС‹Рµ Р±СѓРґСѓС‚ РѕС‚РєСЂС‹РІР°С‚СЊ РѕРєРЅР°
    var close = $('.modal_close, #overlay'); // РІСЃРµ, С‡С‚Рѕ Р·Р°РєСЂС‹РІР°РµС‚ РјРѕРґР°Р»СЊРЅРѕРµ РѕРєРЅРѕ, С‚.Рµ. РєСЂРµСЃС‚РёРє Рё РѕРІРµСЂР»СЌР№-РїРѕРґР»РѕР¶РєР°
    var modal = $('.modal_div'); // РІСЃРµ СЃРєСЂС‹С‚С‹Рµ РјРѕРґР°Р»СЊРЅС‹Рµ РѕРєРЅР°

     open_modal.click( function(event){ // Р»РѕРІРёРј РєР»РёРє РїРѕ СЃСЃС‹Р»РєРµ СЃ РєР»Р°СЃСЃРѕРј open_modal
         event.preventDefault(); // РІС‹СЂСѓР±Р°РµРј СЃС‚Р°РЅРґР°СЂС‚РЅРѕРµ РїРѕРІРµРґРµРЅРёРµ
         var div = $(this).attr('href'); // РІРѕР·СЊРјРµРј СЃС‚СЂРѕРєСѓ СЃ СЃРµР»РµРєС‚РѕСЂРѕРј Сѓ РєР»РёРєРЅСѓС‚РѕР№ СЃСЃС‹Р»РєРё
         overlay.fadeIn(400, //РїРѕРєР°Р·С‹РІР°РµРј РѕРІРµСЂР»СЌР№
             function(){ // РїРѕСЃР»Рµ РѕРєРѕРЅС‡Р°РЅРёСЏ РїРѕРєР°Р·С‹РІР°РЅРёСЏ РѕРІРµСЂР»СЌСЏ
                 $(div) // Р±РµСЂРµРј СЃС‚СЂРѕРєСѓ СЃ СЃРµР»РµРєС‚РѕСЂРѕРј Рё РґРµР»Р°РµРј РёР· РЅРµРµ jquery РѕР±СЉРµРєС‚
                     .css('display', 'block') 
                     .animate({opacity: 1, top: '50%'}, 200); // РїР»Р°РІРЅРѕ РїРѕРєР°Р·С‹РІР°РµРј
         });
     });

     close.click( function(){ // Р»РѕРІРёРј РєР»РёРє РїРѕ РєСЂРµСЃС‚РёРєСѓ РёР»Рё РѕРІРµСЂР»СЌСЋ
            modal // РІСЃРµ РјРѕРґР°Р»СЊРЅС‹Рµ РѕРєРЅР°
             .animate({opacity: 0, top: '45%'}, 200, // РїР»Р°РІРЅРѕ РїСЂСЏС‡РµРј
                 function(){ // РїРѕСЃР»Рµ СЌС‚РѕРіРѕ
                     $(this).css('display', 'none');
                     overlay.fadeOut(400); // РїСЂСЏС‡РµРј РїРѕРґР»РѕР¶РєСѓ
                 }
             );
     });
});

/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.5.7
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */


$(document).ready(function() {
     var menu = document.querySelector(".m_menu");
    var mob_part = document.querySelector(".mob_part");
    var close = document.querySelector(".mob_close");
    var m_sub = document.querySelector(".m_sub");
  

     $('.m_menu').click(function(e) {
    var $mob_part = $('.mob_part');
    if ($mob_part.css('display') != 'block') {
        $mob_part.animate({width: "show"}  ,"800");
    };
     });
   $('.mob_close').click(function(e){
         var $mob_part = $('.mob_part');
        $mob_part.animate({width: "hide"},  "800");
    });
     $('.m_sub').on('click', function(){
		 
        if(($(this)).siblings('.sb').hasClass('sub_show')){
			$(this).siblings('.sb').removeClass('sub_show');
			
        }else{
            $(this).siblings('.sb').addClass('sub_show');
			
        }
		if($(this).parent().siblings().children('.sb').hasClass('sub_show')){
			$(this).parent().siblings().children('.sb').removeClass('sub_show');
		}
    });

   

});

jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".menu_display "); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			$('.sb').removeClass('sub_show');; // скрываем его
		}
	});
});
jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".mob_part "); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			div.animate({width: "hide"},  "800");
		}
	});
});
    jQuery(function(f){

    var element = f('#top');
  f(window).scroll(function(){

        element['fade'+ (f(this).scrollTop() > 200 ? 'In': 'Out')](500);          

    });


});
    $(document).ready(function() {
 
$('a[href^="#"]').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top}, 1500);
        return false; 
});
    
});


$(document).ready(function() {

    
  

     $('.lang_m__current').click(function(e) {
    var $mob_lang = $('.lang_m__list');
    if ($mob_lang.css('display') != 'block') {
        $mob_lang.animate({width: "show"}  ,"800");
    }else{
         $mob_lang.animate({width: "hide"},  "800");
    }

    ;
     });
 

    $('.lang_m__option').click(function () {
        var optionValue = $(this).data('id');
        var titleValue = $(this).html();
        var thisValue = $('.lang_m__current').html();
        $('.lang_m-select__input').val(optionValue).change();
        $('.lang_m__current').html(titleValue);
        // destroy
        $(this).remove();
        $('.lang_m__list').append('<div class="lang_m__option"  data-id="">' + thisValue + '</div>');
            
   });

$(".lang_m-select__input").change(function(){
    console.log('test');
   $(this).parents('form').submit();
});
});