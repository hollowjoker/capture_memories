<?php
	$tours = $this->tours;
    $international = $this->international;
?>
<section class="my-5">
    <div class="container-xl">
        <?php if(count($tours)): ?>
            <h4>Domestic Tours and Packages</h4>
            <h5 class="">Available Packages recommended for you</h5>
            <div class="row mt-5 marginNegLR">
                <?php foreach($tours as $k => $v): ?>
                    <div class="col-lg-3 custom-card paddingLR">
                        <div class="card">
                            <a href="">
                                <img src="<?= $v['image_public_path'] ?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-sub-title"><?= strtoupper($v['destination_name']) ?></h5>
                                <h5 class="card-title-all"><?= $v['name'] ?></h5>
                                <h6 class="card-sub-all">
                                    <?php
                                        $i = 0;
                                        foreach($v['meta'] as $key_meta => $value_meta):
                                            if($i < 1):
                                    ?>
                                                &#8369; <?= number_format($value_meta['price']) ?>/person
                                    <?php
                                                $i++;
                                            endif;
                                        endforeach;
                                    ?>
                                </h6>
                                <?php 
                                    $i = 0;
                                    foreach($v['meta'] as $key_meta => $value_meta):
                                ?>
                                        <span class="badge badge-custombg badge-custombg-<?=$i?> badge-pill mb-1"> 
                                            <?= $value_meta['quantity'] ?>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <?= $value_meta['price']?>
                                        </span>
                                <?php 
                                    $i++;
                                    endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
				<?php endforeach;?>
            </div>
        <?php endif; ?>
        <?php if(count($international)): ?>
            <div class="mt-5">
                <h4>International Tours and Packages</h4>
                <h5 class="">Available Packages recommended for you</h5>
            </div>
            <div class="row mt-4 marginNegLR">
                <?php foreach($international as $key_international => $value_international): ?>
                    <div class="col-lg-2 col-md-4 paddingLR">
                        <a href="<?= URL.'tour/international?id='.$value_international['id']?>">
                            <div class="card">
                                <div class="overlay-gradient card-img-bottom"></div>
                                <div class="card-img card-img-top card-img-bottom" alt="Card image" style="background-image: url('<?= $value_international['image_public_path'] ?>') ">
                                    <div class="card-content">
                                        <div>
                                            <?= $value_international['destination_name'] ?>
                                        </div>	
                                        <div>
                                            <?php foreach($value_international['meta'] as $key_meta => $value_meta): ?>
                                                Php <?= number_format($value_meta['price']) ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif; ?>
    </div>
</section>