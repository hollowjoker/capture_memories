
var doc = $(document);
var tour = {}
tour = {
	defaults: {
		$startDate: $('[data-start-date]').attr('data-start-date'),
		$endDate: $('[data-end-date]').attr('data-end-date'),
		$pickQuest: $('[data-action="pickGuest"]'),
		$guestCounter: $('[data-guest-counter]') 
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activatePickQuest(el.$pickQuest)
		self.activateGuestCounter(el.$guestCounter)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		$('.datepicker').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd',
			startDate: el.$startDate,
			endDate: el.$endDate
		});
	},
	activatePickQuest: function(trigger) {
		trigger.click(function (e) {
			$(this).closest('.guest_main').find('.main_holder__pickGuest').toggleClass('d-block-important');
		});
	},
	activateGuestCounter: function (trigger) {
		trigger.click(function (e) {
			let action = $(this).attr('data-picker');
			let count = $(this).closest('.pickGuest_item').find('[data-count="guest"]');
			let countInt = parseInt(count.text());
			let guestCount = $('[data-guest-count]').attr("data-guest-count");
			let userInput = $('[data-guest-user]');
			let guestCountAdult = $('[data-picker="plus"][data-guest-counter="adult"]');
			let guestCountChildren = $('[data-picker="plus"][data-guest-counter="children"]');
			let quantityInput = $('[name="quantity"]');

		
			if(action == 'plus') {
				if(guestCount > userInput.attr('data-guest-user') ){
					count.text(countInt + 1);
					userInput.attr('data-guest-user',(parseInt(userInput.attr('data-guest-user')) + 1));
				}
			} else {
				if(countInt > 0 ) {
					count.text(countInt - 1);
					userInput.attr('data-guest-user',(parseInt(userInput.attr('data-guest-user')) - 1));
				}
			}

			let quantityVal = quantityInput.val().split(' ')[0];
			if(parseInt(userInput.attr('data-guest-user')) > 1) {
				quantityInput.val(userInput.attr('data-guest-user') + ' Guests');
			} else {
				quantityInput.val(userInput.attr('data-guest-user') + ' Guest');
			}

			if(guestCount == userInput.attr('data-guest-user')) {
				guestCountAdult.prop('disabled',true);
				guestCountChildren.prop('disabled',true);
			} else {
				guestCountAdult.prop('disabled',false);
				guestCountChildren.prop('disabled',false);
			}
		});
	},
	
}

doc.ready(function(){
	tour.onReady()
})