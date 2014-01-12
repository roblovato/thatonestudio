$(document).ready(function(){

	var thatOne = function() {
		var self = this;

		//UI
		self.ddMenu = ko.observable(false);

		//FUNCTIONS
		self.ddMenuDrop = function() {
			self.ddMenu(self.ddMenu() == false ? true : false);
		}

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

});