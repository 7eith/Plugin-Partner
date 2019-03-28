<section class="content">
    <div class="row">
        <div class="col-md-12">

        <div class="ajax"></div>

        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"><?= $Lang->get('PARTNER_ADMIN_TITLE') ?></h3>
            </div>

            <div class="box-body table-responsive">

                <table class="table table-bordered dataTable">
                <thead>
                    <tr>
                    <th><?= $Lang->get('GLOBAL__AUTHOR') ?></th>
                    <th><?= $Lang->get('PARTNER_REQUEST_SUBS') ?></th>
                    <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                    <th><?= $Lang->get('PARTNER_REQUEST_LINK') ?></th>
                    <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($partnerRequests)) { ?>
                        <?php foreach ($partnerRequests as $key => $value) { ?>
                            <?php if($value['PartnerRequest']['user_id'] != "0") { ?>
                                <tr>
                                    <td><?= $usersByID[$value['PartnerRequest']['user_id']] ?></td>
                                    <td><?= $value['PartnerRequest']['subs'] ?> <?= $Lang->get('PARTNER_SUBS') ?></td>
                                    <td><?= $Lang->date($value['PartnerRequest']['created']) ?></td>
                                    <td>
                                        <a href="<?= $value['PartnerRequest']['link'] ?>" class="label label-info"><?= $Lang->get('PARTNER_ADMIN_SHOW_CHANNEL') ?></a>
                                    </td>
                                    <td>
                                        <a href="#" onClick="howmuch(<?= $value['PartnerRequest']['id'] ?>)" class="label label-info"><?= $Lang->get('PARTNER_ADMIN_SHOW_REQUEST') ?></a>
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