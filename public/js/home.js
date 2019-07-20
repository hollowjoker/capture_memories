var doc = $(document)
var main = {}

main = {

	defaults: {
		$signUpForm: $('[data-form="sign_up_form"]'),
		$loginForm: $('[data-form="login_form"]'),
		$pickQuest: $('[data-action="pickGuest"]'),
		$pickerMinus: $('[data-picker="minus"]'),
		$pickerPlus: $('[data-picker="plus"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateSignUpForm(el.$signUpForm)
		self.activateLoginForm(el.$loginForm)
		self.activatePickQuest(el.$pickQuest)
		self.activatePickerMinus(el.$pickerMinus)
		self.activatePickerPlus(el.$pickerPlus)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		
		$('.datepicker').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd',
		});
	},
	activateSignUpForm: function(trigger) {
		trigger.submit(function(e) {
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
		})
	},
	activateLoginForm: function(trigger) {
		trigger.submit(function(e) {
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
	},
	activatePickQuest: function(trigger) {
		trigger.click(function (e) {
			$(this).closest('.guest_main').find('.main_holder__pickGuest').toggleClass('d-block-important');
		});
	},
	activatePickerMinus: function(trigger) {
		trigger.click(function (e) {
			console.log(1);
		});
	},
	activatePickerPlus: function(trigger) {
		trigger.click(function (e) {
			console.log(1);
		});
	}
}

doc.ready(function(){
	main.onReady()
})