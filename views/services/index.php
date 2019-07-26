<?php
	$services = $this->services;
?>

<section class="bg-custom-gradient py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 ">
				<h1 class="text-white display-2">Our Services</h1>
				<h5 class="text-white weight-100">How this was processed..</h5>
			</div>
		</div>
	</div>
</section>
<section class="py-5" relocate-tour="<?= URL.'tour'?>">
	<div class="container">
		<div class="row">
			<?php foreach($services as $k => $v): ?>
				<div class="col-lg-4">
					<div class="service-holder my-5">
						<h1 class="display-3 mb-4"><i class="<?= $v['icon']?> icon-gradient"></i></h1>
						<h3 data-title="main"><?= $v['main_title'] ?></h3>
						<div>
							<hr>
						</div>
						<ul class="service-list">
							<?php foreach($v['content'] as $contentK => $contentV): ?>
								<li>
									<div class="service-list-count">
										<span><?= $contentK + 1?></span>
									</div>
									<div class="service-list-content">
										<h5><?= $contentV['title'] ?></h5>
										<?= $contentV['description'] ?>
									</div>
								</li>
							<?php endforeach;?>
						</ul>
						<button class="btn btn-custom-success btn-block" data-action="<?= $v['data-action'] ?>">
							<?= $v['data-action'] == 'tour-package' ? 'Reserve Now' : 'Inquire Now'?>
						</button>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</section>

<!--Wifi Rental Modal -->
<div class="modal fade modal-services" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Wifi Rental</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- wifi rental form -->
				<form action="" data-form="wifi-rental" hidden>
					<div class="form-group">
						<button type="button" class="btn btn-custom-success-outlined btn-sm active mb-1" data-pick="type" data-pick-filter="domestic">Domestic</button>
						<button type="button" class="btn btn-custom-success-outlined btn-sm mb-1" data-pick="type" data-pick-filter="international">International</button>
						<button type="button" class="btn btn-custom-success-outlined btn-sm mb-1" data-pick="type" data-pick-filter="other">Other</button>
					</div>
					<div class="form-group">
						<select class="custom-select" hidden data-filter="domestic">
							<option selected>Destination</option>
							<option>Baler</option>
							<option>Batanes</option>
							<option>Siargao</option>
							<option>Zambales</option>
						</select>
						<select class="custom-select" hidden data-filter="international">
							<option selected>Destination</option>
							<option>Hongkong</option>
						</select>
						<input type="text" class="form-control" hidden data-filter="other" placeholder="Destination">
					</div>
					<div class="form-group">
						<input type="text" name="passenger_name" class="form-control" placeholder="Passenger Name">
					</div>
					<div class="form-row form-group">
						<label for="" class="col-12">Dates of Travel</label>
						<div class="col">
							<input type="text" name="departingAt" class="form-control datepicker" autocomplete="off" placeholder="Departing on">
						</div>
						<div class="col">
							<input type="text" name="returningAt" class="form-control datepicker" autocomplete="off" placeholder="Return on">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="">Share a few details about your plans to help them prepare their services.</label>
						<textarea name="message" class="form-control" placeholder="Write your message here"></textarea>
					</div>
				</form>

				<!-- airline ticketing form -->
				<form action="" data-form="airline-ticketing" hidden>
					<div class="form-group">
						<button type="button" class="btn btn-custom-success-outlined btn-sm active mb-1" data-pick="type" data-pick-filter="domestic">Domestic</button>
						<button type="button" class="btn btn-custom-success-outlined btn-sm mb-1" data-pick="type" data-pick-filter="international">International</button>
					</div>
					<div class="form-row form-group">
						<label class="col-12">Passenger Details</label>
						<div class="col-10">
							<input type="text" name="name" class="form-control" placeholder="Name">
						</div>
						<div class="col-2">
							<input type="text" name="age" class="form-control" placeholder="Age">
						</div>
					</div>
					<div class="form-group">
						<label for="">Date of Birth</label>
						<div class="row">
							<div class="col">
								<select name="month" class="custom-select" required>
									<option disabled selected>Month</option>
									<?php foreach(Controller::getMonths() as $k => $v) : ?>
										<option value="<?= $v['number'] ?>"><?= $v['name'] ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="col">
								<select name="day" class="custom-select" required>
									<option disabled selected>Day</option>
									<?php for($i=1; $i<=31; $i++) : ?>
										<option value="<?= $i?>"><?= $i?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="col">
								<select name="year" class="custom-select" required>
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
					<div class="form-row form-group" data-filter="international">
						<label class="col-12">Passport Details</label>
						<div class="col-6">
							<input type="text" name="passport_number" class="form-control" placeholder="Passport No.">
						</div>
						<div class="col-6">
							<input type="text" name="expiry_date" class="form-control datepicker" placeholder="Expiry">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="">Share a few details about your plans to help them prepare their services.</label>
						<textarea name="message" class="form-control" placeholder="Write your message here"></textarea>
					</div>
				</form>

				<!-- visa processing -->
				<form action="" data-form="visa-processing" hidden>
					<div class="form-row form-group">
						<label class="col-12">Passenger Details</label>
						<div class="col-10">
							<input type="text" name="name" class="form-control" placeholder="Name">
						</div>
						<div class="col-2">
							<input type="text" name="age" class="form-control" placeholder="Age">
						</div>
					</div>
					<div class="form-row form-group">
						<label for="" class="col-12">Dates of Travel</label>
						<div class="col">
							<input type="text" name="departingAt" class="form-control datepicker" autocomplete="off" placeholder="Departing on">
						</div>
						<div class="col">
							<input type="text" name="returningAt" class="form-control datepicker" autocomplete="off" placeholder="Return on">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="">Share a few details about your plans to help them prepare their services.</label>
						<textarea name="message" class="form-control" placeholder="Write your message here"></textarea>
					</div>
				</form>

				<!-- travel insurance -->
				<form action="" data-form="travel-insurance" hidden>
					<div class="form-row form-group">
						<label class="col-12">Passenger Details</label>
						<div class="col-10">
							<input type="text" name="name" class="form-control" placeholder="Name">
						</div>
						<div class="col-2">
							<input type="text" name="age" class="form-control" placeholder="Age">
						</div>
					</div>
					<div class="form-row form-group">
						<label for="" class="col-12">Dates of Travel</label>
						<div class="col">
							<input type="text" name="departingAt" class="form-control datepicker" autocomplete="off" placeholder="Departing on">
						</div>
						<div class="col">
							<input type="text" name="returningAt" class="form-control datepicker" autocomplete="off" placeholder="Return on">
						</div>
					</div>
					<div class="form-group">
						<label for="">Date of Birth</label>
						<div class="row">
							<div class="col">
								<select name="month" class="custom-select" required>
									<option disabled selected>Month</option>
									<?php foreach(Controller::getMonths() as $k => $v) : ?>
										<option value="<?= $v['number'] ?>"><?= $v['name'] ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="col">
								<select name="day" class="custom-select" required>
									<option disabled selected>Day</option>
									<?php for($i=1; $i<=31; $i++) : ?>
										<option value="<?= $i?>"><?= $i?></option>
									<?php endfor;?>
								</select>
							</div>
							<div class="col">
								<select name="year" class="custom-select" required>
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
					<hr>
					<div class="form-group">
						<label for="">Share a few details about your plans to help them prepare their services.</label>
						<textarea name="message" class="form-control" placeholder="Write your message here"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom-success btn-block">Save changes</button>
			</div>
		</div>
	</div>
</div>