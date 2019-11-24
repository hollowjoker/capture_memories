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
                            <div class="date_sent">
                                <img src="<?= $v['image_public_path'] ?>" class="img-fluid border-radius-8" alt="Profile">
                            </div>
                            <div class="text-center">
                                <h5 class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-danger" : "text-success")))?>"><?= strtoupper($v['status']) ?></h5>
                                <h3 class="mt-2">Trip Details</h3>
                                <span class="mt-2 badge-warning badge badge-pill font-size-08" <?= $v['status'] != "pending" ? 'hidden' : ''?>>
                                    <?php
                                        $dateDown = date('F d, Y H:i A', strtotime('+'.$v['downpayment_duration'].' hours', strtotime($v['created_at'])));
                                    ?>
                                    Due <?=  $dateDown ?>
                                </span>
                            </div>

                            <div class="mt-4">
                                Transaction No.: <span class="mt-2 weight-600"><?= $v['transaction_no'] ?></span>
                                <br/>
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
                                        <p class="m-0"><?= $metaV['companion_name'].", ".date('F d, Y', strtotime($metaV['birth_date'])) ?></p>
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
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-10">
                                    <form action="<?= URL.'message/store'?>" method="post" id="message_form" data-redirect="<?= URL.'message/convo?id='.$_GET['id']?>" enctype="multipart/form-data">
                                        <input type="hidden" name="tblConvoId" value="<?= $v['id'] ?>">
                                        <div class="border-1 p-3 mb-3">
                                            <div class="mb-3">
                                                <textarea name="description" type="text" placeholder="Reply Here..." class="form-control custom-textarea small"></textarea>
                                            </div>
                                            <div class="img-flex-end">
                                                <div class="col mt-2">
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                                <button type="button" class="btn btn-custom-success btn-sm" data-upload-button="true" hidden><i class="fa fa-rocket"></i></button>
                                                <button class="btn btn-custom-success btn-sm ml-1">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-2">
                                    <img src="/capture_memories/public/images/profile2.jpg" class="img-fluid img-radius" alt="Profile">
                                </div>
                            </div>
                            <?php foreach($v['messages'] as $tourK => $tourV): ?>
                                <?php if($tourV['tbl_receiver_id'] != $user['id']): ?>
                                    <div class="row mb-3">
                                        <!-- <div class="col-lg-12">
                                            <div class="date_sent">
                                                SENT <?= date('m/d/Y', strtotime($tourV['created_at'])) ?>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <div class="border-1 p-3 bg-light-gray">
                                                <div class="mb-3">
                                                    <?php if(strpos($tourV['description'],'images/files') !== false) :?>
                                                        <img src="<?= $tourV['description']?>" alt="" class="img-fluid">
                                                    <?php else:?>
                                                        <?= $tourV['description'] ?>
                                                    <?php endif;?>
                                                </div>
                                                <span class="convo-muted"><?= date('F d, Y - h:i A', strtotime($tourV['created_at'])) ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-2">
                                            <img src="/capture_memories/public/images/profile2.jpg" class="img-fluid img-radius" alt="Profile">                                    
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row mb-3">
                                        <!-- <div class="col-lg-12">
                                            <div class="date_sent">
                                                SENT <?= date('m/d/Y', strtotime($tourV['created_at'])) ?>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-3 col-md-3 col-lg-2 img-flex-end">
                                            <img src="<?= URL.'public/images/captured_memories_new.png'?>" class="img-fluid img-radius " alt="Profile">
                                        </div>
                                        <div class="col-sm-9 col-md-9 col-lg-10">
                                            <div class="border-1 p-3">
                                                <div class="mb-3">
                                                    <?php if(strpos($tourV['description'],'images/files') !== false) :?>
                                                        <img src="<?= $tourV['description']?>" alt="" class="img-fluid">
                                                    <?php else:?>
                                                        <?= $tourV['description'] ?>
                                                    <?php endif;?>
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