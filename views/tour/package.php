<?php 
    $tour = $this->tour;
    $type = $this->type;
    $guestPrice = 0;
?>
<section class="mb-5">
    <div class="container">
        <?php foreach($tour as $k => $v): ?>
            <div class="row">
                <div class="col-lg-12">
                <div class="mt-5 mb-4">
                <h2 
                    data-start-date="<?= date('m/d/Y',strtotime($v['travel_period_from_at']))?>" 
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
                                <div class="col">
                                    <label>DEPARTING ON</label>
                                    <input type="text" name="departingAt" class="form-control datepicker" autocomplete="off" placeholder="MM/DD/YYYY">
                                </div>
                                <div class="col">
                                    <label>RETURNING ON</label>
                                    <input type="text" name="returningAt" class="form-control datepicker" autocomplete="off" placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <label>Pick No. of Guest</label>
                                <input type="hidden" name="metaId" class="form-control" placeholder="Guest" value="">
                                <div>
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
                            <div class="form-group">
                                <label for="description">Share a few details about your plans to help them prepare for your tour.</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Write your message here"></textarea>
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