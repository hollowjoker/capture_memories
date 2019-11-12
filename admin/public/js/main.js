var doc = $(document)
var main = {}

main = {

	defaults: {
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateBookingCounter()
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
	}
}

doc.ready(function(){
	main.onReady()
})