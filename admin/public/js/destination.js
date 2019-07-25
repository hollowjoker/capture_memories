
var doc = $(document);
var destination = {}
destination = {
	defaults: {
		$destinationForm: $('[data-form="destination_form"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateDestinationForm(el.$destinationForm)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()

		$('.dataTable').DataTable();
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
	}
}


doc.ready(function(){
	destination.onReady()
})