<?php 
$tour = $this->tour;

?>
<section>
    <div class="container">
        <?php foreach($tour as $k => $v): ?>
            <div class="row">
                <div class="col-lg-12">
                <div class="mt-5 mb-4">
                <h2 
                    data-start-date="<?= $v['travel_period_from_at']?>" 
                    data-end-date="<?= $v['travel_period_to_at']?>"
                    data-guest-count="3"
                    data-guest-user="1"
                >
                    International: <?= $v['destination_name']?>
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <img class="img-fluid" src="<?= $v['image_public_path'] ?>" alt="Bali">
                    <div class="mt-4 international-text">
                        <div class="mt-5">
                            <h2><?= $v['name'] ?></h2>
                        </div>
                        <?= $v['description'] ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="main_holder">
                        <div class="tourInner_holder">
                            <span class="price-content"><span>&#8369;</span>9000</span> <span class="small">per person</span>
                            <div class="form-row pt-3">
                                <div class="col">
                                    <h6>DEPARTING ON</h6>
                                    <input type="text" class="form-control datepicker" autocomplete="off" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="col">
                                    <h6>RETURNING ON</h6>
                                    <input type="text" class="form-control datepicker" autocomplete="off" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group guest_main pt-3">
                                <H6>GUESTS</H6>
                                <input type="text" class="form-control guest-count-picker" placeholder="Guest" data-action="pickGuest" value="1 Guest" data-count-guest="1" readonly>
                                <div class="main_holder__pickGuest">
                                    <div class="pickGuest_item">
                                        <div class="pickGuest_title">
                                            Adults
                                        </div>
                                        <div>
                                            <button class="btn-transparent mr-3" data-picker="minus" data-guest-counter="adult">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <span data-count="guest">1</span>
                                            <button class="btn-transparent ml-3" data-picker="plus" data-guest-counter="adult">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pickGuest_item">
                                        <div class="pickGuest_title">
                                            Children
                                        </div>
                                        <div>
                                            <button class="btn-transparent mr-3" data-picker="minus" data-guest-counter="children">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <span data-count="guest">0</span>
                                            <button class="btn-transparent ml-3" data-picker="plus" data-guest-counter="children">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pickGuest_item">
                                        <div class="pickGuest_title">
                                            Infant
                                        </div>
                                        <div>
                                            <button class="btn-transparent mr-3" data-picker="minus" data-guest-counter="infant">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <span data-count="infant">0</span>
                                            <button class="btn-transparent ml-3" data-picker="plus" data-guest-counter="infant">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pickGuest_item">
                                        <span>Infant is not included on guest count</span>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-btn">
                                <button class="btn btn-custom-success btn-block">RESERVE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>