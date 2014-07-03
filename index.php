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
<!-- <button style="position:fixed; top:100px; left:100px; z-index:99999;" data-bind="click: editToggle">Edit Mode</button> -->
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
			<div id="about" class="container box" data-bind="css: {moveleft: beGone}">
				<h1>About Us</h1>
				<h2>Who is "That ONE Studio"?</h2>
				<p>Carlos Munguia, Founder and CEO, has recruited some of the best up and coming talents in the Bay Area to be one of the most talked about and diverse production company out there today. With his team they bring the knowledge and experience they have that has truly started a buzz in the multimedia field. The diversity they bring in the fields of videography and filmmaking has given them a step up from their competitors. Coming from art school backgrounds they're constantly and creatively pouring their passions into each and every projects they work on. The team is never afraid to try new things and tackle new types of fields. They constantly strive on bringing their unique style of visualization to go above and beyond, ensuring their client's satisfaction!</p>
				<h2>What does T.O.S. do?</h2>
				<p>We make films! Plan, shoot, edit and finalize all the way down to the finished product be it digital and/or hard copy. We love making films both as a hobby and as our work.<br />
					In the end, I guess you can call us filmmakers.</p>
				<h2>When did we begin?</h2>
				<p>Though we've been filming for years on our own, That ONE Studio began in October 2011. Since then, we've been filming weddings, short narrative pieces, music videos, and various other projects.</p>
				<h2>Where are we based?</h2>
				<p>We are based out of the Bay Area and serve it with a smile! And laughter!</p>
				<h2>Why do we do this?</h2>
				<p>Love & Passion.<br />
					Film is the type of work we are always willing to lose sleep over, all to bring joy and excitement to whomever was waiting for the video.</p>
			</div>
		</script>

		<script type="text/html" id="weddings_template">
			<div id="weddings" class="container box" data-bind="css: {moveright: beGone}">
				<h1>Weddings</h1>
				<div class="grid" data-bind="foreach: videos">
					<!-- ko if: category() == 'weddings' -->
						<!-- ko template: {name: 'grid_item_template'} --> <!-- /ko -->
					<!-- /ko -->
				</div>
				<h2>Packages</h2>
				<p>That ONE Studio strives to work alongside our customers so that we can accommodate you anyway we can. We offer a variety of choices to choose from like our <strong>"Highlight Featurette"</strong> package to our <strong>"Movie DVD Special"</strong> Package. We understand finances are always fragile when it comes to wedding planning, so we want to ensure you that our prices are very competitive and especially affordable! We are more dedicated about sharing the moment with you than taking it from you; because at the end of the day, it’s more about making your memories last instead of worrying about what could have been.</p>
			</div>
		</script>

		<script type="text/html" id="multimedia_template">
			<div id="multimedia" class="container box" data-bind="css: {moveleft: beGone}">
				<h1>Multimedia</h1>
				<h2>Music Videos</h2>
				<div class="grid" data-bind="foreach: videos">
					<!-- ko if: sub_category() == 'music_videos' -->
						<!-- ko template: {name: 'grid_item_template'} --> <!-- /ko -->
					<!-- /ko -->
				</div>
				<h2>Commercial/Promo Videos</h2>
				<div class="grid" data-bind="foreach: videos">
					<!-- ko if: sub_category() == 'commercial_promo' -->
						<!-- ko template: {name: 'grid_item_template'} --> <!-- /ko -->
					<!-- /ko -->
				</div>
				<h2>Trailer/Teaser Videos</h2>
				<div class="grid" data-bind="foreach: videos">
					<!-- ko if: sub_category() == 'trailer_teaser' -->
						<!-- ko template: {name: 'grid_item_template'} --> <!-- /ko -->
					<!-- /ko -->
				</div>
				<h2>Short Films/Documentaries</h2>
				<div class="grid" data-bind="foreach: videos">
					<!-- ko if: sub_category() == 'short_docu' -->
						<!-- ko template: {name: 'grid_item_template'} --> <!-- /ko -->
					<!-- /ko -->
				</div>
			</div>
		</script>

		<script type="text/html" id="grid_item_template">
			<div class="sub">
				<button data-bind="click: $root.thumbAction, attr: {id: id}">
					<!-- ko if: video_type() == 'yt' -->
						<img data-bind="attr: {src: img}" src="" />
					<!-- /ko -->
					<!-- ko if: video_type() == 'vimeo' -->
						<img data-bind="attr: {src: img_vimeo}" src="" />
					<!-- /ko -->
					<span></span>
					<em data-bind="text: title"></em>
				</button>
			</div>
		</script>

		<script type="text/html" id="production_template">
			<div id="production" class="container box" data-bind="css: {moveright: beGone}">
				<h1>Production</h1>
				<section>
					<h2>Hair and Make-Up Artists</h2>
					<div class="columns">
						<div>
							<h3>Chayenne Mallari</h3>
							<p>
								Web: <a href="http://bellezzacristalis.com/danville" target="_blank">bellezzacristalis.com/danville</a><br />
								Email: <a href="mailto:chayennem@gmail.com">chayennem@gmail.com</a>
							</p>
						</div>
						<div>
							<h3>Tara Vineyard</h3>
							<p>
								Email: <a href="mailto:t.vineyard12@gmail.com">t.vineyard12@gmail.com</a>
							</p>
						</div>
					</div>
				</section>
				<section>
					<h2>Photographers</h2>
					<div class="columns">
						<div>
							<h3>Nicole Paulson</h3>
							<p>
								Web: <a href="http://Nicolepaulson.com" target="_blank">Nicolepaulson.com</a><br />
							</p>
						</div>
						<div>
							<h3>Lex Tamayo</h3>
							<p>
								Web: <a href="http://Prolificimage.com" target="_blank">Prolificimage.com</a><br />
								Email: <a href="mailto:Lextamayo@gmail.com">Lextamayo@gmail.com</a>
							</p>
						</div>
						<div class="nrm">
							<h3>Tai La</h3>
							<p>
								Web: <a href="http://www.facebook.com/pages/Tai-La-Photography/131889886839294" target="_blank">www.facebook.com/pages/Tai-La-Photography/131889886839294</a><br />
								Email: <a href="mailto:Photogtaila@gmail.com">Photogtaila@gmail.com</a>
							</p>
						</div>
					</div>
				</section>
				<section>
					<h2>Manicurist/Nail Technician</h2>
					<div class="columns">
						<div>
							<h3>Nhi "Kat" Le</h3>
							<p>
								Web: <a href="http://www.glamhermobilenails.com" target="_blank">glamhermobilenails.com</a><br />
								Email: <a href="mailto:glamhermobilenails@gmail.com">glamhermobilenails@gmail.com</a>
							</p>
						</div>
					</div>
				</section>
			</div>
		</script>

		<script type="text/html" id="contact_template">
			<div id="contact" class="container box" data-bind="css: {moveleft: beGone}">
				<h1>Contact</h1>
				<div>
					<form id="contact_form" name="contact_form">
						<h2>Book Us While Were Still Available!</h2>
						<div id="contact_left">
							<div class="iwrap">
								<label>First</label>
								<input type="text" name="first_name" id="first_name">
							</div>
							<div class="iwrap">
								<label>Last Name</label>
								<input type="text" name="last_name" id="last_name">
							</div>
							<div class="iwrap">
								<label>Email</label>
								<input type="text" name="email" id="email">
							</div>
							<div class="iwrap">
								<label>Phone</label>
								<input type="text" name="phone" id="phone">
							</div>
						</div>
						<div id="contact_right">
							<div class="iwrap">
								<label>Comment</label>
								<textarea name="comment" id="comment"></textarea>
							</div>
							<input type="hidden" name="action" value="submit_contact">
							<input type="submit" name="submit" value="Submit">
						</div>
					</form>
					<div id="thankyou" style="display:none;">Thank you for contacting us</div>
				</div>
			</div>
		</script>

		<script type="text/html" id="home_template">
			<div id="feature" class="container box" data-bind="css: {moveleft: beGone}">
				<div class="video_wrap">
					<iframe id="featured_video" width="" height="" src="//player.vimeo.com/video/92975014" frameborder="0" allowfullscreen></iframe>
				</div>
			</div> <!-- /#feature-->
			<div id="latest" class="container box" data-bind="css: {moveright: beGone}">
				<h2>Latest Work</h2>
				<!-- ko if: editMode -->
					<div id="add_video"> 
						<button data-bind="click: addNewVideo">New</button>
					</div>
				<!-- /ko -->
				<div class="grid" data-bind="foreach: videos">
					<!-- ko if: featured() == 'true' -->
						<div>
							<button data-bind="css: {edit: $parent.editMode}, click: $root.thumbAction, attr: {id: id}">
								<img data-bind="attr: {src: img}" src="" />
								<span></span>
								<em data-bind="text: title"></em>
							</button>
						</div>
					<!-- /ko -->
				</div>
			</div> <!-- /#latest-->
			<div class="columns container box" data-bind="css: {moveleft: beGone}">
				<div>
					<h2>Who We Are</h2>
					<p>Here at That ONE Studio, we not only want to make an impression on our clients but also our community. Starting this year, every video that we produce, we will donate a portion of the proceeds to a local charity on behalf of our customers and the T.O.S. family.</p>
				</div>
				<div>
					<h2>Video Production</h2>
					<p>We strive on working with others so, this year we will be providing for our clients the opportunity to shoot future videos on the ever-so popular, RED "Epic" film camera.</p>
				</div>
				<div class="nrm">
					<h2>Equipment</h2>
					<p>We offer everything and anything that you may need to shoot a video. Lights, audio equipment, HD cameras, etc., so there is nothing that we don’t have or can’t provide for you.</p>
				</div>
			</div> <!-- /#columns-->
		</script>
		<!-- ko if: showEditOptions -->
			<!-- ko template: {name: 'thumb_edit'} --> <!-- /ko -->
		<!-- /ko -->
		<!-- ko if: openModal -->
			<!-- ko template: {name: 'modal_window'} --> <!-- /ko -->
		<!-- /ko -->

		<div id="page_overlay" data-bind="fadeVisible: pageLoading, fadeDuration: 500">
			<img src="images/loader.gif" width="200" height="50" />
		</div>
	</div>
	<footer>
		<div class="container">
			<div id="copyright">
				&copy; Copyright 2014 | That ONE Studio LLC
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
		<div class="overlay" data-bind=""></div>
		<div class="edit_options" data-bind="with: editableVideo">
			<div class="button_row">
				<button data-bind="click: function() { $parent.setVideoEditable(true) }, disable: editable">Edit</button>
				<button data-bind="click: $parent.editVideoDone, disable: !editable()">Save</button>
				<button data-bind="click: $parent.deleteVideo, visible: !$parent.isNew()">Delete</button>
				<button data-bind="click: $parent.cancelEdit">X</button>
			</div>
			<div class="iwrap">
				<label for="v_title">Title</label>
				<input id="v_title" type="text" data-bind="value: title, disable: !editable()"/>
			</div>
			<!-- ko if: editable -->
				<div class="iwrap">
					<label for="v_video">Video</label>
					<input id="v_video" type="text" data-bind="value: video" />
				</div>
			<!-- /ko -->
			<div class="iwrap">
				<label for="v_category">Category</label>
				<select id="v_category" data-bind="disable: !editable(), value: category">
					<option>Weddings</option>
					<option>Multimedia</option>
				</select>
			</div>
			<div class="iwrap">
				<label for="v_featured">Featured</label>
				<input type="checkbox" data-bind="disable: !editable()" />
			</div>
		</div>
	</script>

	<script type="text/html" id="modal_window">
		<div class="overlay" data-bind="click: function() {openModal(false)}"></div>
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
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/less.js"></script>
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</div>
</body>
</html>
