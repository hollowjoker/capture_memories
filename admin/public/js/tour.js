
var doc = $(document);
var tour = {}
tour = {
	defaults: {
		$tourForm: $('[data-form="tour_form"]'),
		$imageUpload: $('[data-file="image_upload"]'),
		$editTour: $('[data-action="edit_tour"]')
	},
	onInit: function() {
		var self = this,
		el = self.defaults
		self.activateTourForm(el.$tourForm)
		self.activateImageUpload(el.$imageUpload)
		self.activateEditTour(el.$editTour)
	},
	onReady: function(e) {
		var self = this,
		el = self.defaults
		self.onInit()
	},
	activateTourForm: function(trigger) {
		trigger.submit(function(e) {
			e.preventDefault();
			let formUrl = $(this).attr('action');
			let formMethod = $(this).attr('method');
			let redirectUrl = $(this).attr('data-redirect');
			let formData = new FormData(this);

			$.ajax({
				type: formMethod,
				url: formUrl,
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				dataType:'json',
			}).done( resultData => {
				Swal.fire({
					type: resultData.type,
					title: resultData.messages
				}).then((result) => {
					if(result.value && resultData.type == 'success') {
						location.href = redirectUrl;
					}
				});
			});
		});
	},
	activateImageUpload: function(trigger) {
		trigger.change(function (e) {
			e.preventDefault();
			var reader = new FileReader();
			let imageFile = $(this);
			if(imageFile) {
				reader.onload = readerEvent => {
					$('[data-render="image"]').attr('src', readerEvent.target.result);
				}
				reader.readAsDataURL(imageFile[0].files[0]);
			}

		});
	},
	activateTableAction: function(e) {
		let buttonValue = $(e).attr('data-button');
		let htmlValue = $(e).closest('tr');
		let tableBody = $(e).closest('tbody');
		if(buttonValue == 'add') {
			tableBody.append($('.appendCloner').find('tbody').html());
		} else {
			if(tableBody.find('tr').length > 1) {
				htmlValue.remove();
			}
		}
	},
	activateEditTour: function(trigger) {	
		trigger.click(function (e) {
			e.preventDefault();
			let url = $(this).attr('data-url');
			$.ajax({
				url: url,
				type: "GET"
			}).done(result => {
				let parsedResult = JSON.parse(result);
				console.log(parsedResult);
				$('#tourFormModal').modal('toggle');
				let cloner = $('.appendCloner').find('tbody').html();
				let tableBody = $('[data-table="form"]').find('tbody');
				tableBody.html('');

				$.each(parsedResult, function (k,v) {
					let inputCheck = $('[name="'+k+'"]');
					if(k == 'description') {
						tinymce.activeEditor.setContent(v);
					} else if(k == 'meta') {
						$.each(v, function (metaK, metaV) {
							tableBody.append(cloner);
							let newTr = tableBody.find('tr').last();
							newTr.find('[name="quantity[]"]').val(metaV['quantity']);
							newTr.find('[name="price[]"]').val(metaV['price']);
							newTr.find('[name="metaId[]"]').val(metaV['id']);
						});
					}  else if(k != 'imagePath' && k != 'imagePublicPath') {
						inputCheck.val(v);
					} else if(k == 'imagePublicPath') {
						$('[data-render="image"]').prop('src',v);
					}
				});
			});
		});
	}
}

doc.ready(function(){
	tour.onReady()
})