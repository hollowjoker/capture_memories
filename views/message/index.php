<?php
    $convo = $this->convo;
    $userId = Session::getSession('user')['id'];
?>
<section class="message_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-5">
                    <h1>Messages</h1>
<!--     
                    <form action="" class="mt-5 d-flex justify-content-between">
                        <div class="" style="width: 250px;">
                            <div class="form-group">
                                <select class="custom-select" data-redirect="<?= URL.'message/?type='?>" data-action="serviceInbox">
                                    <option value="airline" <?= isset($_GET['type']) && $_GET['type'] == 'airline' ? 'selected' : '' ?>>Airline Ticketing</option>
                                    <option value="travel" <?= isset($_GET['type']) && $_GET['type'] == 'travel' ? 'selected' : '' ?>>Travel Insurance</option>
                                    <option value="tour" <?= isset($_GET['type']) && $_GET['type'] == 'tour' ? 'selected' : '' ?>>Tour and Packages</option>
                                    <option value="wifi" <?= isset($_GET['type']) && $_GET['type'] == 'wifi' ? 'selected' : '' ?>>Wifi Rental</option>
                                    <option value="visa" <?= isset($_GET['type']) && $_GET['type'] == 'visa' ? 'selected' : '' ?>>Visa Processing</option>
                                </select>
                            </div>
                        </div>
                    </form> -->

                    <table class="table vertical-align-center">
                        <tbody>
                            <?php if(count($convo) && (isset($_GET['type']) && $_GET['type'] == 'tour')): ?>
                                <?php foreach($convo as $k => $v): ?>
                                    <tr>
                                        <td>
                                            <div><a href="<?= URL.'message/convo?id='.$v['id'] ?>"><img src="<?= $v['image_public_path'] ?>" class="img-fluid img-non-radius img-border-muticolor" alt="Profile"></a></div>
                                        </td>
                                        <td>
                                            <span class="mb-1 d-block font-size-09">
                                                <?= $userId == $v['message'][0]['tbl_sender_id'] ? "ME" : "CMTT TEAM" ?><br>
                                            </span>
                                            <?= count($v['message'])  ? date('M d', strtotime($v['message'][0]['created_at'])) : '' ?>
                                        </td>
                                        <td>
                                            <a href="<?= URL.'message/convo?id='.$v['id'] ?>">
                                                <span class="mb-1 d-block font-size-09"><?= (count($v['message']) ? substr($v['message'][0]['description'], 0, 100) : "") ?></span>
                                                <span class="text-muted"><?= $v['destination_name']." (".date('M d, Y',strtotime($v['departing_at']))." - ".date('M d, Y',strtotime($v['returning_at'])).")"?></span>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-warning" : "text-success")))?>">
                                                <?= strtoupper($v['status']) ?>    
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php elseif(count($convo) && (isset($_GET['type']) && $_GET['type'] != 'tour')): ?>
                                <?php foreach($convo as $k => $v): ?>
                                    <tr>
                                        <td>
                                            <div class="calendar">
                                                <?php if(count($v['message'])): ?>
                                                    <span class="month clearfix"><?= date('M', strtotime($v['message'][0]['created_at'])) ?></span>
                                                    <span class="day"><?= date('d', strtotime($v['message'][0]['created_at'])) ?></span>
                                                <?php endif;?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($userId == $v['message'][0]['tbl_sender_id']): ?>
                                                <span class="header-avatar font-size-08">
                                                    <?= substr($userSession['first_name'], 0, 1).substr($userSession['last_name'], 0, 1)?>
                                                </span>
                                            <?php else: ?>
                                                <span class="header-avatar avatar-admin font-size-08">
                                                    CM
                                                </span>
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <a href="<?= URL.'services/convo?id='.$v['id'].'&type='.$v['type'] ?>">
                                                <span class="mb-1 d-block font-size-09"><?= (count($v['message']) ? substr($v['message'][0]['description'], 0, 100) : "") ?></span>
                                                <span class="text-muted">
                                                    <?= isset($v['destination']) ? $v['destination'] : "" ?>
                                                    <?php if(isset($v['traveled_from_at'])): ?>
                                                        <?= " (".date('M d, Y',strtotime($v['traveled_from_at']))." - ".date('M d, Y',strtotime($v['traveled_to_at'])).")"?>
                                                    <?php endif;?>
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold <?= (($v['status'] == "pending" ? "text-warning" : ($v['status'] == "declined" ? "text-warning" : "text-success")))?>">
                                                <?= strtoupper($v['status']) ?>    
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <td>You don't have any Reservations yet.</td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>