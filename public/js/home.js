var doc = $(document)
var home = {}

home = {

	defaults: {
		$homePickGuest: $('[data-action="pickGuest"]'),
		$dataPicker: $('[data-picker]'),
		$startDate: $('[data-start-date]').attr('data-start-date')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateHomePickGuest(el.$homePickGuest)
		self.activateDataPicker(el.$dataPicker)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		$('.datepicker').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'mm/dd/yyyy',
			startDate: el.$startDate
		});
	},
	activateHomePickGuest: function(trigger) {
		trigger.click(function (e) {
			let guestHolder = $(this).closest('.guest_main').find('.main_holder__pickGuest');
			guestHolder.toggleClass('active');
		});
	},
	activateDataPicker: function (trigger) {
		trigger.click(function (e) {
			let guestCount = $(this).closest('.guest_main').find('[name="quantity"]');
			let type = $(this).attr('data-picker');

			if(type == 'plus') {
				let value = parseInt(guestCount.val())+1;
				guestCount.val(value);
				$('[data-count="guest"]').text(value);
			} else {
				if(parseInt(guestCount.val()) > 1) {
					let value = parseInt(guestCount.val())-1;
					guestCount.val(value);
					$('[data-count="guest"]').text(value);
				}
			}
		});
	}
}

doc.ready(function(){
	home.onReady()
})