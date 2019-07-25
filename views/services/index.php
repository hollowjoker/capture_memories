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
<section class="py-5">
	<div class="container">
		<div class="row">
			<?php foreach($services as $k => $v): ?>
				<div class="col-lg-4">
					<div class="service-holder my-5">
						<h1 class="display-3 mb-4"><i class="<?= $v['icon']?> icon-gradient"></i></h1>
						<h3><?= $v['main_title'] ?></h3>
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
						<button class="btn btn-custom-success btn-block" data-action="<?= $v['data-action'] ?>" data-toggle="modal" data-target="#WifiRental">Inquire Now</button>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</section>

<!--Wifi Rental Modal -->
<div class="modal fade modal-services" id="WifiRental" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Wifi Rental</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mt-3">
				<form action="">
					<div>
						<button class="btn btn-custom-success-outlined btn-sm active mb-1" data-pick="type">Domestic</button>
						<button class="btn btn-custom-success-outlined btn-sm mb-1" data-pick="type">International</button>
						
						<div class="input-hidden mt-3">
							<select class="form-control">
								<option selected>Destination</option>
								<option>Baler</option>
								<option>Batanes</option>
								<option>Siargao</option>
								<option>Zambales</option>
							</select>
							<input type="text" name="other" class="form-control mt-3" placeholder="Other">
						</div>
					</div>
					<input type="text" name="passenger_name" class="form-control" placeholder="Name">
					<input type="text" name="travel_from" class="form-control" placeholder="Travel Form">
					<input type="text" name="travel_To" class="form-control" placeholder="Travel To">
					<textarea name="message" class="form-control" placeholder="Tell us what you need"></textarea>
				</form>
			</div>
			<div class="modal-footer mt-4">
				<button type="button" class="btn btn-custom-success btn-block">Save changes</button>
			</div>
		</div>
	</div>
</div>