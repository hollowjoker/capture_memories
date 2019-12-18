
var doc = $(document);
var tour = {}
tour = {
	defaults: {
		$startDate: $('[data-start-date]').attr('data-start-date'),
		$endDate: $('[data-end-date]').attr('data-end-date'),
		$pickGuest: $('[data-guest-pick="quantity"]'),
		$bookingForm: $('#booking_form'),
		$tourChecker: $('[data-tour-checker]'),
		$tourCheckout: $('[data-checkout]'),
		$previewImage: $('[data-preview="image"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activatePickGuest(el.$pickGuest)
		self.activateBookingForm(el.$bookingForm)
		self.triggerCheckTour(el.$tourChecker)
		self.triggerCheckout(el.$tourCheckout)
		self.activatePreviewImage(el.$previewImage)
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
		self.activateBirthPicker();
	},
	activateBirthPicker: function () {
		$('.birthdate_picker').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'mm/dd/yyyy'
		});
	},
	activatePickedGuestQuantity: function () {
		var self = this;
		let activePickedGuest = $('[data-guest-pick="quantity"].active');
		let price = activePickedGuest.find('[data-check="price"]').text();
		let metaId = activePickedGuest.attr('data-meta-id');
		let guestAppend = $('[data-companion]').find('tbody').html();
		let guestTable = $('#guest_table').find('tbody');
		$('[data-invoice="false"]').attr('hidden', true);
		$('[data-reserve="button"]').attr('hidden', true);

		$('.price-content').text(price);
		$('[name="metaId"]').val(metaId);
		$('[name="quantity"]').val(activePickedGuest.attr('data-guest-quantity'));
		$('[name="amount"]').val(parseInt(activePickedGuest.attr('data-unformed-price')) * parseInt(activePickedGuest.attr('data-guest-quantity')));

		let toAppend = "";
		for(let i=0; i < activePickedGuest.attr('data-guest-quantity'); i++) {
			toAppend += guestAppend;
		}
		if($('[data-count-limit]').attr('data-count-limit') >= activePickedGuest.attr('data-guest-quantity')) {
			$('[data-checkout="proceed"]').attr('hidden', false);
		} else {
			$('[data-checkout="proceed"]').attr('hidden', true);
		}
		guestTable.html(toAppend);
		self.activateBirthPicker();
		tour.validateCheckTour();
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
			tour.validateCheckTour();
			$('[data-invoice="false"]').attr('hidden', true);
			$('[data-reserve="button"]').attr('hidden', true);
		});
	},
	validateCheckTour: function () {
		let departing = $('[name="departingAt"]').val();
			let returning = $('[name="returningAt"]').val();
			let tourId = $('[name="tourId"]').val();
			let metaId = $('[name="metaId"]').val();
			let quantity = $('[name="quantity"]').val();
			let dataUrl = $('[data-tour-checker-url]').attr('data-tour-checker-url');

			if(departing != "" && returning != "") {
				let data = {
					departing: departing,
					returning: returning,
					tourId: tourId,
					metaId: metaId
				};
				$.ajax({
					url: dataUrl,
					type: "POST",
					data: data
				}).done(function (returnData) {
					let parsedData = JSON.parse(returnData);
					let textSlot =  "";
					$('[data-count-limit]').attr('data-count-limit',parsedData.slot);
					if(parsedData.slot && (parseInt(parsedData.slot) - parseInt(quantity) >= 0)) {
						textSlot = parsedData.slot+" more slot/s available";
						$('[data-checkout="proceed"]').attr('hidden', false);
					} else {
						textSlot = "Sorry, there are no more slots available";
						$('[data-checkout="proceed"]').attr('hidden', true);
					}
					$('[data-checker-receiver]').text(textSlot);
				});
			}
	},
	triggerCheckout: function (trigger) {
		trigger.click(function (e) {
			
			let formData = $('#booking_form').serializeArray();
			let proceed = true;
			

			var today = new Date();
			var year = today.getFullYear();
			var month = today.getMonth() + 1;
			var day = today.getDate();
			var dateToday = new Date(`${year},${month},${day}`);
			var errorMessage = [];
			var i = 0;
			$.each(formData, function (k, v) {
				if(v.value == "") {
					proceed = false;
				};
				if(v.name == 'birthDate[]') {
					var splittedData = v.value.split('/');
					var dateFormatted = new Date(splittedData[2],splittedData[0]-1,splittedData[1]);
					if(tour.diff_years(dateToday,dateFormatted) >= 2) {
						errorMessage.push({
							'id': i,
							'message': 'success'
						});
					} else {
						proceed = false;
						errorMessage.push({
							'id': i,
							'message': 'error'
						});
					}
					i++;
				}
			});

			var ageerror = false;
			if(!proceed) {
				Swal.fire({
					type: 'error',
					title: 'Please complete the form'
				});
				$.each(errorMessage, function (k, v) {
					if(v.message == 'error') {
						$('[name="birthDate[]"]').addClass('is-invalid');
						ageerror = true;
					}
				});
				if(ageerror) {
					$('[data-name="age-error"]').attr('hidden', false);
				}
				
			} else {
				if(!ageerror) {
					$('[data-name="age-error"]').attr('hidden', true);
					$('[name="birthDate[]"]').removeClass('is-invalid');
				}
				$(this).attr('hidden',true);
				$('[data-invoice]').attr('hidden', false);
				$('.submit-btn').attr('hidden', false);
				let strAppend = "";
				let ageArray = [];
				let companionArray = [];
				$.each(formData, function (k ,v) {
					if(v.name == "birthDate[]") {
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
	},
	triggerNumberValidate: function (evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		   return false;

		return true;
	},
	activatePreviewImage(trigger) {
		trigger.click(function (e) {
			e.preventDefault();
			let src = $(this).find('img').attr('src');
			console.log(src);
			$('[data-render="image"]').attr('src', src);
		});
	},
	diff_years(dt2, dt1) 
	{
		var diff =(dt2.getTime() - dt1.getTime()) / 1000;
		diff /= (60 * 60 * 24);
		return Math.abs(Math.round(diff/365.25));	
	}
}

doc.ready(function(){
	tour.onReady()
})