<?php
	
?>
	<div class="row">
		<div class="col-md-12">
			<div class="card card__table">
				<div class="card-header">
					<h4 class="card-title">
						<span>User List</span>
						<button class="btn btn-info btn__circle shadow" data-toggle="modal" data-target="#userFormModal">
							<i class="now-ui-icons ui-1_simple-add"></i>
						</button>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-custom small dataTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone No.</th>
									<th>Birth Date</th>
									<th>Type</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Carla Remo</td>
									<td>mjcarlaremo@gmail.com</td>
									<!-- <td>
										<?php if(count($v['meta'])): ?>
											<?php foreach($v['meta'] as $metaK => $metaV): ?>
												<span class="badge badge-custombg badge-custombg-<?=$metaK?> badge-lg badge-pill"> 
													<?= $metaV['quantity'] ?>
													<i class="now-ui-icons users_single-02"></i>
													<?= number_format($metaV['price'],0) ?>
												</span>
											<?php endforeach;?>
										<?php endif;?>
									</td> -->
									<td>0920392932930</td>
									<td>09/11/94</td>
									<td>Admin</td>
									<td>Active</td>
									<td>
										<button type="button" class="btn btn-info btn-sm" data-action="edit_user" data-url="">
											<i class="now-ui-icons design-2_ruler-pencil"></i>
										</button>
										<button type="button" class="btn btn-danger btn-sm" data-action="delete_user" data-url="">
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

	<div class="modal fade" id="userFormModal" tabindex="-1" role="dialog" aria-labelledby="userFormModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="userFormModalLabel">Add User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" data-form="user_form" method="POST" data-redirect=""  enctype="multipart/form-data" data-main-url="<?= URL ?>">
						<input type="hidden" name="user_id" value="0">
						<div class="row">
							<div class="col-lg-12">
								<!-- <div class="form-group">
									<input type="hidden" class="form-control" name="id" placeholder="id" value="0">
									<input type="text" class="form-control" name="name" placeholder="name" required>
									<div class="feedback"></div>
								</div> -->
								<div class="form-group">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control">
                                    <div class="feedback"></div>
								</div>
								<div class="form-group">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                                    <div class="feedback"></div>
								</div>
								<div class="form-group">
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                    <div class="feedback"></div>
								</div>
								<div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone No." class="form-control">
                                    <div class="feedback"></div>
								</div>
								<div class="form-group">
                                    <input type="text" name="birth_date" placeholder="Birth Date" class="form-control">
                                    <div class="feedback"></div>
                                </div>
                                <div class="form-group">
                                    <select name="type" id="" class="custom-select">
                                        <option value="">user</option>
                                        <option value="">admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="status" id="" class="custom-select">
                                        <option value="">active</option>
                                        <option value="">inactive</option>
                                    </select>
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

	<script>
		initiateModule = 'user';
	</script>