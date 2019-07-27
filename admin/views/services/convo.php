
<?php
	$services = $this->services;
?>
	<div class="row convo-section">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Reservation List (Tour)</span>
					</h4>
				</div>
				<div class="card-body">
					<?php if(count($convo)): ?>
						<?php foreach($convo as $k => $v): ?>
							<?php
								$totalPrice = number_format($v['price'] * $v['quantity']);
							?>
							<div class="row">
								<div class="col-lg-5">
									<div class="package-details p-5">
										<div class="date_sent">
											<img src="<?= $v['image_public_path'] ?>" class="img-fluid border-radius-8" alt="Profile">
										</div>
										<div class="text-center">
											<h5 class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-danger" : "text-success")))?>"><?= strtoupper($v['status']) ?></h5>
											<h3 class="mt-2">Trip Details</h3>
										</div>

										<div class="mt-4">
											<?= $v['name'] ?>
											<div class="border-top border-bottom pt-2 mt-4">
												<ul>
													<li>
														<span class="convo-muted">Check-in</span>
														<p><?= date('F d, Y',strtotime($v['departing_at'])) ?></p>
													</li>
													<li>
														<span class="convo-muted">Check-out</span>
														<p><?= date('F d, Y',strtotime($v['returning_at'])) ?></p>
													</li>
												</ul>
											</div>
											<div class="mt-4">
												<span class="convo-muted">Guest</span>
												<?php foreach($v['booking_meta'] as $metaK => $metaV): ?>
													<p class="m-0"><?= $metaV['companion_name'].", ".$metaV['age'] ?></p>
												<?php endforeach;?>
											</div>

											<div class="mt-4 border-bottom pb-2">
												<h5>Payment</h5>

												<div class="d-flex justify-content-between">
													<div>
														<span>&#8369; <?= number_format($v['price'])?> x <?= $v['quantity'] ?> Guest</span>
													</div>
													<span>&#8369; <?= $totalPrice ?></span>
												</div>
											</div>

											<div class="d-flex justify-content-between mt-2">
												<div><strong>Total</strong></div>
												<div><strong>&#8369; <?= $totalPrice?></strong></div>
											</div>

											<div class="mt-5 py-2 show-more-holder" data-holder="showMore">
												<h5>Tour Details</h5>
												<?= $v['description'] ?>
											</div>
											<div class="text-center">
												<button class="btn btn-custom-success btn-block" data-action="showMore">
													Show more
												</button>
											</div>

										</div>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="convo-details">
										<div class="row">
											<div class="col-sm-9 col-md-9 col-lg-10">
												<form action="<?= URL.'reservation/messageStore'?>" method="post" id="message_form" data-redirect="<?= URL.'reservation/convo?id='.$_GET['id']?>">
													<input type="hidden" name="tblConvoId" value="<?= $v['id'] ?>">
													<input type="hidden" name="tblReceiverId" value="<?= $v['user_id'] ?>">
													<div class="border-1 p-3 mb-3">
														<div class="mb-3">
															<textarea name="description" type="text" placeholder="Reply Here..." class="form-control custom-textarea small"></textarea>
														</div>
														<div class="img-flex-end">
															<button class="btn btn-custom-success btn-sm">Send Message</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-sm-3 col-md-3 col-lg-2">
												<img src="<?= MAIN_URL.'public/images/captured_memories_new.png'?>" class="img-fluid img-radius" alt="Profile">
											</div>
										</div>
										<?php foreach($v['messages'] as $tourK => $tourV): ?>
											<?php if($tourV['type'] == 'admin'): ?>
												<div class="row mb-3">
													<!-- <div class="col-lg-12">
														<div class="date_sent">
															SENT <?= date('m/d/Y', strtotime($tourV['created_at'])) ?>
														</div>
													</div> -->
													<div class="col-sm-9 col-md-9 col-lg-10">
														<div class="border-1 p-3 bg-light-gray">
															<div class="mb-3">
																<?= $tourV['description']?>
															</div>
															<span class="convo-muted"><?= date('F d, Y - h:i A', strtotime($tourV['created_at'])) ?></span>
														</div>
													</div>
													<div class="col-sm-3 col-md-3 col-lg-2">
														<img src="<?= MAIN_URL.'public/images/captured_memories_new.png'?>" class="img-fluid img-radius" alt="Profile">                                    
													</div>
												</div>
											<?php else: ?>
												<div class="row mb-3">
													<!-- <div class="col-lg-12">
														<div class="date_sent">
															SENT <?= date('m/d/Y', strtotime($tourV['created_at'])) ?>
														</div>
													</div> -->
													<div class="col-sm-3 col-md-3 col-lg-2 img-flex-end">
														<img src="<?= MAIN_URL.'public/images/profile2.jpg'?>" class="img-fluid img-radius " alt="Profile">
													</div>
													<div class="col-sm-9 col-md-9 col-lg-10">
														<div class="border-1 p-3">
															<div class="mb-3">
																<?= $tourV['description']?>
															</div>
															<span class="convo-muted">
																<?= date('F d, Y', strtotime($tourV['created_at'])) ?>
																<i class="fas fa-ellipsis-h"></i>
																<?= $tourV['first_name']." ".$tourV['last_name'] ?>
															</span>
														</div>
													</div>
												</div>
											<?php endif;?>
										<?php endforeach;?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>

	<script>
		initiateModule = 'reservation';
	</script>
