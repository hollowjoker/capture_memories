<?php
	$ongoing = $this->ongoing;
	$done = $this->done;
?>
	<div class="row">
		<div class="col-md-6">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Ongoing</span>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-custom small dataTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Final Amount</th>
									<th>Description</th>
								</tr>
							</thead>

							<style>
							.table thead tr th {
								font-size:15px;
							}
							.table tbody tr td {
								font-size:15px;
							}
							
							
							</style>
							<tbody>
								<?php
									if(count($ongoing)):
										foreach($ongoing as $k => $v):
								?>
									<tr>
										<td><?= $v['first_name'].' '.$v['last_name']?></td>
										<td>Php. <?= number_format($v['price'] * $v['quantity'])?></td>
										<td>
											<p class="text-muted">
												<span class="text-dark"><?= $v['name'] ?></span>
												<br/>
												- <?= date('M d, Y',strtotime($v['departing_at']))." - ".date('M d, Y',strtotime($v['returning_at'])) ?>
												<br>
											</p>
										</td>
									</tr>
								<?php
										endforeach;
									endif;
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Done</span>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-custom small dataTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Final Amount</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($done)):
										foreach($done as $k => $v):
								?>
									<tr>
										<td><?= $v['first_name'].' '.$v['last_name']?></td>
										<td>Php. <?= number_format($v['price'] * $v['quantity'])?></td>
										<td>
											<p class="text-muted">
												<span class="text-dark"><?= $v['name'] ?></span>
												<br/>
												- <?= date('M d, Y',strtotime($v['departing_at']))." - ".date('M d, Y',strtotime($v['returning_at'])) ?>
												<br>
											</p>
										</td>
									</tr>
								<?php
										endforeach;
									endif;
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		initiateModule = 'user';
	</script>