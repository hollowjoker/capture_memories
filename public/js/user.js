
var doc = $(document);
var user = {}
user = {
	defaults: {
		$editProfile: $('[data-action="editProfile"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults

		self.activateEditProfile(el.$editProfile);
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
	}
}

doc.ready(function(){
	user.onReady()
})