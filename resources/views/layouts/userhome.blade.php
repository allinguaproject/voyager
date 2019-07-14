<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blueprint: Multi-Level Menu</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}" />

	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}" />
	<script src="{{asset('js/modernizr-custom.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

</head>

<body>
	<!-- Main container -->

		<div class="container-fluid">
			<!-- Blueprint header -->
			<header class="bp-header cf">
				<div class="logo">
					<div class="icon lingmer-icon"></div>
				</div>
				<div class="bp-header__main top_nav">
					<nav class="bp-nav">
						<!--a class="bp-nav__item bp-icon bp-icon--next" href="" data-info="next Blueprint"><span>Next Blueprint</span></a-->
						<a class="quicknav" href="#">Logout</a>
						<a class="quicknav" href="#">Überblick</a>

					</nav>
				</div>
			</header>
			<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>

			<nav id="ml-menu" class="menu vue-menu">
				<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
				<div class="menu__wrap">
					<ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
						<li class="menu__item" role="menuitem"><a class="menu__link top_layer" data-submenu="submenu-1" aria-owns="submenu-1" href="#/test/2">Profil</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link"  data-submenu="submenu-2" aria-owns="submenu-2" href="/test2">Unterricht</a></li>
					</ul>
					<!-- Submenu 1 -->
					<ul data-menu="submenu-1" id="submenu-1" class="menu__level" tabindex="-1" role="menu" aria-label="Vegetables">
						<li class="menu__item" role="menuitem"><a class="menu__link"  href="#">Erreicht</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Konfiguration</a></li>
					</ul>
					<!-- Submenu 1-1 -->
					<ul data-menu="submenu-1-1" id="submenu-1-1" class="menu__level" tabindex="-1" role="menu" aria-label="Sale %">
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Fair Trade Roots</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Dried Veggies</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Our Brand</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Homemade</a></li>
					</ul>
					<!-- Submenu 2 -->
					<ul data-menu="submenu-2" id="submenu-2" class="menu__level" tabindex="-1" role="menu" aria-label="Fruits">
						<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2-1" href="#">Level 1</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2-2" href="#">Level 2</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2-3" href="#">Level 3</a></li>
					</ul>
										<!-- Submenu 2-1 Level 1-->

					<ul data-menu="submenu-2-1" id="submenu-2-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
						<li class="menu__item" role="menuitem"><a class="menu__link"  data-submenu="submenu-2-1-1" href="#">Artikel</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2-1-2" href="#">Konjugation</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Einfacher Aussagesatz</a></li>
					</ul>
										<!-- Submenu 2-1-1 Level 1-->

					<ul data-menu="submenu-2-1-1" id="submenu-2-1-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#/unterricht/Level1/Artikel/Der">Artikel Der</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#/unterricht/Level1/Artikel/Die">Artikel Die</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#/unterricht/Level1/Artikel/Das">Artikel Das</a></li>
					</ul>


					<ul data-menu="submenu-2-1-2" id="submenu-2-1-2" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#/unterricht/Level1/Konjugation/Unregverb">Unregelmäßige Verben</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#/unterricht/Level1/Konjugation/UV_Ubung">Übungen zur Lektion</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#/unterricht/Level1/Artikel/Das">xxx</a></li>
					</ul>
					<!-- Submenu 2-2 Level 2-->
					<ul data-menu="submenu-2-2" id="submenu-2-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Dativ</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Akkusativ</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Dativ/Akkusativ Übungen</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Trennbare/Untrennbare Verben</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Aussagesätze mit Dativ/Akkusativ</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Perfekt</a></li>
					</ul>

					<ul data-menu="submenu-2-3" id="submenu-2-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Konjunktionen</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Präteritum</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Konjunktiv II</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Passiv</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Modalverben</a></li>
						<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Adjektive</a></li>                   
					</ul>
					


					
				</div>
			</nav>
			
			<div class="content">
				<div id="app">
					<!-- Ajax loaded content here -->
				</div>

			</div>
			
				
			
		</div>

	<!-- /view -->
	<script>
		
	</script>
	<script src="{{asset('js/classie.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>

    <script src="../../js/app.js"></script>

	<script>
	 (function() {
		var menuEl = document.getElementById('ml-menu'),
			mlmenu = new MLMenu(menuEl, {
				// breadcrumbsCtrl : true, // show breadcrumbs
				initialBreadcrumb : 'Home', // initial breadcrumb text
				backCtrl : false, // show back button
				// itemsDelayInterval : 60, // delay between each menu item sliding animation
				//onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
			});

		// mobile menu toggle
		var openMenuCtrl = document.querySelector('.action--open'),
			closeMenuCtrl = document.querySelector('.action--close');

		openMenuCtrl.addEventListener('click', openMenu);
		closeMenuCtrl.addEventListener('click', closeMenu);

		function openMenu() {
			classie.add(menuEl, 'menu--open');
			console.log("test");
			closeMenuCtrl.focus();
		}

		function closeMenu() {
			classie.remove(menuEl, 'menu--open');
			openMenuCtrl.focus();
			console.log("test 2");

		}

		// simulate grid content loading
		var gridWrapper = document.querySelector('.content');

		
		function loadTemplates(ev, itemName) {
			console.log("test");
		}
		
	})(); 
	$('.top_layer').click(function(){
		var index= $('.top_layer').index(this);
		console.log(index);
		var htmltest=$('.top_layer').get(index).text;
		console.log(htmltest);


	});


	

	
	</script>
</body>

</html>
