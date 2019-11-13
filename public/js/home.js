var doc = $(document)
var home = {}

home = {

	defaults: {
		$homePickGuest: $('[data-action="pickGuest"]'),
		$dataPicker: $('[data-picker]'),
		$startDate: $('[data-start-date]').attr('data-start-date'),
		$forgetPasswordForm: $('#forgot_form'),
		$verifyPasswordForm: $('#verfiy_password_form')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateHomePickGuest(el.$homePickGuest)
		self.activateDataPicker(el.$dataPicker)
		self.activateForgetPasswordForm(el.$forgetPasswordForm)
		self.activateVerifyPasswordForm(el.$verifyPasswordForm)
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
	},
	activateForgetPasswordForm: function (trigger) {
		trigger.submit(function (e) {
			e.preventDefault();
			let dataUrl = $(this).attr('action');
			let formData = $(this).serialize();
			let dataType = $(this).attr('method');
			$.ajax({
				url: dataUrl,
				data: formData,
				type: dataType
			}).done(function (returnData) {
				let parsedData = JSON.parse(returnData);
				Swal.fire({
					type: parsedData.type,
					title: parsedData.messages
				});
			});
		});
	},
	activateVerifyPasswordForm: function (trigger) {
		trigger.submit(function (e) {
			e.preventDefault();
			let dataUrl = $(this).attr('action');
			let formData = $(this).serialize();
			let dataType = $(this).attr('method');
			let redirectUrl = $(this).attr('data-redirect');
			$.ajax({
				url: dataUrl,
				data: formData,
				type: dataType
			}).done(function (returnData) {
				let parsedData = JSON.parse(returnData);
				Swal.fire({
					type: parsedData.type,
					title: parsedData.messages
				}).then((result) => {
					if(result.value && parsedData.type == 'success') {
						location.href = redirectUrl;
					}
				});
			});
		});
	}
}

doc.ready(function(){
	home.onReady()
})