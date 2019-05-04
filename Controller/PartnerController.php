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
 class PartnerController extends AppController { 

    /** 
     * Create PartnerRequest and store it.
     */

     public function create() {
        if(!$this->isConnected) 
            throw new ForbiddenException();

        if(!$this->request->is('ajax')) 
            return $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));

        $this->loadModel('Partner.PartnerRequest');
        $this->response->type('json');
        $this->autoRender = false;

        // has already try 
        if($this->PartnerRequest->find('count', ['conditions' => ['user_id' => $this->User->getKey('id')]]) != 0) 
            return $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('PARTNER__HAS_ALREADY_ASKED'))));
        
        if (!empty($this->request->data['link']) AND !empty($this->request->data['subs']) AND !empty($this->request->data['description'])) {

            if(!is_numeric($this->request->data['subs'])) 
                return $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('PARTNER__ERROR_NUMBER'))));
        
            $this->PartnerRequest->read(null, null);
            $this->PartnerRequest->set($this->request->data);
            $this->PartnerRequest->set(array('user_id' => $this->User->getKey('id')));
            $this->PartnerRequest->save();

            $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('PARTNER__REQUEST_OK'))));
        } else { 
            $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
        }
     }

    /** 
     * Index all requests
     */

    public function admin_index(){
        $this->layout = 'admin';
        $this->set('title_for_layout', $this->Lang->get('PARTNER__LAYOUT_HOME'));
        $this->loadModel('Partner.PartnerRequest');

        $usersToFind = array();
        $partnerRequests = $this->PartnerRequest->find('all', array('conditions' => array('response' => null)));
        
        foreach ($partnerRequests as $key => $value) {
            $usersToFind[] = $value['PartnerRequest']['user_id'];
        }

        $usersByID = array();
        $findUsers = $this->User->find('all', array('conditions' => array('id' => $usersToFind)));
        foreach ($findUsers as $key => $value) {
            $usersByID[$value['User']['id']] = $value['User']['pseudo'];
        }
        
        $this->set(compact('partnerRequests', 'usersByID'));
    }

    /** 
     * History
     */

    public function admin_history(){
        $this->layout = 'admin';
        $this->set('title_for_layout', $this->Lang->get('PARTNER__LAYOUT_HISTORY'));
        $this->loadModel('Partner.PartnerRequest');

        $usersToFind = array();
        $partnerRequests = $this->PartnerRequest->find('all', array('conditions' => array('response !=' => null)));

        foreach ($partnerRequests as $key => $value) {
            $usersToFind[] = $value['PartnerRequest']['user_id'];
        }

        $usersByID = array();
        $findUsers = $this->User->find('all', array('conditions' => array('id' => $usersToFind)));
        foreach ($findUsers as $key => $value) {
            $usersByID[$value['User']['id']] = $value['User']['pseudo'];
        }
        
        $this->set(compact('partnerRequests', 'usersByID'));
    }

    public function admin_answer() { 
        $this->layout = 'admin';
        $this->set('title_for_layout', $this->Lang->get('PARTNER__LAYOUT_ANSWER'));
        $this->loadModel('Partner.PartnerRequest');

        if (isset($this->request->params['id'])) {
            $id = $this->request->params['id'];
            $partnerRequest = $this->PartnerRequest->find('first', ['conditions' => ['id' => $id]]);
            $partnerRequester = $this->User->find('first', ['conditions' => ['id' => $partnerRequest['PartnerRequest']['user_id']]]);

            if (empty($partnerRequest))
                throw new NotFoundException();

            $this->set('partnerRequest', $partnerRequest['PartnerRequest']);
            $this->set('partnerRequester', $partnerRequester['User']);
        }

        else
            $id = null;
    }

    public function admin_accept() {
        $this->layout = null;
        $this->autoRender = false;
        $this->loadModel('Partner.PartnerRequest');
        $this->loadModel('Notification');

        if($this->request->is('ajax')) {
            if (isset($this->request->params['id'])) {
                $id = $this->request->params['id'];
                
                $partnerRequest = $this->PartnerRequest->find('first', ['conditions' => ['id' => $id]]);
                $partnerRequest['PartnerRequest']['response'] = true; 
                $this->PartnerRequest->save($partnerRequest);

                $this->Notification->setToUser($this->Lang->get('PARTNER__NOTIFICATION_ACCEPT'), $partnerRequest['PartnerRequest']['user_id'], $this->User->getKey('id'), 'user');

                $this->response->type('json');
                $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('PARTNER__ANSWERED_ACCEPT'))));
            }
        } 
    }

    public function admin_refuse() { 
        $this->layout = null;
        $this->autoRender = false;
        $this->loadModel('Partner.PartnerRequest');
        $this->loadModel('Notification');

        if($this->request->is('ajax')) {
            if (isset($this->request->params['id'])) {
                $id = $this->request->params['id'];
                
                $partnerRequest = $this->PartnerRequest->find('first', ['conditions' => ['id' => $id]]);
                $partnerRequest['PartnerRequest']['response'] = false; 
                $this->PartnerRequest->save($partnerRequest);

                $this->Notification->setToUser($this->Lang->get('PARTNER__NOTIFICATION_REFUSE'), $partnerRequest['PartnerRequest']['user_id'], $this->User->getKey('id'), 'user');

                $this->response->type('json');
                $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('PARTNER__ANSWERED_REFUSE'))));
            }
        } 
    }
 }