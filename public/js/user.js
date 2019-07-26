
var doc = $(document);
var user = {}
user = {
	defaults: {
		$editProfile: $('[data-action="editProfile"]'),
		$editForm: $('[data-form="edit_user_form"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults

		self.activateEditProfile(el.$editProfile);
		self.activateEditForm(el.$editForm);
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
	},
	activateEditProfile: function (trigger) {
		trigger.click(function (e) {
			$('#userFormModal').modal();
		});
	},
	activateEditForm: function (trigger) {
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
			}).done( returnResult => {
				let parsedData = JSON.parse(returnResult);
				$('input').removeClass('is-invalid').closest('.form-group').find('.feedback').removeClass('invalid-feedback');
				if (parsedData.status == 'success') {
					Swal.fire({
						type: parsedData.status,
						title: parsedData.messages
					}).then((result) => {
						location.href = redirectUrl;
					});
				} else {
					$.each(parsedData.messages, function (k, v) {
						let inputName = '[name="'+k+'"]';
						$(inputName).addClass('is-invalid').closest('.form-group').find('.feedback').addClass('invalid-feedback').text(v);
					})
				}
			});
		});
	}
}

doc.ready(function(){
	user.onReady()
})