$(document).ready(function(){

	function thatOneVM() {
		var self = this;

		//UI
		self.ddMenu = ko.observable(false);
		self.openModal = ko.observable(false);
		self.currentVideo = ko.observable('');
		self.currentTitle = ko.observable('');
		self.currentPage = ko.observable('home');
		self.beGone = ko.observable(false);
		self.pageLoading = ko.observable(false);

		self.showEditOptions = ko.observable(false);
		self.editMode = ko.observable(false);
		self.isNew = ko.observable(false);

		self.videos = ko.observableArray();
		self.editableVideo = ko.observable(new Video());

		//FUNCTIONS
		self.init = function() {
			self.render();
			self.getVideos();
			self.videoScale();
		};

		this.render = function(){
			ko.applyBindings(self, document.getElementById('main') );
		};

		self.ddMenuDrop = function() {
			self.ddMenu(self.ddMenu() == false ? true : false);
		};

		self.videoScale = function() {
			var mainWidth = $('.video_wrap').outerWidth();
				value = (mainWidth);
				value *= 1,
				valueHeight = Math.round((value/16)*9);
			$('#featured_video').attr('width', value).attr('height', valueHeight);
		};

		self.modal = function(t, v) {
			self.openModal(true);
			self.currentVideo(v);
			self.currentTitle(t);
			var top = ($('#modal').outerHeight() / 2),
				left = ($('#modal').outerWidth() / 2);
			
			$('#modal').css({'margin-top' : '-'+top+'px', 'margin-left' : '-'+left+'px'});
		};

		self.nav = function(page) {
			self.pageLoading(true);
			self.beGone(self.beGone() == false ? true : false);
			setTimeout(function(){
				self.currentPage(page);
				self.beGone(self.beGone() == false ? true : false);
				self.pageLoading(false);
				if (page == 'home') {
					self.videoScale();
				}
			}, 1000);
		};

		self.editVideoDone = function() {
			if (self.isNew() == true) {
				self.addVideo();
			} else {
				self.saveVideo();
			}
		};

		self.addNewVideo = function() {
			self.isNew(true);
			self.editableVideo(new Video());
			self.showEditOptions(true);
			self.setVideoEditable(true);
		};

		self.getVideos = function() {
			$.post('controller/videos.php',{"action":"get_featured"}, function(data){
				if(data && data.success){
					$.each(data.videos, function(i,v){
						self.videos.push(new Video(v));
					});
					self.sortVideos();
				} else {
					//fuck no, this isn't optional
				}
			},'json');
		};

		this.sortVideos = function () {
			self.videos.sort(function (a, b) {
				return b.id() - a.id();
			});
		};

		self.addVideo = function() {
			// $.post('controller/videos.php',{"action":"add_video"},
			// 	self.editableVideo().toJS(),
			// 	function(data){
			// 		if(data && data.success){
			// 			self.showEditOptions(false);
			// 		} else {
			// 			//no dice chino
			// 		}
			// 	},
			// 	'json'
			// );
			console.log('add');
		};

		self.saveVideo = function() {
			// $.post('controller/videos.php',{"action":"save_video"},
			// 	self.editableVideo().toJS(),
			// 	function(data){
			// 		if(data && data.success){
			// 			self.showEditOptions(false);
			// 		} else {
			// 			//no dice chino
			// 		}
			// 	},
			// 	'json'
			// );
			console.log('save');
		};

		self.deleteVideo = function() {
			// $.post('controller/videos.php',{"action":"delete_video"},
			// 	{ id: self.editableVideo().id()},
			// 	function(data){
			// 		if(data && data.success){
			// 			self.showEditOptions(false);
			// 		} else {
			// 			//no dice chino
			// 		}
			// 	},
			// 	'json'
			// );
			console.log('delete');
		};

		self.cancelEdit = function() {
			if(self.isNew() == false) {
				if (self.editableVideo().editable() == true) {
					self.setVideoEditable(false);
				} else {
					self.showEditOptions(false);
				}
			} else {
				self.isNew(false);
				self.showEditOptions(false);
				self.setVideoEditable(false);
			}
		};

		self.setVideoEditable = function(val){
			self.editableVideo().editable(val);
		};

		self.thumbAction = function(thumb) {
			var t = thumb.title(),
				v = thumb.video();
			if (!self.editMode()) {
				self.modal(t, v);
			} else {
				self.editableVideo(thumb);
				self.showEditOptions(true);
			}
		};

		self.editToggle = function() {
			self.editMode(self.editMode() == true ? false : true);
		};
	};

	function Video(vid) {
		var self = this;

		if (typeof vid === 'undefined') {
		    vid = {};
		}

		self.id = ko.observable(vid.id || -1);
		self.title = ko.observable(vid.title || '');
		self.video_id = ko.observable(vid.video_id || '');
		self.video_type = ko.observable(vid.video_type || '');
		self.img = ko.computed(function() {
			if (self.video_type() == 'yt') {
				return 'http://img.youtube.com/vi/' + self.video_id() + '/mqdefault.jpg';
			} else if (self.video_type() == 'vimeo') {
				$.getJSON('http://www.vimeo.com/api/v2/video/' + self.video_id() + '.json?callback=?', {format: "json"}, function(data) {
					self.img_vimeo(data[0].thumbnail_large);
				});
			}
		});
		self.img_vimeo = ko.observable(vid.img_vimeo || '');
		self.video = ko.computed(function() {
			if (self.video_type() == 'yt') {
				return '//www.youtube.com/embed/' + self.video_id() + '?rel=0';
			} else if (self.video_type() == 'vimeo') {
				return '//player.vimeo.com/video/' + self.video_id() + '?byline=0';
			}
		});
		self.category = ko.observable(vid.category || '');
		self.sub_category = ko.observable(vid.sub_category || '');
		self.featured = ko.observable(vid.featured || '');

		//UI
		self.editable = ko.observable(false);
		// self.catSelect = ko.observable(false);

		self.toJS = function() {
			return {
				id: self.id(),
				title: self.title(),
				video_id: self.video_id(),
				video_type: self.video_type(),
				category: self.category(),
				sub_category: self.sub_category(),
				featured: self.featured()
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

	window.app_thatOne = new thatOneVM();

	$(window).resize(function(){
		app_thatOne.videoScale();
	});

	app_thatOne.init();

});
