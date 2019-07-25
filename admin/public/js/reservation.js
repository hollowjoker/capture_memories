
var doc = $(document);
var reservation = {}
reservation = {
	defaults: {
		$destinationForm: $('[data-form="destination_form"]'),
		$showMore: $('[data-action="showMore"]'),
		$messageForm: $('#message_form')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateDestinationForm(el.$destinationForm)
		self.activateShowMore(el.$showMore)
		self.activateMessageForm(el.$messageForm)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		
		$('.dataTable').DataTable({
			"ordering": false
		});
	},
	activateDestinationForm: function (trigger) {
		trigger.submit(function (e) {
			e.preventDefault();
			let formUrl = $(this).attr('action');
			let formMethod = $(this).attr('method');
			let redirectUrl = $(this).attr('data-redirect');
			let formData = $(this).serialize();

			$.ajax({
				url: formUrl,
				type: formMethod,
				data: formData
			}).done( resultData => {
				let parsedResult = JSON.parse(resultData);
				Swal.fire({
					type: parsedResult.type,
					title: parsedResult.messages
				}).then((result) => {
					if(result.value) {
						location.href = redirectUrl;
					}
				});
			});
		});
	},
	activateShowMore: function (trigger) {
		trigger.click(function (e) {
			let contentHolder = $('[data-holder="showMore"]');
			contentHolder.toggleClass('active');
			if(contentHolder.hasClass('active')) {
				$(this).text('Show less');
			} else {
				$(this).text('Show more');
			}
		});
	},
	activateMessageForm: function (trigger) {
		trigger.submit(function (e) {
			e.preventDefault();
			let formUrl = $(this).attr('action');
			let formMethod = $(this).attr('method');
			let formData = $(this).serialize();
			let formRedirect = $(this).attr('data-redirect');

			$.ajax({
				url: formUrl,
				type: formMethod,
				data: formData
			}).done( result => {
				location.href = formRedirect;
			});
		});
	}
}


doc.ready(function(){
	reservation.onReady()
})