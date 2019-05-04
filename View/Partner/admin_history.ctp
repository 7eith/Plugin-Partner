<?php
/* **************************************************************************** *
 *
 * admin_history.ctp
 *
 * by: Snkh <dev@snkh.me>
 *
 * Created: 04/05/2019 10:54 by Snkh
 * Under private Copyright, all rights reserved to Snkh.
 *
 **************************************************************************** */
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get('PARTNER__ADMIN_HISTORY_TITLE') ?></h3>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th><?= $Lang->get('GLOBAL__AUTHOR') ?></th>
                                <th><?= $Lang->get('PARTNER__SUBS_COUNT') ?></th>
                                <th><?= $Lang->get('PARTNER__ADMIN_RESPONSE') ?></th>
                                <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                                <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($partnerRequests)) { ?>
                                <?php foreach ($partnerRequests as $key => $value) { ?>
                                    <?php if($value['PartnerRequest']['user_id'] != "0") { ?>
                                        <tr>
                                            <td><?= $usersByID[$value['PartnerRequest']['user_id']] ?></td>
                                            <td><?= $value['PartnerRequest']['subs'] ?> <?= $Lang->get('PARTNER__ADMIN_SUBS') ?></td>
                                            <td>
                                            <?php if($value['PartnerRequest']['response'] == "1") { ?>
                                                <a class="label label-success"><?= $Lang->get('PARTNER__ACCEPT') ?></a>
                                            <?php } else {   ?> 
                                                <a class="label label-danger"><?= $Lang->get('PARTNER__REFUSE') ?></a>
                                            <?php } ?> 

                                            </td>
                                            <td><?= $Lang->date($value['PartnerRequest']['created']) ?></td>
                                            <td>
                                                <a href="<?= $this->Html->url(['action' => 'answer', 'id' => $value['PartnerRequest']['id']]) ?>" class="label label-info"><?= $Lang->get('PARTNER__ADMIN_SEE_REQUEST') ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>