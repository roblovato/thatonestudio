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
	<!-- <button style="position:absolute; top:100px; left:100px; z-index:99999;" data-bind="click: videoScale">Test</button> -->
	<header>
		<div class="container">
			<a href="#" id="logo">
				<img src="images/logo.gif" />
			</a>
			<nav>
				<ul>
					<li><button class="plain">ABOUT</button><em></em></li>
					<li class="hasmenu">
						<button class="plain" data-bind="click: ddMenuDrop">PORTFOLIO</button>
						<em></em>
						<ul data-bind="slideVisible: ddMenu, slideDuration: 200">
							<li><button class="plain">Weddings</button></li>
							<li><button class="plain">Multimedia</button></li>
						</ul>
					</li>
					<li><button class="plain">PRODUCTION</button><em></em></li>
					<li><button class="plain">CONTACT</button><em></em></li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="feature" class="container">
		<div class="video_wrap">
			<iframe width="" height="" src="//www.youtube.com/embed/nT8HqkC2GVc?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</div> <!-- /#feature-->
	<div id="latest" class="container">
		<h2>Latest Work</h2>
		<div id="carousel" data-bind="foreach: videos">
			<div><button data-bind="click: function() {$parent.modal(title, video)}, attr: {id: id}">
				<img data-bind="attr: {src: img}" src="" />
				<span></span>
				<em data-bind="text: title"></em>
			</button></div>
		</div>
		<!-- ko if: openModal -->
			<!-- ko template: {name: 'modal_window'} --> <!-- /ko -->
		<!-- /ko -->
	</div> <!-- /#latest-->
	<div id="columns" class="container">
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
</body>
</html>