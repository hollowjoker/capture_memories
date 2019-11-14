<?php
	$totalSales = $this->totalSales;
	$totalCustomers = $this->totalCustomers;
	$local = $this->totalLocalBookings;
	$international = $this->totalInternationalBookings;
?>
<div class="row">
	<div class="col-md-6">
		<div class="card card-chart">
			<div class="card-header">
				<h4 class="card-title">Total Sales</h4>
				<div class="dropdown">
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
						<a class="dropdown-item text-danger" href="#">Remove Data</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h1 class="d-flex m-0 justify-content-between">
					<span class="d-inline-block font-size-4 ml-3">
						<i class="now-ui-icons color-primary business_money-coins"></i>
					</span>
					<span class="d-inline-block">Php. <?= number_format($totalSales) ?></span>
				</h1>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-chart">
			<div class="card-header">
				<h4 class="card-title">Customers</h4>
				<div class="dropdown">
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
						<a class="dropdown-item text-danger" href="#">Remove Data</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h1 class="d-flex m-0 justify-content-between">
					<span class="d-inline-block font-size-4 ml-3">
						<i class="now-ui-icons color-primary users_single-02"></i>
					</span>
					<span class="d-inline-block mr-5"><?= number_format($totalCustomers) ?></span>
				</h1>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-chart">
			<div class="card-header">
				<h4 class="card-title">Local Bookings</h4>
			</div>
			<div class="card-body">
				<h1 class="d-flex m-0 justify-content-between">
					<span class="d-inline-block font-size-4 ml-3">
						<i class="now-ui-icons color-primary shopping_shop"></i>
					</span>
					<span class="d-inline-block mr-5"><?= number_format($local) ?></span>
				</h1>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-chart">
			<div class="card-header">
				<h4 class="card-title">International Bookings</h4>
			</div>
			<div class="card-body">
				<h1 class="d-flex m-0 justify-content-between">
					<span class="d-inline-block font-size-4 ml-3">
						<i class="now-ui-icons color-primary objects_globe"></i>
					</span>
					<span class="d-inline-block mr-5"><?= number_format($international) ?></span>
				</h1>
			</div>
		</div>
	</div>
</div>