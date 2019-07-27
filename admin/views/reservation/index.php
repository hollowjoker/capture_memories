
<?php
	$convo = $this->convo;
?>
	<div class="row">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Reservation List (Tour)</span>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-custom small dataTable table-vertical-top" data-redirect="<?= URL.'reservation'?>">
							<thead>
								<tr>
									<th>Name</th>
									<th>Message</th>
									<th>Package Reserve</th>
									<th>Status</th>
									<th>Received</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($convo)): ?>
									<?php foreach($convo as $k => $v): ?>
										<tr class="<?= $v['convo_status'] == 'unread' ? 'font-weight-bold' : '' ?>">
											<td><?= $v['first_name']." ".$v['last_name']?></td>
											<td>
												<a href="<?= URL.'reservation/convo?id='.$v['id'] ?>" class="default-text-color"><?= (count($v['message']) ? substr($v['message'][0]['description'], 0, 60)."..." : "") ?></a>
											</td>
											<td>
												<?= $v['tour_name']?>
												<p class="text-muted">
													- <?= date('M d, Y',strtotime($v['departing_at']))." - ".date('M d, Y',strtotime($v['returning_at'])) ?>
													<br>
													- <?= $v['destination_name'] ?>
													<br>
													- <?= $v['type'] ?>
												</p>
											</td>
											<td>
												<span class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-danger" : "text-success")))?>">
													<?= strtoupper($v['status']) ?>    
												</span>
											</td>
											<td>
												<span class="clearfix"><?= date('h:i A',strtotime($v['updated_at'])) ?></span>
												<span class="clearfix text-muted">
													<?= date('Y-m-d') == date('Y-m-d', strtotime($v['updated_at'])) ? "Now" : date('M d, Y',strtotime($v['updated_at'])) ?>
												</span>
											</td>
											<td>
												<button type="button" class="btn btn-success btn-sm" data-action="update_status" data-status="approve" data-url="<?= URL.'reservation/update?id='.$v['booking_id'].'&status=approved' ?>">
													<i class="now-ui-icons ui-2_like"></i>
												</button>
												<button type="button" class="btn btn-warning btn-sm" data-action="update_status" data-status="decline" data-url="<?= URL.'reservation/update?id='.$v['booking_id'].'&status=declined' ?>">
													<i class="now-ui-icons ui-1_simple-remove"></i>
												</button>
												<!-- <button type="button" class="btn btn-danger btn-sm" data-action="update_status" data-url="">
													<i class="now-ui-icons ui-1_simple-delete"></i>
												</button> -->
											</td>
										</tr>
									<?php endforeach;?>
								<?php endif;?>
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		initiateModule = 'reservation';
	</script>
