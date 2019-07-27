
var doc = $(document);
var services = {}
services = {
	defaults: {
		$messageForm: $('#message_form'),
		$updateStatus: $('[data-action="update_status"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateMessageForm(el.$messageForm)
		self.activateUpdateStatus(el.$updateStatus)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		
		$('.dataTable').DataTable({
			"ordering": false
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
	},
	activateUpdateStatus: function (trigger) {
		trigger.click(function (e) {
			e.preventDefault();
			let dataUrl = $(this).attr('data-url');
			let dataStatus = $(this).attr('data-status');
			let redirectUrl = $('[data-redirect]').attr('data-redirect');

			Swal.fire({
				type: 'warning',
				title: 'Are you sure?',
				text: "You want to "+dataStatus+" this reservation?",
				showCancelButton: true,
				confirmButtonColor: '#2CA8FF',
				cancelButtonColor: '#FF3636',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if(result.value) {
					$.ajax({
						url: dataUrl,
						type: 'GET'
					}).done( result => {
						let parsedResult = JSON.parse(result);
						location.href = redirectUrl+parsedResult;
					});
				}
			});

		});
	}
}


doc.ready(function(){
	services.onReady()
})