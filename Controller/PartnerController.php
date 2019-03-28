<?php
/* **************************************************************************** *
 *
 * PartnerController.php
 *
 * by: Snkh <dev@snkh.me>
 *
 * Created: 27/03/2019 14:37 by Snkh
 * Under private Copyright, all rights reserved to Snkh.
 *
 **************************************************************************** */

 /*
   INDEX, 
   ADD, from user, id, link, text 
   DELETE, admin, id, 
   ANSWER, id, text, 
   SHOW id
  */ 

 class PartnerController extends AppController { 

    /** 
     * Admin Functions, send all PartnerRequests 
     */

    public function admin_index(){
        $this->layout = 'admin';
        $this->set('title_for_layout', 'Partner');
        $this->loadModel('Partner.PartnerRequest');

        $usersToFind = array();
        $partnerRequests = $this->PartnerRequest->find('all');
        foreach ($partnerRequests as $key => $value) {
            $usersToFind[] = $value['PartnerRequest']['user_id'];
        }
        // On récupère tous les utilisateurs pour afficher leur pseudo
        $usersByID = array();
        $findUsers = $this->User->find('all', array('conditions' => array('id' => $usersToFind)));
        foreach ($findUsers as $key => $value) {
            $usersByID[$value['User']['id']] = $value['User']['pseudo'];
        }
        // send to vue 
        $this->set(compact('partnerRequests', 'usersByID'));
    }

    /** 
     * Delete PartnerRequests, only admin 
     * params: id of PartnerRequest
     */

    public function admin_delete($id) { 
        
    }

    public function admin_answer($id, $text) { 
        
    }

    public function admin_show($id) { 
        
    }

    public function add($user, $link, $text) { 

    }

 }