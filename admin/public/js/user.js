
var doc = $(document);
var user = {}
user = {
	defaults: {
	},
	onInit: function() {
		var self = this,
		el = self.defaults
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		
		$('.dataTable').DataTable();
	},
	activateUserForm: function(trigger) {
		trigger.submit(function(e) {
			e.preventDefault();
			let loader = $(this).find('.btn').attr('disabled',true);
			let formUrl = $(this).attr('action');
			let formMethod = $(this).attr('method');
			let redirectUrl = $(this).attr('data-redirect');
			let formData = new FormData(this);

			$.ajax({
				type: formMethod,
				url: formUrl,
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				dataType:'json',
			}).done( resultData => {
				loader.attr('disabled',false);
				Swal.fire({
					type: resultData.type,
					title: resultData.messages
				}).then((result) => {
					if(result.value && resultData.type == 'success') {
						location.href = redirectUrl;
					}
				});
			});
		});
	},
}

doc.ready(function(){
	user.onReady()
})