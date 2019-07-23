<?php
    $tourDetails = $this->tourDetails;
    $user = Session::getSession('user');
?>
<section class="convo-section my-5">
    <div class="container">
        <?php if(count($tourDetails)): ?>
            <?php foreach($tourDetails as $k => $v): ?>
                <?php
                    $totalPrice = number_format($v['price'] * $v['quantity']);
                ?>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="package-details p-5">
                            <h3>Trip Details</h3>

                            <div class="mt-4">
                                <?= $v['name'] ?>

                                <div class="border-top border-bottom pt-2 mt-4">
                                    <ul>
                                        <li>
                                            <span class="convo-muted">Check-in</span>
                                            <p><?= date('F d, Y',strtotime($v['departing_at'])) ?></p>
                                        </li>
                                        <li>
                                            <span class="convo-muted">Check-out</span>
                                            <p><?= date('F d, Y',strtotime($v['returning_at'])) ?></p>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mt-4">
                                    <span class="convo-muted">Guest</span>
                                    <?php foreach($v['booking_meta'] as $metaK => $metaV): ?>
                                        <p class="m-0"><?= $metaV['companion_name'].", ".$metaV['age'] ?></p>
                                    <?php endforeach;?>
                                </div>

                                <div class="mt-4 border-bottom pb-2">
                                    <h5>Payment</h5>

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span>&#8369; <?= number_format($v['price'])?> x <?= $v['quantity'] ?> Guest</span>
                                        </div>
                                        <span>&#8369; <?= $totalPrice ?></span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div><strong>Total</strong></div>
                                    <div><strong>&#8369; <?= $totalPrice?></strong></div>
                                </div>

                                <div class="mt-5 py-2 show-more-holder" data-holder="showMore">
                                    <h5>Tour Details</h5>
                                    <?= $v['description'] ?>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-custom-success btn-block" data-action="showMore">
                                        Show more
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="convo-details">
                            <?php foreach($v['messages'] as $tourK => $tourV): ?>
                                <?php if($tourV['tbl_receiver_id'] != $user['id']): ?>
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <div class="date_sent">
                                                SENT <?= date('m/d/Y', strtotime($tourV['created_at'])) ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <div class="border-1 p-3">
                                                <div class="mb-3">
                                                    <?= $tourV['description']?>
                                                </div>
                                                <span class="convo-muted"><?= date('F d, Y', strtotime($tourV['created_at'])) ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-2">
                                            <img src="/capture_memories/public/images/profile2.jpg" class="img-fluid img-radius" alt="Profile">
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <div class="date_sent">
                                                SENT <?= date('m/d/Y', strtotime($tourV['created_at'])) ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-2">
                                            <img src="/capture_memories/public/images/profile1.jpg" class="img-fluid img-radius" alt="Profile">
                                        </div>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <div class="border-1 p-3">
                                                <div class="mb-3">
                                                    <?= $tourV['description']?>
                                                </div>
                                                <span class="convo-muted"><?= date('F d, Y', strtotime($tourV['created_at'])) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
</section>