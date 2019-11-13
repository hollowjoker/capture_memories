<?php 
    $tour = $this->tour;
    $type = $this->type;
    $guestPrice = 0;
    $referenceNo = $this->referenceNo;
?>
<section class="mb-5">
    <div class="container">
        <?php foreach($tour as $k => $v): ?>
            <div class="row">
                <div class="col-lg-12">
                <div class="mt-5 mb-4">
                <h2 
                    data-start-date="<?= date('m/d/Y') >= date('m/d/Y', strtotime($v['travel_period_from_at'])) ? date('m/d/Y') : date('m/d/Y', strtotime($v['travel_period_from_at']))?>" 
                    data-end-date="<?= date('m/d/Y', strtotime($v['travel_period_to_at']))?>"
                >
                    <?= $type ?>: <?= $v['destination_name']?>
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
                        <form class="tourInner_holder" action="<?= URL."tour/bookingStore"?>" id="booking_form" method="POST" redirect-url="<?= URL.'message/?type=tour'?>">
                            <span>&#8369;</span>
                            <span class="price-content">
                                <?= number_format($guestPrice)?>
                            </span> 
                            <span class="small">per person</span>
                            <div class="form-row pt-3">
                                <div class="col-6">
                                    <label>DEPARTING ON</label>
                                    <input type="text" name="departingAt" class="form-control datepicker" autocomplete="off" placeholder="MM/DD/YYYY" data-tour-checker="departing" data-tour-checker-url="<?= URL."tour/tourChecker"?>">
                                </div>
                                <div class="col-6">
                                    <label>RETURNING ON</label>
                                    <input type="text" name="returningAt" class="form-control datepicker" autocomplete="off" placeholder="MM/DD/YYYY" data-tour-checker="returning">
                                </div>
                                <div class="col mt-2">
                                    <h5><span class="badge badge-pill badge-info" data-checker-receiver="tour" data-count-limit=""></span></h5>
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <label>Pick No. of Guest</label>
                                <input type="hidden" name="metaId" class="form-control" value="">
                                <input type="hidden" name="quantity" class="form-control" value="">
                                <input type="hidden" name="packageName" class="form-control" value="<?= $v['name']?>">
                                <input type="hidden" name="referenceNo" class="form-control" value="<?= $referenceNo?>">
                                <input type="hidden" name="amount" class="form-control" value="">
                                <div>
                                    <?php foreach($v['meta'] as $metaK => $metaV): ?>
                                        <button 
                                            class="btn btn-custom-success-outlined btn-sm <?= $metaK == 0 ? 'active' : ''?> mb-1" 
                                            data-guest-pick="quantity" 
                                            data-meta-id="<?= $metaV['id'] ?>" 
                                            data-guest-quantity="<?= $metaV['quantity']?>"
                                            data-unformed-price="<?= $metaV['price']?>"
                                            type="button"
                                        >
                                            <?= $metaV['quantity'] ?> <i class="far fa-user"></i>
                                            <span>&#8369;</span>
                                            <span data-check="price"><?= number_format($metaV['price']); ?></span>
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Guest Details</label>
                                <table class="table table-borderless table-sm" id="guest_table">
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="card p-3 bg-dark text-white small">
                                    <span>
                                        Hello! We look forward to your reservation. Let us know if there is anything
                                        we can help you with. See you soon!
                                    </span>
                                    <div class="mt-2 pt-2">
                                        <img src="<?= URL."public/images/captured_memories_new.png" ?>" alt="" class="img-radius img-radius-bordered img-radius-custom-thumbnail img-fluid mr-2">
                                        <span class="text-muted">CMTT TEAM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label for="description">Share a few details about your plans to help them prepare for your tour.</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Write your message here">Hi please see my reservation thanks!</textarea>
                            </div>
                            <div class="submit-btn">
                                <button class="btn btn-custom-success btn-block" type="button" data-checkout="proceed" hidden>
                                    Proceed
                                </button>
                            </div>
                            <hr>
                            <div class="form-group" data-invoice="false" hidden>
                                <h3>Invoice</h3>
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        Reference No.: <span class="weight-600" data-detail="referenceNo">TR-ASDM213ASD</span>
                                    </div>
                                    <div class="col-12 mb-1">
                                        Package Name: <span class="weight-600" data-detail="packageName">BATANES TRIP</span>
                                    </div>
                                    <div class="col-6 mb-1">Departing on: <span class="weight-600" data-detail="departingAt">11/09/2019</span></div>
                                    <div class="col-6 mb-1">Returning on: <span class="weight-600" data-detail="returningAt">11/09/2019</span></div>
                                    <div class="col-12 mb-1">No. of Guest: <span class="weight-600" data-detail="quantity">3</span></div>
                                    <div class="col-12 mb-1">
                                        Guest Details:
                                        <table class="table table-borderless table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Age</th>
                                                </tr>
                                                <tbody data-detail="guest-row">
                                                    
                                                </tbody>
                                            </thead>
                                        </table>
                                        <hr>
                                    </div>
                                    <div class="col-6 mb-1 font-size-15">
                                        Total Amount:
                                    </div>
                                    <div class="col-6 mb-1 font-size-15">
                                        Php.<span class="weight-600" data-detail="amount">0</span>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($userSession['id'])):?>
                                <div class="submit-btn" hidden>
                                    <button class="btn btn-custom-success btn-block">RESERVE</button>
                                </div>
                            <?php else: ?>
                                <div class="card p-3 small bg-warning">
                                    <span> Please <a href="#" data-toggle="modal" data-target="#loginModal">Login</a> or <a href="#" data-toggle="modal" data-target="#signUpModal">Register</a> if you want to reserve this Tour</span>
                                </div>
                            <?php endif;?>
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
                    <input type="number" class="form-control" name="age[]" placeholder="Age" onkeyup="return tour.triggerNumberValidate(event)">
                </td>
            </tr>
        </tbody>
    </table>
</div>