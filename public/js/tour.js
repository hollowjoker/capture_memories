
var doc = $(document);
var tour = {}
tour = {
	defaults: {
		$startDate: $('[data-start-date]').attr('data-start-date'),
		$endDate: $('[data-end-date]').attr('data-end-date'),
		$pickGuest: $('[data-guest-pick="quantity"]'),
		$bookingForm: $('#booking_form')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activatePickGuest(el.$pickGuest)
		self.activateBookingForm(el.$bookingForm)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
		self.activatePickedGuestQuantity();
		$('.datepicker').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'mm/dd/yyyy',
			startDate: el.$startDate,
			endDate: el.$endDate
		});
	},
	activatePickedGuestQuantity: function () {
		let activePickedGuest = $('[data-guest-pick="quantity"].active');
		let price = activePickedGuest.find('[data-check="price"]').text();
		let metaId = activePickedGuest.attr('data-meta-id');
		let guestAppend = $('[data-companion]').find('tbody').html();
		let guestTable = $('#guest_table').find('tbody');

		$('.price-content').text(price);
		$('[name="metaId"]').val(metaId);

		let toAppend = "";
		for(let i=0; i < activePickedGuest.attr('data-guest-quantity'); i++) {
			toAppend += guestAppend;
		}
		guestTable.html(toAppend);
	},
	activatePickGuest: function (trigger) {
		trigger.click(function (e) {
			$('[data-guest-pick="quantity"]').removeClass('active');
			$(this).addClass('active');

			tour.activatePickedGuestQuantity();
		});
	},
	activateBookingForm: function (trigger) {
		trigger.submit(function (e) {
			e.preventDefault();
			let formUrl = $(this).attr('action');
			let formMethod = $(this).attr('method');
			let formData = $(this).serialize();
			let formRedirect = $(this).attr('redirect-url');
			Swal.fire({
				type: 'warning',
				title: 'Are you sure?',
				text: "You want to reserve this tour?",
				showCancelButton: true,
				confirmButtonColor: '#5e84df',
				cancelButtonColor: '#FF3636',
				confirmButtonText: 'Yes, reserve it!'
			}).then((swalResult) => {
				if(swalResult.value) {
					$.ajax({
						url: formUrl,
						type: formMethod,
						data: formData
					}).done( result => {
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
				}
			});
			
		});
	}
}

doc.ready(function(){
	tour.onReady()
})