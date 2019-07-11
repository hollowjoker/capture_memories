<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= URL ?>public/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
		<title>Document</title>
	</head>
	<body>
		<div class="section">
			<div class="container">
				<div class="col-lg-4 offset-lg-4">
					<div class="card mt-5">
						<div class="card-body">
							<form action="<?= URL.'admin/login'?>" method="post" data-redirect="<?= URL.'dashboard'?>" data-form="login_form">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email">
									<div class="feedback"></div>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password">
									<div class="feedback"></div>
								</div>
								<div class="form-group">
									<button class="btn btn-info btn-block">
										Log in
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="<?= URL ?>public/js/jquery.min.js"></script>
	<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
	<script>
		var doc = $(document)
		var admin = {}

		admin = {

			defaults: {
				$loginForm: $('[data-form="login_form"]'),
			},
			onInit: function() {
				var self = this,
				el = self.defaults
				self.activateLoginForm(el.$loginForm)
			},
			onReady: function(e) {
				var self = this,
				el = self.defaults
				self.onInit()
			},
			activateLoginForm: function(trigger) {
				trigger.submit(function(e) {
					e.preventDefault();
					let formUrl = $(this).attr('action');
					let formMethod = $(this).attr('method');
					let redirectUrl = $(this).attr('data-redirect');
					let formData = $(this).serialize();

					$.ajax({
						url: formUrl,
						type: formMethod,
						data: formData
					}).done( returnResult => {
						let parsedResult = JSON.parse(returnResult);
						$('input').removeClass('is-invalid').closest('.form-group').find('.feedback').removeClass('invalid-feedback');
						if (parsedResult.status == 'success') {
							Swal.fire({
								type: parsedResult.status,
								title: parsedResult.messages
							}).then((result) => {
								location.href = redirectUrl;
							});
						} else {
							$.each(parsedResult.messages, function (k, v) {
								let inputName = '[name="'+k+'"]';
								$(inputName).addClass('is-invalid').closest('.form-group').find('.feedback').addClass('invalid-feedback').text(v);
							})
						}
					});
				});
			}
		}

		doc.ready(function(){
			admin.onReady()
		})
	</script>
</html>