
var doc = $(document);
var services = {}
services = {
	defaults: {
		$dataPickType: $('[data-pick="type"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateDataPickType(el.$dataPickType)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
	},
	activateDataPickType: function(trigger) {
        trigger.click(function (e) {
            e.preventDefault();
            
            $('[data-pick="type"]').removeClass('active');
            $(this).addClass('active');
            $(this).closest('.modal-body').find('.input-hidden').addClass('d-block-important');
        });
    }
}

doc.ready(function(){
	services.onReady()
})