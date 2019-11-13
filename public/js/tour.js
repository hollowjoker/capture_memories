
var doc = $(document);
var tour = {}
tour = {
	defaults: {
		$startDate: $('[data-start-date]').attr('data-start-date'),
		$endDate: $('[data-end-date]').attr('data-end-date'),
		$pickGuest: $('[data-guest-pick="quantity"]'),
		$bookingForm: $('#booking_form'),
		$tourChecker: $('[data-tour-checker]'),
		$tourCheckout: $('[data-checkout]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activatePickGuest(el.$pickGuest)
		self.activateBookingForm(el.$bookingForm)
		self.triggerCheckTour(el.$tourChecker),
		self.triggerCheckout(el.$tourCheckout)
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
		$('[name="quantity"]').val(activePickedGuest.attr('data-guest-quantity'));
		$('[name="amount"]').val(parseInt(activePickedGuest.attr('data-unformed-price')) * parseInt(activePickedGuest.attr('data-guest-quantity')));

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
	},
	triggerCheckTour: function (trigger) {
		trigger.change(function (e) {
			let departing = $('[name="departingAt"]').val();
			let returning = $('[name="returningAt"]').val();
			let metaId = $('[name="metaId"]').val();
			let dataUrl = $('[data-tour-checker-url]').attr('data-tour-checker-url');
			let tourLimit = $('[data-count-limit]').attr('data-count-limit');

			if(departing != "" && returning != "") {
				let data = {
					departing: departing,
					returning: returning,
					metaId: metaId
				};
				$.ajax({
					url: dataUrl,
					type: "POST",
					data: data
				}).done(function (returnData) {
					let parsedData = JSON.parse(returnData);
					let textSlot =  "";
					if(parsedData.slot) {
						textSlot = parsedData.slot+" more slot/s available";
					} else {
						textSlot = "Sorry, there are no more slots available";
					}
					$('[data-checker-receiver]').text(textSlot);
				});
			}
		});
	},
	triggerCheckout: function (trigger) {
		trigger.click(function (e) {
			
			let formData = $('#booking_form').serializeArray();
			let proceed = true;
			$.each(formData, function (k, v) {
				if(v.value == "") {
					proceed = false;	
				};
			});

			if(!proceed) {
				Swal.fire({
					type: 'error',
					title: 'Please complete the form'
				});
			} else {
				$(this).attr('hidden',true);
				$('[data-invoice]').attr('hidden', false);
				$('.submit-btn').attr('hidden', false);
				let strAppend = "";
				let ageArray = [];
				let companionArray = [];
				$.each(formData, function (k ,v) {
					if(v.name == "age[]") {
						ageArray.push(v.value);
					} else if(v.name == "companionName[]") {
						companionArray.push(v.value);
					} else {
						$('[data-detail="'+v.name+'"]').text(v.value);
					}
				});
				$.each(companionArray, function (k ,v) {
					strAppend += ""+
						"<tr>"+
							"<td>"+v+"</td>"+
							"<td>"+ageArray[k]+"</td>"+
						"</tr>";
				});
				$('[data-detail="guest-row"]').html(strAppend);
			}

		});
	}
}

doc.ready(function(){
	tour.onReady()
})