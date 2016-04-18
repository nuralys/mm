<header id="header">
		<div class="cr">
			<!--Мобильная часть -->
			<div class="top_header">
					<div class="m_menu"></div>
					<div class="mob_part">
						<ul class="mob_ul">
							<li class="active"><a href="/<?=$lang?>" >ГЛАВНАЯ </a></li>
							<li><a href="/<?=$lang?>news">НОВОСТИ</a></li>
							<li><a href="">ТРАНСФОРМАЦИЯ</a></li>
							<li><a href="">ПРОИЗВОДСТВО</a></li>
							<li><a href="">ЭКОНОМИКА         </a></li>
							<li><a href="">МОЛОДЕЖЬ </a></li>
							<li><a href="">СТОЛ ЗАКАЗОВ</a></li>
						</ul>
						<div class="mob_close"></div>
					</div>
					<a href="/<?=$lang?>" class="logo mobile">
							<img src="./img/logo.png" alt="">
						</a>

					<div class="lang_m">
                    <div class="lang_m__current">KZ</div>
             
			        <div class="lang_m__list asd">
                        <div class="lang_m__option" data-id="">RU</div>
	                </div>
	                <form action="">
	                	<input type="hidden" value="" class="lang_m-select__input" name="city">
	                </form>
	              
				    </div>
				    
			</div>
			<!--Мобильная часть конец-->
			<div class="head_slogan">
				<a href="/<?=$lang?>" class="logo">
					<img src="/img/logo.png" alt="">
				</a>
				<div class="slogan">
					Корпоративная онлайн газета<br/>
					АО “Разведка Добыча ”ҚазМұнайГаз”
				</div>
			</div>
			<div class="right_head">
				<a href="#" class="logo_munai">
					<img src="/img/munai.png" alt="">
				</a>
				<div class="lang_search">
					<div class="lang">
						<a href="/" <?php if(Configure::read('Config.language')!='ru'){echo "class='active'";} ?>>KZ</a>|
						<a href="/ru" <?php if(isset($this->params['language']) && $this->request->params['language']=='ru'){echo "class='active'";}?>>RU</a>
					</div>
					<div class="search">
					<form action="/<?=$lang?>search">
						<input name="q" placeholder="<?= __('Поиск по сайту')?>" type="text" id="searchSearch">			
						<button type="submit" class="sub_but"></button>					
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="menu_container">
			<div class="cr">
				<nav>
					<ul class="menu">
						<li <?php echo ($this->params['controller'] == 'pages' && $this->params['action'] == 'index') ? 'class="active"' : '' ?>><a href="/<?=$lang?>" >ГЛАВНАЯ </a></li>
						<li <?php echo ($this->params['controller'] == 'news' && !$this->request->query) ? 'class="active"' : '' ?>><a href="/<?=$lang?>news">НОВОСТИ</a></li>
						<li <?php echo (isset($this->request->query['cat']) && $this->request->query['cat'] == 1) ? 'class="active"' : '' ?>><a href="/<?=$lang?>news?cat=1">ТРАНСФОРМАЦИЯ</a></li>
						<li <?php echo (isset($this->request->query['cat']) && $this->request->query['cat'] == 2) ? 'class="active"' : '' ?>><a href="/<?=$lang?>news?cat=2">ПРОИЗВОДСТВО</a></li>
						<li <?php echo (isset($this->request->query['cat']) && $this->request->query['cat'] == 3) ? 'class="active"' : '' ?>><a href="/<?=$lang?>news?cat=3">ЭКОНОМИКА</a></li>
						<li <?php echo (isset($this->request->query['cat']) && $this->request->query['cat'] == 4) ? 'class="active"' : '' ?>><a href="/<?=$lang?>news?cat=4">МОЛОДЕЖЬ</a></li>
						<li <?php echo (isset($this->request->query['cat']) && $this->request->query['cat'] == 5) ? 'class="active"' : '' ?>><a href="/<?=$lang?>news?cat=5">СТОЛ ЗАКАЗОВ</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>