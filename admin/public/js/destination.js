
var doc = $(document);
var destination = {}
destination = {
	defaults: {
		$destinationForm: $('[data-form="destination_form"]'),
		$editDestination: $('[data-action="editDestination"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateDestinationForm(el.$destinationForm)
		self.activateEditDestination(el.$editDestination)
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
				console.log(parsedResult);
				// Swal.fire({
				// 	type: parsedResult.type,
				// 	title: parsedResult.messages
				// }).then((result) => {
				// 	if(result.value) {
				// 		location.href = redirectUrl;
				// 	}
				// });
			});
		});
	},
	activateEditDestination: function (trigger) {
		trigger.click(function (e) {
			let dataUrl = $(this).attr('data-url');
			
			$.ajax({
				url: dataUrl,
				type: "GET"
			}).done( result => {
				let parsedResult = JSON.parse(result);

				$.each(parsedResult, function (k, v) {
					let inputHolder = $('[name="'+k+'"]');
					if(k == 'description') {
						inputHolder.text(v);
					} else if (k == 'status') {
						if(v == 'active') {
							inputHolder.prop('checked',true);
						} else {
							inputHolder.prop('checked',false);
						}
					} else if (k == 'airlineStatus' || k == 'visaStatus' || k == 'wifiStatus' || k == 'tourStatus') {
						if(v == 'yes') {
							inputHolder.prop('checked',true);
						} else {
							inputHolder.prop('checked',false);
						}
					} else {
						inputHolder.val(v);
					}
				})

				$('#destinationFormModal').modal();
			});
		});
	}
}


doc.ready(function(){
	destination.onReady()
})