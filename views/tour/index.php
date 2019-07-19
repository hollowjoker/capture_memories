<?php 
$tour = $this->tour;
?>
<section>
    <div class="container">
        <?php foreach($tour as $k => $v): ?>
            <div class="row">
                <div class="col-lg-12">
                <div class="mt-5 mb-4">
                <h2>International: <?= $v['destination_name']?></h2>
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
                            <h1>Book unique places to stay and things to do.</h1>
                            <div class="form-row pt-3">
                                <div class="col">
                                    <h6>DEPARTING ON</h6>
                                    <input type="text" class="form-control datepicker" autocomplete="off" placeholder="mm/dd/yyyy">
                                </div>
                                <div class="col">
                                    <h6>RETURNING ON</h6>
                                    <input type="text" class="form-control datepicker" autocomplete="off" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <H6>GUESTS</H6>
                                <input type="text" class="form-control" placeholder="Guest" data-action="pickGuest">
                                <div class="main_holder__pickGuest">
                                    <div class="pickGuest_item">
                                        <div class="pickGuest_title">
                                            Adults
                                        </div>
                                        <div>
                                            <button class="btn-transparent mr-3" data-picker="minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            1
                                            <button class="btn-transparent ml-3" data-picker="plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pickGuest_item">
                                        <div class="pickGuest_title">
                                            Children
                                        </div>
                                        <div>
                                            <button class="btn-transparent mr-3">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            1
                                            <button class="btn-transparent ml-3">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pickGuest_item">
                                        <div class="pickGuest_title">
                                            Infants
                                        </div>
                                        <div>
                                            <button class="btn-transparent mr-3">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            1
                                            <button class="btn-transparent ml-3">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4 submit-btn">
                                <button class="btn btn-custom-danger">BOOK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>