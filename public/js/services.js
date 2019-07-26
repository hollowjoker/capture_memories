
var doc = $(document);
var services = {}
services = {
	defaults: {
		$dataPickType: $('[data-pick="type"]'),
		$dataActionForm: $('[data-action]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateDataPickType()
		self.activateDataPick(el.$dataPickType)
		self.activateDataActionForm(el.$dataActionForm)
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
	}
}

doc.ready(function(){
	services.onReady()
})