<?php 
    $tour = $this->tour;
    $guestPrice = 0;
?>
<section>
    <div class="container">
        <?php foreach($tour as $k => $v): ?>
            <div class="row">
                <div class="col-lg-12">
                <div class="mt-5 mb-4">
                <h2 
                    data-start-date="<?= date('m/d/Y',strtotime($v['travel_period_from_at']))?>" 
                    data-end-date="<?= date('m/d/Y', strtotime($v['travel_period_to_at']))?>"
                >
                    International: <?= $v['destination_name']?>
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <img class="img-fluid" src="<?= $v['image_public_path'] ?>" alt="<?= $v['name']?>">
                    <div class="mt-4 international-text">
                        <div class="mt-5">
                            <h2><?= $v['name'] ?></h2>
                        </div>
                        <?= $v['description'] ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="main_holder">
                        <form class="tourInner_holder" action="<?= URL."tour/bookingStore"?>" id="booking_form" method="POST">
                            <span>&#8369;</span>
                            <span class="price-content">
                                <?= number_format($guestPrice)?>
                            </span> 
                            <span class="small">per person</span>
                            <div class="form-row pt-3">
                                <div class="col">
                                    <h6>DEPARTING ON</h6>
                                    <input type="text" name="departingAt" class="form-control datepicker" autocomplete="off" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="col">
                                    <h6>RETURNING ON</h6>
                                    <input type="text" name="returnningAt" class="form-control datepicker" autocomplete="off" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <H6>Pick No. of Guest</H6>
                                <input type="hidden" name="metaId" class="form-control" placeholder="Guest" value="">
                                <?php foreach($v['meta'] as $metaK => $metaV): ?>
                                    <button 
                                        class="btn btn-custom-success-outlined btn-sm <?= $metaK == 0 ? 'active' : ''?> mb-1" 
                                        data-guest-pick="quantity" 
                                        data-meta-id="<?= $metaV['id'] ?>" 
                                        data-guest-quantity="<?= $metaV['quantity']?>"
                                        type="button"
                                    >
                                        <?= $metaV['quantity'] ?> <i class="far fa-user"></i>
                                        <span>&#8369;</span>
                                        <span data-check="price"><?= number_format($metaV['price']); ?></span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label>Guest Details</label>
                                <table class="table table-borderless table-sm" id="guest_table">
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="submit-btn">
                                <button class="btn btn-custom-success btn-block">RESERVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div hidden data-companion>
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" class="form-control" name="companionName[]" placeholder="Full Name">
                </td>
                <td>
                    <input type="text" class="form-control" name="age[]" placeholder="Age">
                </td>
            </tr>
        </tbody>
    </table>
</div>