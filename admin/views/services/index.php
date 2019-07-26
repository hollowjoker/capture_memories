
<?php
	
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
					<div class="table-responsive">
						<table class="table table-custom small dataTable table-vertical-top">
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
								<tr class="">
									<td>sdsdsd</td>
									<td>
										<a href="<?= URL.'services/convo'?>" class="default-text-color">hello</a>
									</td>
									<td>
										3D2N HONG KONG PACKAGE via HONG KONG AIRLINES w/
										<p class="text-muted">
											- Jul 19, 2019 - Jul 21, 2019	
											<br>
											- Hongkong	
											<br>
											- international
										</p>
									</td>
									<td>
										<span class="font-weight-bold">
											PENDING
										</span>
									</td>
									<td>
										<span class="clearfix">10:13 PM</span>
										<span class="clearfix text-muted">
											Jul 25, 2019
										</span>
									</td>
									<td>
										<button type="button" class="btn btn-success btn-sm" data-action="approved_reservation" data-url="">
											<i class="now-ui-icons"></i>
										</button>
										<button type="button" class="btn btn-warning btn-sm" data-action="declined_tour" data-url="">
											<i class="now-ui-icons"></i>
										</button>
										<button type="button" class="btn btn-danger btn-sm" data-action="delete_tour" data-url="">
											<i class="now-ui-icons ui-1_simple-delete"></i>
										</button>
									</td>
								</tr>
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
