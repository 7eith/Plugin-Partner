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
        <span class="white"><?= $Lang->get("PARTNER__MODULE_TITLE") ?></span>
    </div>
    
    <div class="panel-body" style="padding: 30px 20px;">
        <form method="post" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'partner', 'action' => 'create')) ?>">
            <div class="row" style="padding-left: 20px;">
                <div class="form-group">
                    <label><?= $Lang->get("PARTNER__CHANNEL_LINK") ?></label>
                    <input type="text" class="form-control" name="link">
                </div>

                <br />

                <div class="form-group">
                    <label><?= $Lang->get("PARTNER__SUBS_COUNT") ?></label>
                    <input type="text" class="form-control" name="subs">
                </div>

                <br />
                
                <div class="form-group">
                <label><?= $Lang->get("PARTNER__DESCRIPTION") ?></label>
                    <?= $this->Html->script('admin/tinymce/tinymce.min.js') ?>
                    <script type="text/javascript">
                        tinymce.init({
                            selector: "textarea",
                            height : 300,
                            width : '100%',
                            language : 'fr_FR',
                            plugins: "code image link",
                            toolbar: "fontselect fontsizeselect bold italic underline strikethrough link image forecolor backcolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist outdent indent blockquote code"
                        });
                    </script>
                    <textarea id="editor" name="description" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-large"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </div>
        </form>
    </div>
</div>