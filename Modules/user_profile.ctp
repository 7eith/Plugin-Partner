<?php
/* **************************************************************************** *
 *
 * user_profile.ctp
 *
 * by: Snkh <dev@snkh.me>
 *
 * Created: 24/03/2019 23:35 by Snkh
 * Under private Copyright, all rights reserved to Snkh.
 *
 **************************************************************************** */
?>
<div class="panel panel-default">
    <div class="panel-heading" id="panel-head">
        <span class="white"><?= $Lang->get("YOUTUBER_REQUEST") ?></span>
    </div>
    
    <div class="panel-body" style="padding: 30px 20px;">
            <form method="post" data-ajax="true" action="">
                <div class="row">
                    <div class="form-group">
                        <label><?= $Lang->get("PARTNER_REQUEST_LINKS") ?></label>
                        <input type="text" class="form-control" name="links">
                    </div>

                    <br />

                    <div class="form-group">
                        <label><?= $Lang->get("PARTNER_REQUEST_SUBS") ?></label>
                        <input type="text" class="form-control" name="subs">
                    </div>

                    <br />
                    
                    <div class="form-group">
                        <label><?= $Lang->get("PARTNER_REQUEST_TEXT") ?></label>
                        <textarea class="form-control" rows="3" name="text"></textarea>
                    </div>
                </div>

                <div class="text-right">
                <button type="submit" class="btn btn-primary btn-large">Envoyer</button>
                </div>

            </form>
    </div>
</div>