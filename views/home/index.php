<?php 
	$tours = $this->tours;
	$international = $this->international;
	$toursRecent = $this->toursRecent;
	$internationalRecent = $this->internationalRecent;
?>
<section class="header pb-5">
	<div class="overlay"></div>
	<div class="container-xl">
		<div class="row">
			<div class="col-lg-4 col-md-3">
				<form action="<?= URL.'tour'?>" type="get">
					<div class="main_holder">
						<div class="inner_holder">
							<h1>Book unique places to stay and things to do.</h1>
							<div class="pt-3">
								<label>WHERE</label>
								<div class="form-group">
									<input type="text" name="search" class="form-control" placeholder="Anywhere">
								</div>
							</div>
							<div class="form-row" hidden>
								<div class="col">
									<label>DEPARTING ON</label>
									<input type="text" class="form-control datepicker" autocomplete="off" placeholder="mm/dd/yyyy" data-start-date="<?= date('m/d/Y')?>">
								</div>
								<div class="col">
									<label>RETURNING ON</label>
									<input type="text" class="form-control datepicker" autocomplete="off" placeholder="mm/dd/yyyy">
								</div>
							</div>
							<div class="form-group guest_main pt-3" hidden>
								<label>GUESTS</label>
								<input type="text" class="form-control" placeholder="Guest count" data-action="pickGuest" readonly value="1">
								<div class="main_holder__pickGuest">
									<div class="pickGuest_item">
										<div class="pickGuest_title">
											Persons
										</div>
										<div>
											<button class="btn-transparent mr-3" type="button" data-picker="minus">
												<i class="fa fa-minus"></i>
											</button>
											<span data-count="guest">1</span>
											<button class="btn-transparent ml-3" type="button" data-picker="plus">
												<i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="pt-4 submit-btn">
								<button class="btn btn-custom-success btn-block">SEARCH</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-8">
				<div class="row header-card-holder marginNegLR">
					<div class="col-12">
						<h4 class="text-light">Tours and Packages <span>(Local)</span></h4>
					</div>
					<?php if(count($toursRecent)): ?>
						<?php foreach($toursRecent as $k => $v): ?>
							<div class="col-lg-4 custom-card paddingLR header-custom-card">
								<div class="card">
									<a href="<?= URL.'tour/domestic?id='.$v['id']?>">
										<img src="<?= $v['image_public_path'] ?>" class="card-img-top" alt="...">
									</a>
									<div class="card-body px-2">
										<h5 class="card-sub-title"><?= strtoupper($v['destination_name']) ?></h5>
										<h5 class="card-title"><?= $v['name'] ?></h5>
										<h5 class="card-price-holder">
											<?php foreach($v['meta'] as $key_meta => $value_meta): ?>
												<span class="formater">Starting at Php <?= number_format($value_meta['price']) ?></span>
											<?php endforeach; ?>
										</h5>
									</div>
								</div>
							</div>
						<?php endforeach;?>
					<?php endif ?>
				</div>
				<div class="row mt-5 marginNegLR">
					<div class="col-12">
						<h4 class="text-light">Tours and Packages <span>(International)</span></h4>
					</div>
					<?php if(count($internationalRecent)): ?>
						<?php foreach($internationalRecent as $key_international => $value_international): ?>
							<div class="col-lg-4 paddingLR">
								<a href="<?= URL.'tour/international?id='.$value_international['id']?>">
									<div class="card">
										<div class="overlay-gradient card-img-bottom"></div>
										<div class="header-card-img card-img card-img-top card-img-bottom" alt="Card image" style="background-image: url('<?= $value_international['image_public_path'] ?>') ">
											<div class="card-content pt-4">
												<div>
													<?= $value_international['destination_name'] ?>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach;?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="home-body">
	<div class="container-xl">
		<h4>Tours and Packages <span class="text-muted">(Local)</span></h4>
		<h5 class="">Available Packages recommended for you</h5>
		<div class="row mt-4 marginNegLR">
			<?php if(count($tours)): ?>
				<?php foreach($tours as $k => $v): ?>
					<div class="col-lg-3 custom-card paddingLR">
						<div class="card">
							<a href="<?= URL.'tour/domestic?id='.$v['id']?>">
								<img src="<?= $v['image_public_path'] ?>" class="card-img-top" alt="...">
							</a>
							<div class="card-body">
								<h5 class="card-sub-title"><?= strtoupper($v['destination_name']) ?></h5>
								<h5 class="card-title"><?= $v['name'] ?></h5>
								<h5 class="card-price-holder">
									<?php foreach($v['meta'] as $key_meta => $value_meta): ?>
										<span class="formater">Starting at Php <?= number_format($value_meta['price']) ?></span>
									<?php endforeach; ?>
								</h5>
								<p class="card-text">
									<span class="badge"> </span>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			<?php endif ?>
		</div>
		<div class="row mt-1">
			<div class="col-lg-12">
				<a href="<?= URL.'tour/?type=domestic'?>" class="text-custom-success text-decoration-none">Show all Tour Packages <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>

		<div class="mt-5">
			<h4>Tours and Packages <span class="text-muted">(International)</span></h4>
			<h5 class="">Available Packages recommended for you</h5>
		</div>
		<div class="row mt-4 marginNegLR">
			<?php if(count($international)): ?>
				<?php foreach($international as $key_international => $value_international): ?>
					<div class="col-lg-2 col-md-4 paddingLR">
						<a href="<?= URL.'tour/international?id='.$value_international['id']?>">
							<div class="card">
								<div class="overlay-gradient card-img-bottom"></div>
								<div class="card-img card-img-top card-img-bottom" alt="Card image" style="background-image: url('<?= $value_international['image_public_path'] ?>') ">
									<div class="card-content pt-4">
										<div>
											<?= $value_international['destination_name'] ?>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach;?>
			<?php endif ?>
		</div>
		<div class="row mt-5">
			<div class="col-lg-12">
				<a href="<?= URL.'tour/?type=international'?>" class="text-custom-success text-decoration-none">Show all Tour Packages <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
</section>