<?php
	$user = Session::getSession('user');
?>
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="card profile-card">
					<div class="card-body">
						<div class="avatar-holder">
							<div class="avatar">
								<?= substr($user['first_name'], 0, 1).substr($user['last_name'], 0, 1)?>
							</div>
						</div>
						<div class="profile-content border-top">
							<div class="d-flex align-items-center">
								<i class="fas fa-certificate w-50px icon-gradient font-size-2"></i>
								<span>Verified</span>
							</div>
							<hr>
							<ul>
								<li><span class="font-weight-bold"><?= $user['first_name']." ".$user['last_name']?></span></li>
								<li><i class="far fa-paper-plane"></i> <?= $user['email']?></li>
								<li><i class="fas fa-mobile"></i> <?= $user['phone']?></li>
								<li><i class="fas fa-birthday-cake"></i> <?= date('F d, Y', strtotime($user['birth_date'])) ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7 offset-lg-1">
				<h5 class="font-weight-light font-style-normal">Joined in <?= date('Y', strtotime($user['created_at']))?></h5>
				<div class="py-4 <?= $user['about'] != "" && $user['about'] ? "d-flex" : "d-none"?> align-items-center">
					<span class="display-4 text-muted "><i class="fas fa-quote-left"></i></span>
					<span class="px-3"><?= $user['about'] ?></span>
				</div>
				<div class="border-top border-bottom py-4">
					<?php if($user['address'] && $user['address'] != ""): ?>
						<i class="fas fa-home w-30px"></i> <?= $user['address'] ?>
					<?php else: ?>
						Please complete your info. Thank you!
					<?php endif;?>
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
				<form action="<?= URL.'user/update'?>" data-form="edit_user_form" method="POST" data-redirect="<?= URL.'user/profile'?>">
					<input type="hidden" name="id" value="<?= $user['id'] ?>">
					<div class="form-group">
						<input type="text" class="form-control" name="firstName" placeholder="First Name" required value="<?= $user['first_name']?>">
						<div class="feedback"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="lastName" placeholder="Last Name" required value="<?= $user['last_name']?>">
						<div class="feedback"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="phone" placeholder="Phone No." required value="<?= $user['phone']?>">
						<div class="feedback"></div>
					</div>
					<div class="form-group">
						<label for="">Birthday</label>
						<div class="row">
							<div class="col">
								<select name="month" class="form-control" required>
									<option disabled selected>Month</option>
									<?php foreach(Controller::getMonths() as $k => $v) : ?>
										<option value="<?= $v['number'] ?>" <?= date('m',strtotime($user['birth_date'])) == $v['number'] ? 'selected' : '' ?> ><?= $v['name'] ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="col">
								<select name="day" class="form-control" required>
									<option disabled selected>Day</option>
									<?php for($i=1; $i<=31; $i++) : ?>
										<option value="<?= $i?>" <?= date('d',strtotime($user['birth_date'])) == $i ? 'selected' : '' ?> ><?= $i?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="col">
								<select name="year" class="form-control" required>
									<option disabled selected>Year</option>
									<?php $year = date('Y');?>
									<?php for($i=100; $i>=0; $i--) : ?>
										<option value="<?= $year?>" <?= date('Y',strtotime($user['birth_date'])) == $year ? 'selected' : '' ?> ><?= $year?></option>
										<?php $year-- ?>
									<?php endfor;?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<textarea name="address" class="form-control" placeholder="Address"><?=$user['address']?></textarea>
					</div>
					<hr>
					<div class="form-group">
						<label for="">Tell us about yourself</label>
						<textarea name="about" class="form-control" placeholder="About"><?=$user['about']?></textarea>
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