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
					<div class="service-holder">
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
						<button data-action="<?= $v['data-action'] ?>" data-toggle="modal" data-target="#WifiRental">Inquire Now</button>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</section>

<!--Wifi Rental Modal -->
<div class="modal fade" id="WifiRental" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>