<?php
	$place = $this->placeData;
	$tour = $this->tourData;
?>
	<div class="row">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>Tour List</span>
						<button class="btn btn-info btn__circle shadow" data-toggle="modal" data-target="#tourFormModal">
							<i class="now-ui-icons ui-1_simple-add"></i>
						</button>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-custom small dataTable">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>Type</th>
									<th>Amounts</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($tour)): ?>
									<?php foreach($tour as $k => $v): ?>
										<tr>
											<td>
												<img src="<?= $v['image_public_path']?>" alt="" class="fw-100">
											</td>
											<td><?= $v['tour_name']?></td>
											<td><?= $v['type']?></td>
											<td>
												<?php if(count($v['meta'])): ?>
													<?php foreach($v['meta'] as $metaK => $metaV): ?>
														<span class="badge badge-custombg badge-custombg-<?=$metaK?> badge-lg badge-pill"> 
															<?= $metaV['quantity'] ?>
															<i class="now-ui-icons users_single-02"></i>
															<?= number_format($metaV['price'],0) ?>
														</span>
													<?php endforeach;?>
												<?php endif;?>
											</td>
											<td><span class="<?= $v['status'] == 'active' ? 'text-success' : 'text-danger'?>"><?= $v['status'] ?></span></td>
											<td>
												<button type="button" class="btn btn-info btn-sm" data-action="edit_tour" data-url="<?= URL.'tour/update?id='.$v['id']?>">
													<i class="now-ui-icons design-2_ruler-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger btn-sm" data-action="delete_tour" data-url="<?= URL.'tour/delete?id='.$v['id']?>">
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

	<div class="modal fade" id="tourFormModal" tabindex="-1" role="dialog" aria-labelledby="tourFormModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tourFormModalLabel">Add Tour</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= URL.'tour/store'?>" data-form="tour_form" method="POST" data-redirect="<?= URL.'tour'?>"  enctype="multipart/form-data" data-main-url="<?= URL ?>">
						<input type="hidden" name="tour_id" value="0">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<input type="hidden" class="form-control" name="id" placeholder="id" value="0">
									<input type="text" class="form-control" name="name" placeholder="name" required>
									<div class="feedback"></div>
								</div>
								<div class="form-group">
									<select name="placeId" id="placeId" class="custom-select" required>
										<option disabled selected value="">Destination</option>
										<?php if(count($place)): ?>
											<?php foreach($place as $k => $v): ?>
												<option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
											<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<input type="text" class="form-control datepicker" autocomplete="off" name="travelPeriodFromAt" placeholder="Travel Period From" required>
											<div class="feedback"></div>
										</div>
										<div class="col">
											<input type="text" class="form-control datepicker" autocomplete="off" name="travelPeriodToAt" placeholder="Travel Period To" required>
											<div class="feedback"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" autocomplete="off" name="sellingPeriod" placeholder="Selling Period (ex. August 20 2019)">
											<div class="feedback"></div>
										</div>
										<div class="col">
											<input type="text" class="form-control" autocomplete="off" name="tourLimit" placeholder="Tour Limit" onkeypress="return tour.triggerNumberValidate(event)" >
											<div class="feedback"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<img src="<?= MAIN_URL.'public/images/placeholder-600x400.png'?>" class="img-fluid shadow" alt="" data-render="image">
									<input type="file" name="imagePath" class="form-control" data-file="image_upload" required>
								</div>
								<div class="form-group">
									<table class="table small table-custom" data-table="form">
										<thead>
											<tr>
												<th></th>
												<th>No. of Person</th>
												<th>Price</th>
												<th>Status</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<button type="button" class="btn btn-info btn-sm" data-button="add" onclick="tour.activateTableAction(this)">
														<i class="now-ui-icons ui-1_simple-add"></i>
													</button>
												</td>
												<td>
													<input type="hidden" name="metaId[]" class="form-control" placeholder="metaId" value="0">
													<input type="text" name="quantity[]" required  class="form-control" placeholder="quantity" required onkeypress="return tour.triggerNumberValidate(event)">
												</td>
												<td>
													<input type="text" name="price[]" required  class="form-control" placeholder="price" required onkeypress="return tour.triggerNumberValidate(event)">
												</td>
												<td>
												<div class="onoffswitch">
													<input type="checkbox" name="metaStatus[]" class="onoffswitch-checkbox" id="metaStatus" checked>
													<label class="onoffswitch-label" for="metaStatus">
														<span class="onoffswitch-inner"></span>
														<span class="onoffswitch-switch"></span>
													</label>
												</div>
												</td>
												<td class="text-right">
													<button type="button" class="btn btn-danger btn-sm" data-button="delete" onclick="tour.activateTableAction(this)">
														<i class="now-ui-icons ui-1_simple-delete"></i>
													</button>
												</td>
											</tr>
										</tbody>
									</table>
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
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<textarea name="description" id="description" class="form-control tinymce textarea-custom"></textarea>
								</div>
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

	<div class="appendCloner" hidden>
		<table>
			<tbody>
				<tr>
					<td>
						<button type="button" class="btn btn-info btn-sm" data-button="add" onclick="tour.activateTableAction(this)">
							<i class="now-ui-icons ui-1_simple-add"></i>
						</button>
					</td>
					<td>
						<input type="hidden" name="metaId[]" class="form-control" placeholder="metaId" value="0">
						<input type="text" name="quantity[]" class="form-control" placeholder="quantity" required onkeypress="return tour.triggerNumberValidate(event)">
					</td>
					<td>
						<input type="text" name="price[]" class="form-control" placeholder="price" required onkeypress="return tour.triggerNumberValidate(event)">
					</td>
					<td>
					<div class="onoffswitch">
						<input type="checkbox" name="metaStatus[]" class="onoffswitch-checkbox" id="metaStatus" checked>
						<label class="onoffswitch-label" for="metaStatus">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
					</td>
					<td class="text-right">
						<button type="button" class="btn btn-danger btn-sm" data-button="delete" onclick="tour.activateTableAction(this)">
							<i class="now-ui-icons ui-1_simple-delete"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<script>
		initiateModule = 'tour';
	</script>