<?php
/* **************************************************************************** *
 *
 * admin_answer.ctp
 *
 * by: Snkh <dev@snkh.me>
 *
 * Created: 29/03/2019 07:44 by Snkh
 * Under private Copyright, all rights reserved to Snkh.
 *
 **************************************************************************** */
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get("PARTNER__ADMIN_ANSWER_TITLE") ?> <?= $partnerRequester['pseudo'] ?></h3>
                </div>

                <div class="box-body">
                    <div id="alert_msg"></div>

                    <strong><?= $Lang->get("PARTNER__ADMIN_CHANNEL_LINK") ?></strong> <br>
                    <a href="<?= $partnerRequest['link'] ?>"><?= $partnerRequest['link'] ?></a>

                    <br>

                    <strong><?= $Lang->get("PARTNER__SUBS_COUNT") ?></strong> <br>
                    <?= $partnerRequest['subs'] ?> <?= $Lang->get("PARTNER__ADMIN_SUBS") ?>

                    <br>
                    
                    <strong><?= $Lang->get("PARTNER__DESCRIPTION") ?></strong> <br>
                    <?= $partnerRequest['description'] ?>

                    <br>
                    
                    <div class="pull-right">
                        <button id="accept" class="btn btn-success"><?= $Lang->get("PARTNER__ACCEPT") ?></button>
                        <button id="refuse" class="btn btn-danger"><?= $Lang->get("PARTNER__REFUSE") ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $("#accept").click(function(e) {
        e.preventDefault();
        var inputs = {
            id: <?= $partnerRequest['id']; ?>,
        };
        inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.ajax({
            type: "POST",
            url: "<?= $this->Html->url(['controller' => 'partner', 'action' => 'accept', 'id' => $value['id']]) ?>/<?= $partnerRequest['id']; ?>",
            data: inputs,
        }).done(function(data) {
                if(typeof data == "object"){
                    $('#alert_msg').html('' +
                        '<div class="alert alert-success">' +
                        '<?= $Lang->get("PARTNER__ANSWERED_ACCEPT") ?>' +
                        '</div>'
                    );
                }
                else if(data == 0)
                    $('#alert_msg').html('' +
                        '<div class="alert alert-error">' +
                        '<?= $Lang->get("MODAL_ERROR") ?>. error : 1' +
                        '</div>'
                    );

            }); 
    });

    $("#refuse").click(function(e) {
        e.preventDefault();
        var inputs = {
            id: <?= $partnerRequest['id']; ?>,
        };
        inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.ajax({
            type: "POST",
            url: "<?= $this->Html->url(['controller' => 'partner', 'action' => 'refuse', 'id' => $value['id']]) ?>/<?= $partnerRequest['id']; ?>",
            data: inputs,
        }).done(function(data) {
                if(typeof data == "object"){
                    $('#alert_msg').html('' +
                        '<div class="alert alert-warning">' +
                        '<?= $Lang->get("PARTNER__ANSWERED_REFUSE") ?>' +
                        '</div>'
                    );
                }
                else if(data == 0)
                    $('#alert_msg').html('' +
                        '<div class="alert alert-error">' +
                        '<?= $Lang->get("MODAL_ERROR") ?>. error : 1' +
                        '</div>'
                    );

            }); 
    });
</script>
