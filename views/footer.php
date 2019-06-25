

		<footer>
			
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
						<form action="<?= URL.'register'?>" data-form="sign_up_form" method="POST" data-redirect="#">
							<div class="form-group">
								<input type="email" id="email" class="form-control" name="email" placeholder="Email">
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="text" id="firstName" class="form-control" name="firstName" placeholder="First Name">
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="text" id="lastName" class="form-control" name="lastName" placeholder="Last Name">
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="password" id="password" class="form-control" name="password" placeholder="Create a Password">
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="text" id="phone" class="form-control" name="phone" placeholder="Phone No.">
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<label for="">Birthday</label>
								<p class="small">To sign up, you must be 18 or older. Other people won’t see your birthday.</p>
								<div class="row">
									<div class="col">
										<select name="month" id="month" class="form-control" >
											<option disabled selected>Month</option>
											<?php foreach(Controller::getMonths() as $k => $v) : ?>
												<option value="<?= $v['number'] ?>"><?= $v['name'] ?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="col">
										<select name="day" id="day" class="form-control">
											<option disabled selected>Day</option>
											<?php for($i=1; $i<=31; $i++) : ?>
												<option value="<?= $i?>"><?= $i?></option>
											<?php endfor;?>
										</select>
									</div>
									<div class="col">
										<select name="year" id="year" class="form-control">
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
							Already have an account? <a href="" class="text-decoration-none">Log in</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<script src="<?= URL ?>public/js/jquery.min.js"></script>
		<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<!-- <script src="https://kit.fontawesome.com/725d374b4a.js"></script> -->
		<script>
			var doc = $(document)
			var main = {}

			main = {

				defaults: {
					$signUpForm: $('[data-form="sign_up_form"]')
				},
				onInit: function() {
					var self = this,
					el = self.defaults
					self.activateSignUpForm(el.$signUpForm)
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
				}
			}

			doc.ready(function(){
				main.onReady()
			})
		</script>
	</body>
</html>