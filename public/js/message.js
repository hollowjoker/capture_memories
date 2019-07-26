var doc = $(document)
var message = {}

message = {

	defaults: {
		$showMore: $('[data-action="showMore"]'),
		$messageForm: $('#message_form'),
		$serviceInbox: $('[data-action="serviceInbox"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateShowMore(el.$showMore)
		self.activateMessageForm(el.$messageForm)
		self.activateServiceInbox(el.$serviceInbox)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
	},
	activateShowMore: function (trigger) {
		trigger.click(function (e) {
			let contentHolder = $('[data-holder="showMore"]');
			contentHolder.toggleClass('active');
			if(contentHolder.hasClass('active')) {
				$(this).text('Show less');
			} else {
				$(this).text('Show more');
			}
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
	activateServiceInbox: function (trigger) {
		trigger.change(function (e) {
			let redirectUrl = $(this).attr('data-redirect');
			let type = $(this).find('option:selected').val();
			location.href = redirectUrl+type;
		});
	}
}

doc.ready(function(){
	message.onReady()
})