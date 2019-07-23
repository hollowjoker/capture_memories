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
    
                    <form action="" class="mt-5 d-flex justify-content-between">
                        <div class="" style="width: 250px;">
                            <div class="form-group">
                                <select id="" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex align-self-center">
                            pagination
                        </div>
                    </form>

                    <table class="table">
                        <tbody>
                            <?php if(count($convo)): ?>
                                <?php foreach($convo as $k => $v): ?>
                                    <tr>
                                        <td>
                                            <div><img src="<?= URL."public/images/captured_memories_new.png" ?>" class="img-fluid img-radius img-border-muticolor" alt="Profile"></div>
                                        </td>
                                        <td>
                                            <?= $userId == $v['user_id'] ? "me" : "CMTT TEAM" ?><br>
                                            <?= count($v['message'])  ? date('M d', strtotime($v['message'][0]['created_at'])) : '' ?>
                                        </td>
                                        <td>
                                            <a href="<?= URL.'message/convo'?>">
                                                <?= (count($v['message']) ? substr($v['message'][0]['description'], 0, 100) : "")."<br/>".$v['destination_name']." (".date('M d, Y',strtotime($v['departing_at']))." - ".date('M d, Y',strtotime($v['returning_at'])).")"?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold <?= (($v['status'] == "pending" ? "text-custom-success" : ($v['status'] == "declined" ? "text-warning" : "text-success")))?>">
                                                <?= strtoupper($v['status']) ?>    
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>