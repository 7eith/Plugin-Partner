<?php
/* **************************************************************************** *
 *
 * routes.php
 *
 * by: Snkh <dev@snkh.me>
 *
 * Created: 24/03/2019 18:02 by Snkh
 * Under private Copyright, all rights reserved to Snkh.
 *
 **************************************************************************** */

Router::connect('/admin/partners', array('controller' => 'Partner', 'action' => 'index', 'plugin' => 'Partner', 'admin' => true));