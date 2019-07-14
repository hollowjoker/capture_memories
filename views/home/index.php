<?php 
	$tours = $this->tours;
	$international = $this->international;
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
								<input type="text" class="form-control" placeholder="First name">
							</div>
							<div class="col">
								<h6>RETURNING ON</h6>
								<input type="text" class="form-control" placeholder="Last name">
							</div>
						</div>
						<div class="form-group pt-3">
							<H6>GUESTS</H6>
							<select id="inputState" class="form-control">
								<option selected>Choose...</option>
								<option>...</option>
							</select>
						</div>
						<div class="pt-4">
							<button class="btn btn-danger">SUBMIT</button>
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
		<div class="row mt-4">
			<?php if(count($tours)): ?>
				<?php foreach($tours as $k => $v): ?>
					<div class="col-lg-3 custom-card">
						<div class="card">
							<a href="<?= URL.'tour?id='.$v['id']?>">
								<img src="<?= $v['image_path'] ?>" class="card-img-top" alt="...">
							</a>
							<div class="card-body">
								<h5 class="card-sub-title"><?= strtoupper($v['place']) ?></h5>
								<h5 class="card-title"><?= $v['name'] ?></h5>
								<h5 class="card-price-holder">
									<span class="formater">Php. <?= number_format($v['price']) ?></span>
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
		<div class="row mt-4">
			<?php if(count($international)): ?>
				<?php foreach($international as $key_international => $value_international): ?>
					<div class="col-lg col-md-6 col-sm-12">
						<a href="<?= URL.'tour/international?id='.$value_international['id']?>">
							<div class="card">
								<div class="overlay"></div>
								<div class="card-img" alt="Card image">
									<div class="card-content">
										<div>
											<?= $value_international['title'] ?>
										</div>	
										<div>
											<?= $value_international['package'] ?>
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