
var doc = $(document);
var services = {}
services = {
	defaults: {
		$dataPickType: $('[data-pick="type"]'),
		$dataActionForm: $('[data-action]'),
		$messageForm: $('#message_form'),
		$dataServiceForm: $('[data-form]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateDataPickType()
		self.activateDataPick(el.$dataPickType)
		self.activateMessageForm(el.$messageForm)
		self.activateDataActionForm(el.$dataActionForm)
		self.activateDataServiceForm(el.$dataServiceForm)
		$('.datepicker').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'mm/dd/yyyy',
			startDate: el.$startDate,
			endDate: el.$endDate
		});
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
	},
	activateDataPickType: function() {
		let pickActive = $('[data-pick].active').attr('data-pick-filter');
		$('[data-filter]').prop('hidden',true);
		$('[data-filter="'+pickActive+'"]').prop('hidden',false);
		$('[name="type"]').val(pickActive);
	},
	activateDataPick: function (trigger) {
		trigger.click(function () {
			let pickActive = $(this).attr('data-pick-filter');
			$('[data-pick]').removeClass('active');
			$('[data-pick-filter="'+pickActive+'"]').addClass('active');
			services.activateDataPickType();
		});
	},
	activateDataActionForm: function (trigger) {
		trigger.click(function (e) {
			let type = $(this).attr('data-action');
			let title = $(this).closest('.service-holder').find('[data-title="main"]').text();
			let modalHolder = $('#formModal');

			if(type == 'tour-package') {
				location.href = $('[relocate-tour]').attr('relocate-tour');
				return false;
			}
			$('[data-form]').prop('hidden', true);
			$('[data-form="'+type+'"]').prop('hidden', false);
			modalHolder.find('.modal-title').text(title);
			modalHolder.modal();
		});
	},
	activateDataServiceForm: function (trigger) {
		trigger.submit(function (e) {
			e.preventDefault();
			let formUrl = $(this).attr('action');
			let formData = $(this).serialize();
			let formRedirect = $(this).attr('redirect-url');

			$.ajax({
				url: formUrl,
				type: "POST",
				data: formData
			}).done(result => {
				let resultData = JSON.parse(result);
				Swal.fire({
					type: resultData.type,
					title: resultData.messages
				}).then((result) => {
					if(result.value) {
						location.href = formRedirect;
					}
				});
			});
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
}

doc.ready(function(){
	services.onReady()
})