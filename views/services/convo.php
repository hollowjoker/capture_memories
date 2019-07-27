
<?php
    $services = $this->services;
    $user = Session::getSession('user');
?>
	<div class="row convo-section">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<!-- <h4 class="card-title">
						<span>Services Detail</span>
					</h4> -->
				</div>
				<div class="card-body">
					<?php if(count($services)): ?>
						<?php foreach($services as $k => $v): ?>
							<?php
                                $airline = 'Airline Ticketing';
                                $visa = 'Visa Processing';
                                $wifi = 'Wifi Rental';
                                $travel = 'Travel Insurance';
							?>
							<div class="row">
								<div class="col-lg-5">
									<div class="package-details p-5">
										<div class="text-center">
											<h5 class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-danger" : "text-success")))?>"><?= strtoupper($v['status']) ?></h5>
											<h3 class="mt-2">
                                                <?php if($v['type'] == 'airline'): ?>
                                                    <?= $airline ?>
                                                <?php elseif($v['type'] == 'visa'): ?>
                                                    <?= $visa ?>
                                                <?php elseif($v['type'] == 'wifi'): ?>
                                                    <?= $wifi ?>
                                                <?php elseif($v['type'] == 'travel'): ?>
                                                    <?= $travel ?>
                                                <?php endif; ?>
                                            </h3>
										</div>

										<div class="mt-4">
											<div class="border-top border-bottom pt-2 mt-4">
												<ul>
													<li>
														<span class="convo-muted">Name (Contact Person)</span>
														<p><?= $v['first_name']." ".$v['last_name'] ?></p>
													</li>
												</ul>
											</div>
											<div class="mt-4">
                                                Customer Details</br></br>
                                                <ul>
                                                    <li>
                                                        <span class="convo-muted">Passenger Name</span>
                                                        <p><?= $v['passenger_name'] ?></p>
                                                    </li>
                                                    <?php if($v['type'] != 'wifi'): ?>
                                                        <li>
                                                            <span class="convo-muted">Age</span>
                                                            <p><?= $v['age'] ?></p>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if($v['type'] == 'airline' || $v['type'] == 'travel'): ?>
                                                        <li>
                                                            <span class="convo-muted">Birth Date</span>
                                                            <p><?= $v['birth_date'] ?></p>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if($v['type'] == 'airline'): ?>
                                                        <?php if($v['passport_no'] != ''): ?>
                                                            <li>
                                                                <span class="convo-muted">Passport No</span>
                                                                <p><?= $v['passport_no'] ?></p>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($v['type'] == 'airline'): ?>
                                                        <?php if($v['expiry_date'] != '0000-00-00'): ?>
                                                            <li>
                                                                <span class="convo-muted">Expiry Date</span>
                                                                <p><?= $v['expiry_date'] ?></p>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($v['type'] == 'wifi'): ?>
                                                        <li>
                                                            <span class="convo-muted">Destination</span>
                                                            <p><?= $v['destination'] ?></p>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if($v['type'] == 'wifi' || $v['type'] == 'visa'): ?>
                                                        <li>
                                                            <span class="convo-muted">Traveled from</span>
                                                            <p><?= $v['traveled_from_at'] ?></p>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if($v['type'] == 'wifi' || $v['type'] == 'visa'): ?>
                                                        <li>
                                                            <span class="convo-muted">Traveled To</span>
                                                            <p><?= $v['traveled_to_at'] ?></p>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
											</div>

										</div>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="convo-details">
										<div class="row">
											<div class="col-sm-9 col-md-9 col-lg-10">
												<form action="<?= URL.'services/messageStore'?>" method="post" id="message_form" data-redirect="<?= URL.'services/convo?id='.$_GET['id'].'&type='.$_GET['type']?>">
													<input type="hidden" name="tblServiceId" value="<?= $v['id'] ?>">
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
												<img src="/capture_memories/public/images/profile2.jpg" class="img-fluid img-radius" alt="Profile">
											</div>
										</div>
										<?php foreach($v['messages'] as $tourK => $tourV): ?>
											<?php if($tourV['tbl_receiver_id'] != $user['id']): ?>
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
														<img src="/capture_memories/public/images/profile2.jpg" class="img-fluid img-radius" alt="Profile">                                    
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
														<img src="<?= URL.'public/images/captured_memories_new.png'?>" class="img-fluid img-radius " alt="Profile">
													</div>
													<div class="col-sm-9 col-md-9 col-lg-10">
														<div class="border-1 p-3">
															<div class="mb-3">
																<?= $tourV['description']?>
															</div>
															<span class="convo-muted"><?= date('F d, Y', strtotime($tourV['created_at'])) ?></span>
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
