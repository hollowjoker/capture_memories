var doc = $(document)
var main = {}

main = {

	defaults: {
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateBookingCounter()
		self.activateUpdateBookingStatus()
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
	},
	activateBookingCounter() {
		$('[data-booking-counter]').each(function () {
			let bookingHolder = $(this).attr('data-booking-counter');
			let dataUrl = $(this).attr('data-counter-url');
			$.ajax({
				url: dataUrl,
				type: "GET"
			}).done(function (returnData) {
				let parsedData = JSON.parse(returnData);
				if(parsedData.length) {
					$('[data-booking-counter="'+bookingHolder+'"]').text(parsedData[0][0]);
				}
			});
		});
	},
	activateUpdateBookingStatus() {
		let dataUrl = $('[data-update-booking-status-url]').attr('data-update-booking-status-url');
		$.ajax({
			url: dataUrl,
			type: "GET"
		}).done(function (returnData) {
			var parsedData = JSON.parse(returnData);
			if(parsedData.count) {
				$('[data-count-holder="notif"]').text(parsedData.count);
				$('[data-alert="notif"]').attr('hidden', false);
			}
		});
	}
}

doc.ready(function(){
	main.onReady()
})