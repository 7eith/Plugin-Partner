<?php
/* **************************************************************************** *
 *
 * PartnerRequest.php
 *
 * by: Snkh <dev@snkh.me>
 *
 * Created: 27/03/2019 14:46 by Snkh
 * Under private Copyright, all rights reserved to Snkh.
 *
 **************************************************************************** */

class PartnerRequest extends AppModel {

    public $useTable = "partner__requests";
    
    public $belongsTo = array('User');

}
