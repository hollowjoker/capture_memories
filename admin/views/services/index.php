
<?php
	$services = $this->services;
?>
	<div class="row">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Services List</span>
					</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="<?= URL.'services?type=airline'?>" class="nav-link <?= $_GET['type'] == 'airline' ? 'active' : ''?>">Airline Ticketing</a>
						</li>
						<li class="nav-item">
							<a href="<?= URL.'services?type=travel'?>" class="nav-link <?= $_GET['type'] == 'travel' ? 'active' : ''?>">Travel Insurance</a>
						</li>
						<li class="nav-item">
							<a href="<?= URL.'services?type=visa'?>" class="nav-link <?= $_GET['type'] == 'visa' ? 'active' : ''?>">Visa Processing</a>
						</li>
						<li class="nav-item">
							<a href="<?= URL.'services?type=wifi'?>" class="nav-link <?= $_GET['type'] == 'wifi' ? 'active' : ''?>">Wifi Rental</a>
						</li>
					</ul>
					<div class="table-responsive">
						<table class="table table-custom small dataTable table-vertical-top">
							<thead>
								<tr>
									<th>Name</th>
									<th>Message</th>
									<th>Details</th>
									<th>Status</th>
									<th>Received</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($services)): ?>
									<?php foreach($services as $k => $v): ?>
										<tr class="<?= $v['status'] == 'unread' ? 'font-weight-bold' : '' ?>">
											<td><?= $v['first_name']." ".$v['last_name']?></td>
											<td>
												<a href="<?= URL.'reservation/convo?id='.$v['id'] ?>" class="default-text-color"><?= (count($v['message']) ? substr($v['message'][0]['description'], 0, 60)."..." : "") ?></a>
											</td>
											<td>
												<p class="text-muted">
													<span class="clearfix">
														<?= isset($v['traveled_from_at']) ? "- ".date('M d, Y',strtotime($v['traveled_from_at']))." - ".date('M d, Y',strtotime($v['traveled_to_at'])) : '' ?>
													</span>
													<span class="clearfix">
														<?= isset($v['destination']) ? "- ".$v['destination'] : "" ?>
													</span>
													<span class="clearfix">
														<?= isset($v['sub_type']) ? "- ".ucfirst($v['sub_type']) : "" ?>
													</span>
												</p>
											</td>
											<td>
												<span class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-warning" : "text-success")))?>">
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
												<button type="button" class="btn btn-success btn-sm" data-action="approved_reservation" data-url="">
													<i class="now-ui-icons ui-2_like"></i>
												</button>
												<button type="button" class="btn btn-warning btn-sm" data-action="declined_tour" data-url="">
													<i class="now-ui-icons ui-1_simple-remove"></i>
												</button>
												<button type="button" class="btn btn-danger btn-sm" data-action="delete_tour" data-url="">
													<i class="now-ui-icons ui-1_simple-delete"></i>
												</button>
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
		initiateModule = 'services';
	</script>
