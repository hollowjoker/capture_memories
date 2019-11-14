var doc = $(document)
var message = {}

message = {

	defaults: {
		$showMore: $('[data-action="showMore"]'),
		$messageForm: $('#message_form'),
		$serviceInbox: $('[data-action="serviceInbox"]'),
		$uploadFile: $('[name="file"]'),
		$sendUploadFile: $('[data-upload-button]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateShowMore(el.$showMore)
		self.activateMessageForm(el.$messageForm)
		self.activateServiceInbox(el.$serviceInbox)
		self.activateUploadFile(el.$uploadFile)
		self.activateSendUploadFile(el.$sendUploadFile)
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
			let formData = new FormData(this);
			let formUrl = $(this).attr('action');
			let formMethod = $(this).attr('method');
			let formRedirect = $(this).attr('data-redirect');

			$.ajax({
				url: formUrl,
				type: formMethod,
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				dataType:'json',
			}).done( result => {
				// console.log(result);
				if(result.type == 'error') {
					Swal.fire({
						type: result.type,
						title: result.messages
					});
					return false;
				}
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
	},
	activateUploadFile: function (trigger) {
		trigger.change(function (e) {
			let file = $(this)[0].files.length;
			$('[data-upload-button]').attr('hidden', true);
			if(file) {
				$('[data-upload-button]').attr('hidden', false);
			}
		});
	},
	activateSendUploadFile: function (trigger) {
		trigger.click(function (e) {
			$('#message_form').submit();
		});
	}
}

doc.ready(function(){
	message.onReady()
})