
var doc = $(document);
var reservation = {}
reservation = {
	defaults: {
		$showMore: $('[data-action="showMore"]'),
		$messageForm: $('#message_form'),
		$updateStatus: $('[data-action="update_status"]'),
		$uploadFile: $('[name="file"]'),
		$sendUploadFile: $('[data-upload-button]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateShowMore(el.$showMore)
		self.activateMessageForm(el.$messageForm)
		self.activateUpdateStatus(el.$updateStatus)
		self.activateUploadFile(el.$uploadFile)
		self.activateSendUploadFile(el.$sendUploadFile)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		
		$('.dataTable').DataTable({
			"ordering": false
		});
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
	activateUpdateStatus: function (trigger) {
		trigger.click(function (e) {
			e.preventDefault();
			let dataUrl = $(this).attr('data-url');
			let dataStatus = $(this).attr('data-status');
			let redirectUrl = $('[data-redirect]').attr('data-redirect');

			Swal.fire({
				type: 'warning',
				title: 'Are you sure?',
				text: "You want to "+dataStatus+" this reservation?",
				showCancelButton: true,
				confirmButtonColor: '#2CA8FF',
				cancelButtonColor: '#FF3636',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if(result.value) {
					$.ajax({
						url: dataUrl,
						type: 'GET'
					}).done( result => {
						location.href = redirectUrl;
					});
				}
			});

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
	reservation.onReady()
})