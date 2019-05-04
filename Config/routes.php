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

Router::connect('/partner/create',           array('controller' => 'partner', 'action' => 'create', 'plugin' => 'partner'));

/** 
 * Admin 
 */

Router::connect('/admin/partner',            array('controller' => 'partner', 'action' => 'index',  'plugin' => 'partner', 'admin' => true));
Router::connect('/admin/partner/history',    array('controller' => 'partner', 'action' => 'history',  'plugin' => 'partner', 'admin' => true));
Router::connect('/admin/partner/answer/:id', array('controller' => 'partner', 'action' => 'answer', 'plugin' => 'partner', 'admin' => true));
Router::connect('/admin/partner/accept/:id', array('controller' => 'partner', 'action' => 'accept', 'plugin' => 'partner', 'admin' => true));
Router::connect('/admin/partner/refuse/:id', array('controller' => 'partner', 'action' => 'refuse', 'plugin' => 'partner', 'admin' => true));
