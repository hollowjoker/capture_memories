

		<footer>
			<div class="container-fluid">
				<div class="border-top"></div>
				<div class="row footer-holder">
					<div class="col-lg-3">
						<div class="footer-icon">
							<img src="/capture_memories/public/images/tour/captured_memories_new.png" class="img-fluid" alt="logo" width="120px;">
						</div>
					</div>
					<div class="col-lg-6 footer_menu__holder">
						<div class="convo-section">
							<ul class="footer-menu">
								<li><a href="http://localhost:8888/capture_memories/">Home</a></li>
								<!-- <li><a href="http://localhost:8888/capture_memories/services">Services</a></li> -->
							</ul>
						</div>
						<div class="convo-section">
							 <ul class="footer-menu mb-0">
								<li><a href="https://www.facebook.com/">Facebook</a></li>
								<li><a href="https://www.instagram.com/">Instagram</a></li>
								<li><a href="https://twitter.com/">Twitter</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 footer_menu__holder">
						<div class="footer-copyright">
							© Capture Memories – 2019 (All Rights Reserved)
						</div>
					</div>
				</div>
			</div> 
		</footer>
		<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="signUpModalLabel">Sign up</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= URL.'user/register'?>" data-form="sign_up_form" method="POST" data-redirect="<?= URL?>">
							<div class="form-group">
								<input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="text" id="firstName" class="form-control" name="firstName" placeholder="First Name" required>
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="text" id`="lastName" class="form-control" name="lastName" placeholder="Last Name" required>
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="password" id="password" class="form-control" name="password" placeholder="Create a Password" required>
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="text" maxlength="11" id="phone" class="form-control" name="phone" placeholder="Phone No." required onkeypress="return main.triggerNumberValidate(event)">
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<label for="">Birthday</label>
								<p class="small">To sign up, you must be 18 or older. Other people won’t see your birthday.</p>
								<div class="row">
									<div class="col">
										<select name="month" id="month" class="form-control" required>
											<option disabled selected>Month</option>
											<?php foreach(Controller::getMonths() as $k => $v) : ?>
												<option value="<?= $v['number'] ?>"><?= $v['name'] ?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="col">
										<select name="day" id="day" class="form-control" required>
											<option disabled selected>Day</option>
											<?php for($i=1; $i<=31; $i++) : ?>
												<option value="<?= $i?>"><?= $i?></option>
											<?php endfor;?>
										</select>
									</div>
									<div class="col">
										<select name="year" id="year" class="form-control" required>
											<option disabled selected>Year</option>
											<?php $year = date('Y');?>
											<?php for($i=100; $i>=0; $i--) : ?>
												<option value="<?= $year?>"><?= $year?></option>
												<?php $year-- ?>
											<?php endfor;?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-custom-success btn-block">
									Sign up
								</button>
							</div>
						</form>
						<p>
							Already have an account? <a href="" data-dismiss="modal"  data-toggle="modal" data-target="#loginModal" class="text-decoration-none">Log in</a>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="loginModalLabel">Log in</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= URL.'user/login'?>" data-form="login_form" method="POST" data-redirect="<?= URL?>">
							<div class="form-group">
								<input type="email" id="login_email" class="form-control" name="email" placeholder="Email" required>
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="password" id="login_password" class="form-control" name="password" placeholder="Password" required>
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<button class="btn btn-custom-success btn-block">
									Log in
								</button>
							</div>
							<div class="form-group">
								<a href="<?= URL.'home/reset_password' ?>">Forgot password</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="<?= URL ?>public/js/jquery.min.js"></script>
		<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
		<script src="https://cdn.tiny.cloud/1/eu5dzjii9t7855b8emqmu9rcklczoyr2ivtkmvj9712vbs33/tinymce/5/tinymce.min.js"></script>
		<?php $module = $module != "" ? $module : "home"?>
		<script src="<?= URL.'public/js/'.$module.'.js'?>"></script>
		<script>
			var doc = $(document)
			var main = {}

			main = {

				defaults: {
					$signUpForm: $('[data-form="sign_up_form"]'),
					$loginForm: $('[data-form="login_form"]')
				},
				onInit: function() {
					var self = this,
					el = self.defaults
					self.activateSignUpForm(el.$signUpForm)
					self.activateLoginForm(el.$loginForm)
				},
				onReady: function(e) {
					var self = this,
					el = self.defaults
					self.onInit()
				},
				activateSignUpForm: function(trigger) {
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
							let parsedData = JSON.parse(returnResult);
							$('input').removeClass('is-invalid').closest('.form-group').find('.feedback').removeClass('invalid-feedback');
							if (parsedData.status == 'success') {
								Swal.fire({
									type: parsedData.status,
									title: parsedData.messages
								}).then((result) => {
									location.href = location.href;
								});
							} else {
								$.each(parsedData.messages, function (k, v) {
									let inputName = '[name="'+k+'"]';
									$(inputName).addClass('is-invalid').closest('.form-group').find('.feedback').addClass('invalid-feedback').text(v);
								})
							}
						});
					})
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
							let parsedData = JSON.parse(returnResult);
							$('input').removeClass('is-invalid').closest('.form-group').find('.feedback').removeClass('invalid-feedback');
							if (parsedData.status == 'success') {
								Swal.fire({
									type: parsedData.status,
									title: parsedData.messages
								}).then((result) => {
									location.href = location.href;
								});
							} else {
								$.each(parsedData.messages, function (k, v) {
									let inputName = '[name="'+k+'"]';
									$(inputName).addClass('is-invalid').closest('.form-group').find('.feedback').addClass('invalid-feedback').text(v);
								})
							}
						});
					});
				},
				triggerNumberValidate: function (evt) {
					var charCode = (evt.which) ? evt.which : event.keyCode
					if (charCode > 31 && (charCode < 48 || charCode > 57))
						return false;

					return true;
				}
			}

			doc.ready(function(){
				main.onReady()
			})

			$(document).on('show.bs.modal', '.modal', function () {
				var zIndex = 1040 + (10 * $('.modal:visible').length);
				$(this).css('z-index', zIndex);
				setTimeout(function() {
					$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
				}, 0);
			});
			$(document).on('hidden.bs.modal', '.modal', function () {
				$('.modal:visible').length && $(document.body).addClass('modal-open');
			});
		</script>
	</body>
</html>