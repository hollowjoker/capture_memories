<?php 
	$about_data = $this->about_us;
?>
<!-- <section style="background-color: red; height: 100px;">
</section> -->
<section class="home-body">
	<div class="container-xl">
		<div class="row">
			<div class="col-md-8 offset-md-2 business_holder">
				<h1>Your Travel Buddy</h1>
				<div class="d-flex main_travel">
					<img src="https://scontent.fmnl15-1.fna.fbcdn.net/v/t1.0-1/p50x50/34410139_637666543243454_3182093243282096128_n.jpg?_nc_cat=105&_nc_oc=AQnMb_5xKiXG_c62H28O_ixmV7XOAvM0WQVcjG71phMQ4rG5-yq5JR1zB5kHeHOPxa8&_nc_ht=scontent.fmnl15-1.fna&oh=41ede0cfa083e02aa26586d884a02243&oe=5E49A26D" alt="">
					<div class="title_cap">
						<a href="">CAPTURED MEMORIES TRAVEL AND TOURS</a> ·
						<a href="">SUNDAY, JUNE 10, 2018</a> ·
					</div>
				</div>
				<p style="font-size: 17px; font-style: italic; padding-top: 30px;">About the Business</p>
				<?php foreach($about_data as $k => $v): ?>
					<?php foreach($v['business_content'] as $k_content => $v_content): ?>
						<p>
							<?= $v_content['description'] ?>
						</p>
					<?php endforeach;?>
				<?php endforeach;?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<?php foreach($about_data as $k_data => $v_data): ?>
					<?php foreach($v_data['business_photos'] as $k_content => $v_content): ?>
						<div class="tourPhoto_main">
							<img src="<?= $v_content['image'] ?>" class="img-fluid" alt="">
							<p><?= $v_content['caption'] ?></p>
						</div>
					<?php endforeach;?>
				<?php endforeach;?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h4 style="margin-bottom: 40px;">Captured Memories Travel and Tours</h4>
				<?php foreach($about_data as $k_owner => $v_owner): ?>
					<?php foreach($v_owner['capture_description'] as $k_owner_data => $v_owner_data): ?>
						<p style="margin-bottom: 40px;"><?= $v_owner_data['capture_content'] ?></p>
					<?php endforeach;?>
				<?php endforeach;?>
				
				<p style="font-size: 17px; font-style: italic; margin-bottom: 40px;">About the Owner</p>

				<?php foreach($about_data as $k_o => $v_o): ?>
					<?php foreach($v_o['about_owner'] as $k_owner_list => $v_owner_list): ?>
						<p style="margin-bottom: 30px;"><?= $v_owner_list['owner_content'] ?></p>
					<?php endforeach;?>
				<?php endforeach;?>
				
				<p style="margin-bottom: 30px;"><strong style="font-size: 17px;">Contact:</strong>Email: capturedmemoriestravelandtours@gmail.com</p>
				<p style="margin-bottom: 30px;">Globe: 09457855120 09457855142</p>
				<p style="margin-bottom: 30px;">Sun: 09231063343</p>
				<p style="margin-bottom: 30px;">Marian Rodriguez, CPA, MBA</p>
				<p>📷 ©️2018</p>
			</div>
		</div>
	</div>
</section>