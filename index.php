<!DOCTYPE html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<head>
	<title>That One Studio - Film and Video Production</title>
	<meta http-equiv="description" name="description" content="">
	<meta http-equiv="keywords" name="keywords" content="">
	<meta name="robots" content="index,follow">
	<meta name="revisit-after" content="10 days">
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet/less" href="css/styles.less" type="text/css" />
</head>
<body>
<div id="main">
<button style="position:fixed; top:100px; left:100px; z-index:99999;" data-bind="click: editToggle">Edit Mode</button>
	<header>
		<div class="container">
			<a href="#" id="logo" data-bind="click: function(){ nav('home') }">
				<img src="images/logo.gif" />
			</a>
			<nav>
				<ul>
					<li><button class="plain" data-bind="click: function(){ nav('about') }">ABOUT</button><em data-bind="css: {active: navThrottle() == 'about'"></em></li>
					<li class="hasmenu">
						<button class="plain" data-bind="click: ddMenuDrop">PORTFOLIO</button>
						<em data-bind="css: {active: navThrottle() == 'weddings' || nav() == 'multimedia'"></em>
						<ul data-bind="slideVisible: ddMenu, slideDuration: 200">
							<li><button class="plain" data-bind="click: function(){ nav('weddings') }">Weddings</button></li>
							<li><button class="plain" data-bind="click: function(){ nav('multimedia') }">Multimedia</button></li>
						</ul>
					</li>
					<li><button class="plain" data-bind="click: function(){ nav('production') }">PRODUCTION</button><em data-bind="css: {active: navThrottle() == 'production'"></em></li>
					<li><button class="plain" data-bind="click: function(){ nav('contact') }">CONTACT</button><em data-bind="css: {active: navThrottle() == 'contact'"></em></li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="page_wrap">

		<!-- ko if: currentPage() == 'home' -->
			<!-- ko template: {name: 'home_template'} --> <!-- /ko -->
		<!-- /ko -->
		<!-- ko if: currentPage() == 'about' -->
			<!-- ko template: {name: 'about_template'} --> <!-- /ko -->
		<!-- /ko -->
		<!-- ko if: currentPage() == 'weddings' -->
			<!-- ko template: {name: 'weddings_template'} --> <!-- /ko -->
		<!-- /ko -->
		<!-- ko if: currentPage() == 'multimedia' -->
			<!-- ko template: {name: 'multimedia_template'} --> <!-- /ko -->
		<!-- /ko -->
		<!-- ko if: currentPage() == 'production' -->
			<!-- ko template: {name: 'production_template'} --> <!-- /ko -->
		<!-- /ko -->
		<!-- ko if: currentPage() == 'contact' -->
			<!-- ko template: {name: 'contact_template'} --> <!-- /ko -->
		<!-- /ko -->

		<script type="text/html" id="about_template">
			<div id="about" class="container box" data-bind="css: {moveleft: getOutDaWay}">
				<h1>About</h1>
				<div style="text-align:center;margin-bottom:40px;">
					<img src="http://nikongear.com/live/uploads/monthly_08_2012/post-345-0-39851200-1345723568.jpg" width="800" />
				</div>
			</div>
		</script>

		<script type="text/html" id="weddings_template">
			<div id="weddings" class="container box" data-bind="css: {moveright: getOutDaWay}">
				<h1>Weddings</h1>
				<div style="text-align:center;margin-bottom:40px;">
					<img src="http://www.dphotographer.co.uk/users/8417/thm1024/moonlitstartrails.jpg" width="800" />
				</div>
			</div>
		</script>

		<script type="text/html" id="multimedia_template">
			<div id="multimedia" class="container box" data-bind="css: {moveleft: getOutDaWay}">
				<h1>Multimedia</h1>
				<div class="" data-bind="foreach: videos">
					<!-- ko if: category == 'multimedia' -->
						<div data-bind="css: {first: ($index() == 0), last: ($parent.videos().length -1) == $index()}">
							<button data-bind="click: function() {$parent.modal(title, video)}, attr: {id: id}">
								<img data-bind="attr: {src: img}" src="" />
								<span></span>
								<em data-bind="text: title"></em>
							</button>
						</div>
					<!-- /ko -->
				</div>
				<div style="text-align:center;margin-bottom:40px;">
					<img src="http://liquidinplastic.com/wp-content/uploads/2008/06/tahoetoned.jpg" width="800" />
				</div>
			</div>
		</script>

		<script type="text/html" id="production_template">
			<div id="production" class="container box" data-bind="css: {moveright: getOutDaWay}">
				<h1>Production</h1>
				<div style="text-align:center;margin-bottom:40px;">
					<img src="http://www.mobygames.com/images/shots/l/367045-star-wars-galaxies-trials-of-obi-wan-windows-screenshot-landing.jpg" width="800" />
				</div>
			</div>
		</script>

		<script type="text/html" id="contact_template">
			<div id="contact" class="container box" data-bind="css: {moveleft: getOutDaWay}">
				<h1>Contact</h1>
				<div style="text-align:center;margin-bottom:40px;">
					<img src="http://nikongear.com/live/uploads/monthly_08_2012/post-345-0-13488500-1345723298.jpg" width="800" />
				</div>
			</div>
		</script>

		<script type="text/html" id="home_template">
			<div id="feature" class="container box" data-bind="css: {moveleft: getOutDaWay}">
				<div class="video_wrap">
					<iframe id="featured_video" width="" height="" src="//www.youtube.com/embed/nT8HqkC2GVc?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div> <!-- /#feature-->
			<div id="latest" class="container box" data-bind="css: {moveright: getOutDaWay}">
				<h2>Latest Work</h2>
				<div id="carousel" data-bind="foreach: videos">
					<div data-bind="css: {first: ($index() == 0), last: ($parent.videos().length -1) == $index()}">
						<button data-bind="css: {edit: $parent.editMode}, click: $root.thumbAction, attr: {id: id}">
							<img data-bind="attr: {src: img}" src="" />
							<span></span>
							<em data-bind="text: title"></em>
						</button>
						<!-- ko if: showEditOptions -->
							<!-- ko template: {name: 'thumb_edit'} --> <!-- /ko -->
						<!-- /ko -->
					</div>
				</div>
				<!-- ko if: openModal -->
					<!-- ko template: {name: 'modal_window'} --> <!-- /ko -->
				<!-- /ko -->
			</div> <!-- /#latest-->
			<div id="columns" class="container box" data-bind="css: {moveleft: getOutDaWay}">
				<div>
					<h2>Who We Are</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit sapien velit, vel tempor purus fermentum ac. Quisque ac nisl sit amet urna varius tristique. Aliquam eget sapien eget leo ornare vulputate gravida sed dolor. Pellentesque et facilisis</p>
				</div>
				<div>
					<h2>Video Production</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit sapien velit, vel tempor purus fermentum ac. Quisque ac nisl sit amet urna varius tristique. Aliquam eget sapien eget leo ornare vulputate gravida sed dolor. Pellentesque et facilisis</p>
				</div>
				<div class="nrm">
					<h2>Equipment</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit sapien velit, vel tempor purus fermentum ac. Quisque ac nisl sit amet urna varius tristique. Aliquam eget sapien eget leo ornare vulputate gravida sed dolor. Pellentesque et facilisis</p>
				</div>
			</div> <!-- /#columns-->
		</script>

		<div id="page_overlay" data-bind="fadeVisible: pageLoading, fadeDuration: 500">
			<img src="images/loader.gif" width="200" height="50" />
		</div>
	</div>
	<footer>
		<div class="container">
			<div id="copyright">
				&copy; Copyright 2014 That One Studio
			</div>
			<div id="social">
				<ul>
					<li><a href="https://www.facebook.com/pages/That-ONE-Studio/223529291045716" target="_blank" id="facebook">Facebook</a></li>
					<li><a href="https://twitter.com/ThatONEStudio" target="_blank" id="twitter">Twitter</a></li>
					<li><a href="http://www.youtube.com/user/THAT1STUDIO" target="_blank" id="youtube">YouTube</a></li>
					<li><a href="https://vimeo.com/user9048137" target="_blank" id="vimeo">Vimeo</a></li>
				</ul>
			</div>
		</div>
	</footer>

	<script type="text/html" id="thumb_edit">
		<div class="edit_options" data-bind="">
			<div class="button_row">
				<button>New</button>
				<button>Edit</button>
				<button disabled>Save</button>
				<button>Delete</button>
				<button data-bind="click: function() { showEditOptions(false) }">X</button>
			</div>
			<div class="iwrap">
				<label for="v_title">Title</label>
				<input id="v_title" type="text" data-bind="value: title" />
			</div>
			<div class="iwrap">
				<label for="v_video">Video</label>
				<input id="v_video" type="text" />
			</div>
			<div class="iwrap">
				<label for="v_category">Category</label>
				<select id="v_category">
					<option>Weddings</option>
					<option>Multimedia</option>
				</select>
			</div>
			<div class="iwrap">
				<label for="v_featured">Featured</label>
				<input type="checkbox" />
			</div>
		</div>
	</script>

	<script type="text/html" id="modal_window">
		<div id="overlay" data-bind="click: function() {openModal(false)}"></div>
		<div id="modal">
			<button id="close" data-bind="click: function() {openModal(false)}"></button>
			<div id="modal_content">
				<h2 data-bind="text: currentTitle"></h2>
				<iframe data-bind="attr: {src: currentVideo}" width="" height="" src="" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="clear"></div>
		</div>
	</script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="js/ko.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/less.js"></script>
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</div>
</body>
</html>