<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
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
								<button class="btn btn-custom-success btn-block">
									Sign up
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>