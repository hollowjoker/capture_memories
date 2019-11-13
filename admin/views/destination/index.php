
<?php
	$destination = $this->destinationData;
?>
	<div class="row">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Destination List</span>
						<button class="btn btn-info btn__circle shadow" data-toggle="modal" data-target="#destinationFormModal">
							<i class="now-ui-icons ui-1_simple-add"></i>
						</button>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-custom dataTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Type</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($destination)): ?>
									<?php foreach($destination as $k => $v): ?>
										<tr>
											<td><?= $v->name ?></td>
											<td><?= $v->type ?></td>
											<td><span class="<?= $v->status == 'active' ? 'text-success' : 'text-danger'?>"><?= $v->status ?></span></td>
											<td>
												<button type="button" class="btn btn-info btn-sm" data-action="editDestination" data-url="<?= URL.'destination/getDestination?id='.$v->id ?>">
													<i class="now-ui-icons design-2_ruler-pencil"></i>
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
	
	<div class="modal fade" id="destinationFormModal" tabindex="-1" role="dialog" aria-labelledby="destinationFormModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="destinationFormModalLabel">Add Destination</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= URL.'destination/store'?>" data-form="destination_form" method="POST" data-redirect="<?= URL.'destination'?>">
						<input type="hidden" name="id" value="0">
						<div class="form-group">
							<input type="name" class="form-control" name="name" placeholder="name">
							<div class="feedback"></div>
						</div>
						<div class="form-group">
							<select name="type" id="type" class="custom-select">
								<option>Type</option>
								<option value="domestic">Domestic</option>
								<option value="international">International</option>
							</select>
						</div>
						<div class="form-group">
							<textarea name="description" id="description" class="form-control textarea-custom" placeholder="description"></textarea>
						</div>
						<div class="form-group mt-3" hidden>
							<label for="available">Available On</label>
							<div class="row">
								<div class="col">
									<label for="" class="small">airlineStatus</label>
									<div class="onoffswitch">
										<input type="checkbox" name="airlineStatus" class="onoffswitch-checkbox" id="airlineStatus" checked>
										<label class="onoffswitch-label" for="airlineStatus">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
								<div class="col">
									<label for="" class="small">visaStatus</label>
									<div class="onoffswitch">
										<input type="checkbox" name="visaStatus" class="onoffswitch-checkbox" id="visaStatus" checked>
										<label class="onoffswitch-label" for="visaStatus">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
								<div class="col">
									<label for="" class="small">wifiStatus</label>
									<div class="onoffswitch">
										<input type="checkbox" name="wifiStatus" class="onoffswitch-checkbox" id="wifiStatus" checked>
										<label class="onoffswitch-label" for="wifiStatus">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
								<div class="col">
									<label for="" class="small">tourStatus</label>
									<div class="onoffswitch">
										<input type="checkbox" name="tourStatus" class="onoffswitch-checkbox" id="tourStatus" checked>
										<label class="onoffswitch-label" for="tourStatus">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="small">Status</label>
							<div class="onoffswitch">
								<input type="checkbox" name="status" class="onoffswitch-checkbox" id="status" checked>
								<label class="onoffswitch-label" for="status">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
						</div>
						<div class="form-group text-right">
							<button class="btn btn-info">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script>
		initiateModule = 'destination';
	</script>
