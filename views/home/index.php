<?php 
	$tours = $this->tours;
	$international = $this->international;
	// echo '<pre>';
	// print_r($international);
	// exit;
?>
<section class="header">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-6">
				<div class="main_holder">
					<div class="inner_holder">
						<h1>Book unique places to stay and things to do.</h1>
						<div class="pt-3">
							<h6>WHERE</h6>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Anywhere">
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<h6>DEPARTING ON</h6>
								<input type="text" class="form-control datepicker" autocomplete="off" placeholder="mm/dd/yyyy">
							</div>
							<div class="col">
								<h6>RETURNING ON</h6>
								<input type="text" class="form-control datepicker" autocomplete="off" placeholder="mm/dd/yyyy">
							</div>
						</div>
						<div class="form-group guest_main pt-3">
							<H6>GUESTS</H6>
							<input type="text" class="form-control" placeholder="Guest" data-action="pickGuest">
							<div class="main_holder__pickGuest">
								<div class="pickGuest_item">
									<div class="pickGuest_title">
										Persons
									</div>
									<div>
										<button class="btn-transparent mr-3" data-picker="minus">
											<i class="fa fa-minus"></i>
										</button>
										1
										<button class="btn-transparent ml-3" data-picker="plus">
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
			</div>
		</div>
	</div>
</section>
<section class="py-4">
	<div class="container-xl">
		<h4>Tours and Packages <span class="text-muted">(Local)</span></h4>
		<h5 class="">Available Packages recommended for you</h5>
		<div class="row mt-4 marginNegLR">
			<?php if(count($tours)): ?>
				<?php foreach($tours as $k => $v): ?>
					<div class="col-lg-3 custom-card paddingLR">
						<div class="card">
							<a href="<?= URL.'tour?id='.$v['id']?>">
								<img src="<?= $v['image_path'] ?>" class="card-img-top" alt="...">
							</a>
							<div class="card-body">
								<h5 class="card-sub-title"><?= strtoupper($v['place']) ?></h5>
								<h5 class="card-title"><?= $v['name'] ?></h5>
								<h5 class="card-price-holder">
									<span class="formater">Php <?= number_format($v['price']) ?></span>
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
				<a href="" class="text-secondary text-decoration-none">Show all Tour Packages <i class="fa fa-chevron-right"></i></a>
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
									<div class="card-content">
										<div>
											<?= $value_international['destination_name'] ?>
										</div>	
										<div>
											<?php foreach($value_international['meta'] as $key_meta => $value_meta): ?>
												Php <?= number_format($value_meta['price']) ?>
											<?php endforeach; ?>
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
				<a href="" class="text-secondary text-decoration-none">Show all Tour Packages <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
</section>