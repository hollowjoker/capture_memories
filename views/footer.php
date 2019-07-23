

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
								<li>Home</li>
								<li>Services</li>
							</ul>
						</div>
						<div class="convo-section">
							 <ul class="footer-menu">
								<li>Facebook</li>
								<li>Instagram</li>
								<li>Twitter</li>
								<li>Google+</li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-lg-3 convo-section">
						<h4>Discover</h4>
						<ul>
							<li>Trust & Safety</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
						</ul>
					</div>
					<div class="col-lg-3 convo-section">
						<h4>Hosting</h4>
						<ul>
							<li>Trust & Safety</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
						</ul>
					</div>
					<div class="col-lg-3 convo-section">
						<h4>Social Media</h4>
						<ul>
							<li>Trust & Safety</li>
							<li>Invite Friends</li>
							<li>Invite Friends</li>
						</ul>
					</div> -->
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
								<input type="text" id="phone" class="form-control" name="phone" placeholder="Phone No." required>
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
								<button class="btn btn-info btn-block">
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
								<button class="btn btn-info btn-block">
									Log in
								</button>
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
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script> -->
		<!-- <script src="https://kit.fontawesome.com/725d374b4a.js"></script> -->
		<script>
		// var scene = document.getElementById('scene');
		// var parallaxInstance = new Parallax(scene);
			var doc = $(document)
			var main = {}

			main = {

				defaults: {
					$signUpForm: $('[data-form="sign_up_form"]'),
					$loginForm: $('[data-form="login_form"]'),
					$pickQuest: $('[data-action="pickGuest"]'),
					$pickerMinus: $('[data-picker="minus"]'),
					$pickerPlus: $('[data-picker="plus"]')
				},
				onInit: function() {
					var self = this,
					el = self.defaults
					self.activateSignUpForm(el.$signUpForm)
					self.activateLoginForm(el.$loginForm)
					self.activatePickQuest(el.$pickQuest)
					self.activatePickerMinus(el.$pickerMinus)
					self.activatePickerPlus(el.$pickerPlus)
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
									location.href = redirectUrl;
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
									location.href = redirectUrl;
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
				activatePickQuest: function(trigger) {
					trigger.click(function (e) {
						$(this).closest('.guest_main').find('.main_holder__pickGuest').toggleClass('d-block-important');
					});
				},
				activatePickerMinus: function(trigger) {
					trigger.click(function (e) {
						console.log(1);
					});
				},
				activatePickerPlus: function(trigger) {
					trigger.click(function (e) {
						console.log(1);
					});
				}
			}

			doc.ready(function(){
				main.onReady()
			})
		</script>
		<script>
			$('.datepicker').datepicker({
				uiLibrary: 'bootstrap4',
				format: 'yyyy-mm-dd',
				startDate: '-3d'
			});
			tinymce.init({
				selector: '.tinymce',
				height: 500
			});
			$('.dataTable').DataTable();
		</script>
		<script src="<?= URL.'public/js/'.$module.'.js'?>"></script>
	</body>
</html>