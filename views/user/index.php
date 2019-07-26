<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="card profile-card">
					<div class="card-body">
						<div class="avatar-holder">
							<div class="avatar">
								SE
							</div>
						</div>
						<div class="profile-content border-top">
							<div class="d-flex align-items-center">
								<i class="fas fa-certificate w-50px icon-gradient font-size-2"></i>
								<span>Verified</span>
							</div>
							<hr>
							<ul>
								<li><span class="font-weight-bold">Sam Esquejo</span></li>
								<li><i class="far fa-paper-plane"></i> sam@oqulo.com</li>
								<li><i class="fas fa-mobile"></i> +6392123</li>
								<li><i class="fas fa-birthday-cake"></i> September 7 1992	</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7 offset-lg-1">
				<h5 class="font-weight-light font-style-normal">Joined in 2019</h5>
				<div class="py-4 d-flex align-items-center">
					<span class="display-4 text-muted "><i class="fas fa-quote-left"></i></span>
					<span class="px-3">about my self</span>
				</div>
				<div class="border-top border-bottom py-4">
					<i class="fas fa-home w-30px"></i> Lives in Mandaluyong City
				</div>
				<div class="py-2">
					<button class="btn btn-custom-success-outlined" data-action="editProfile">Edit Profile</button>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="userFormModal" tabindex="-1" role="dialog" aria-labelledby="userFormModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userFormModalLabel">Edit Profile</h5>
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
						<textarea name="address" id="" class="form-control" placeholder="Address"></textarea>
					</div>
					<div class="form-group">
						<textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-custom-success btn-block">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>