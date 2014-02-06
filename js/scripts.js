$(document).ready(function(){

	function thatOneVM() {
		var self = this;

		//UI
		self.ddMenu = ko.observable(false);
		self.openModal = ko.observable(false);
		self.currentVideo = ko.observable('');
		self.currentTitle = ko.observable('');
		self.currentPage = ko.observable('home');
		self.getOutDaWay = ko.observable(false);
		self.pageLoading = ko.observable(false);

		self.editableVideo = ko.observable(new Video());

		//FUNCTIONS
		self.init = function() {
			self.videoScale();
                        self.getVideos();
		};

		self.ddMenuDrop = function() {
			self.ddMenu(self.ddMenu() == false ? true : false);
		};

		self.videoScale = function() {
			var mainWidth = $('.video_wrap').outerWidth();
				value = (mainWidth);
				value *= 1,
				valueHeight = Math.round((value/16)*9);
			$('.video_wrap').children('iframe').addClass('video');
			$('.video').attr('width', value).attr('height', valueHeight);
		};

		self.modal = function(t, v) {
			self.openModal(true);
			self.currentVideo(v);
			self.currentTitle(t);
			var top = ($('#modal').outerHeight() / 2),
				left = ($('#modal').outerWidth() / 2);
			
			$('#modal').css({'margin-top' : '-'+top+'px', 'margin-left' : '-'+left+'px'});
			// console.log(x);
		};

		self.nav = function(page) {
			self.pageLoading(true);
			self.getOutDaWay(self.getOutDaWay() == false ? true : false);
			setTimeout(function(){
				self.currentPage(page);
				self.getOutDaWay(self.getOutDaWay() == false ? true : false);
				self.pageLoading(false);
				if (page == 'home') {
					self.videoScale();
				}
			}, 1000);
		};

		self.videos1 = ko.observableArray([
			{
				id: "01",
				title: "Sircut Lean",
				img: "images/temp_thumb.jpg",
				video: "//www.youtube.com/embed/xS_L4YfBAg4?rel=0",
				category: "latest"
			},
			{
				id: "02",
				title: "Sean & Nicole",
				img: "images/thumb_sean_nicole.jpg",
				video: "//www.youtube.com/embed/GnMPoanxBwo?rel=0",
				category: "latest"
			},
			{
				id: "03",
				title: "Twisted Candy",
				img: "images/thumb_twisted_candy.jpg",
				video: "//www.youtube.com/embed/Ik79Plxj2j0?rel=0",
				category: "latest"
			},
		]);
                
                self.videos = ko.observableArray();
                
		self.getVideos = function(){
			$.post('/controller/videos.php',{"action":"get_featured"}, function(data){
				if(data && data.success){
                               
                                    //console.log(data.videos);
					$.each(data.videos, function(i,v){
                                            //console.log(v.category);
                                           //self.videos.push(new Video(v));
                                           
                                            self.videos.push(v);
                                            //console.log(self.videos);
					//populate the page here;
					});
                                       // console.log(self.videos());
				} else {
					//fuck no, this isn't optional
				}
                                //ko.applyBindings(self,document.getElementById('carousel'));
                                //ko.applyBindings(new thatOneVM());
			},'json');
		};

	};

	function Video(vid) {
		var self = this;

		if (typeof vid === 'undefined') {
		    vid = {};
		}

		self.id = ko.observable(vid.id || -1);
		self.title = ko.observable(vid.title || '');
		self.img = ko.observable(vid.img || '');
		self.video = ko.observable(vid.video || '');
		self.category = ko.observable(vid.category || '');

		//UI
		// self.catSelect = ko.observable(false);

		self.toJS = function() {
			return {
				id: self.id(),
				title: self.title(),
				img: self.img(),
				video: self.video(),
				category: self.category()
			};
		};
	}

	//Custom bindings
	ko.bindingHandlers.fadeVisible = {
		init: function(element, valueAccessor) {
			var value = valueAccessor();
			$(element).toggle(ko.utils.unwrapObservable(value));
		},
		update: function(element, valueAccessor, allBindings) {
			var value = valueAccessor(),
			duration = allBindings.get('fadeDuration') || 300;
			ko.utils.unwrapObservable(value) ? $(element).fadeIn(duration) : $(element).fadeOut(duration);
		}
	};

	ko.bindingHandlers.slideVisible = {
		update: function(element, valueAccessor, allBindings) {
			var value = valueAccessor(),
			valueUnwrapped = ko.utils.unwrapObservable(value),
			duration = allBindings.get('slideDuration') || 300;

		if (valueUnwrapped == true)
			$(element).slideDown(duration);
		else
			$(element).slideUp(duration);
		}
	};

	$(document).on('mouseenter','.hasmenu',function(){ $(this).parent().find('ul').stop(true, false).slideDown(300);
	});

	$(document).on('mouseleave','.hasmenu',function(){ $(this).parent().find('ul').stop(true, false).slideUp(100);
	});

	ko.applyBindings(new thatOneVM(self.videos));

	window.app_thatOne = new thatOneVM();

	$(window).resize(function(){
		app_thatOne.videoScale();
	});

	app_thatOne.init();

});