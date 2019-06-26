<?php 
	$tours = $this->tours;
?>
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
	</div>
</section>