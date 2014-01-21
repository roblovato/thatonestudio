$(document).ready(function(){

	var thatOne = function() {
		var self = this;

		//UI
		self.ddMenu = ko.observable(false);
		self.openModal = ko.observable(false);
		self.currentVideo = ko.observable('');
		self.currentTitle = ko.observable('');

		//FUNCTIONS
		self.init = function() {
			self.videoScale();
		};

		self.ddMenuDrop = function() {
			self.ddMenu(self.ddMenu() == false ? true : false);
			console.log('video');
		};

		self.videoScale = function() {
			var mainWidth = $('#video_wrap').outerWidth();
				value = (mainWidth);
				value *= 1,
				valueHeight = Math.round((value/16)*9);
			$('#video_wrap').children('iframe').addClass('video');
			$('.video').attr('width', value).attr('height', valueHeight);
		};

		self.modal = function(t, v) {
			self.openModal(true);
			self.currentVideo(v);
			self.currentTitle(t);
			// var top = ($('#modal').outerHeight() / 2),
				// left = ($('#modal').outerWidth() / 2);
			
			// $('#modal').css({'margin-top' : '-'+top+'px', 'margin-left' : '-'+left+'px'});
			// console.log(x);
		};

		self.test = function(x) {
			// console.log('fuckershit');
		}

		self.videos = ko.observableArray([
			{
				id: "01",
				title: "Sircut Lean",
				img: "images/temp_thumb.jpg",
				video: "//www.youtube.com/embed/xS_L4YfBAg4?rel=0"
			},
			{
				id: "02",
				title: "Sean & Nicole",
				img: "images/thumb_sean_nicole.jpg",
				video: "//www.youtube.com/embed/GnMPoanxBwo?rel=0"
			},
			{
				id: "03",
				title: "Twisted Candy",
				img: "images/thumb_twisted_candy.jpg",
				video: "//www.youtube.com/embed/Ik79Plxj2j0?rel=0"
			},
		]);

	};

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

	ko.applyBindings(new thatOne());

	window.app_thatOne = new thatOne();

	$(window).resize(function(){
		app_thatOne.videoScale();
	});

	app_thatOne.init();

});