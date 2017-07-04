<?php 

/*RiteDoc
   Controller: Dashboard
* Description: Used for trademan operations 
* Created By: Naveen Joshi on 21/07/2016*/


App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
class DashboardController extends AppController {

	public $components = array('Auth');
	public $helpers=array('Form','Session');
	public $layout='admin';
        public $uses=array('User','Login','State','City','BusinessCenter');
	

	public function beforeFilter()
	{
	
		parent::beforeFilter();
	}

	function admin_index(){         
        /*    $arrparam2=array(
                  'conditions'=>array('User.user_role_id'=>'2'),
          'fields'=>array('Count(User.user_id) as tusers','CONCAT(MONTHNAME(User.created)) as month_name'),
          'group'=>array('MONTH(User.created)')
          );
            
                 $arrparam3=array(
                  'conditions'=>array('User.user_role_id'=>'3'),
          'fields'=>array('Count(User.user_id) as tusers','CONCAT(MONTHNAME(User.created)) as month_name'),
          'group'=>array('MONTH(User.created)','User.user_role_id'),
          'order'=> array('User.created' => 'asc')
          );

    
          
          $this->set('zonalHeadCountMonth',$this->User->find('all',$arrparam2));
          $this->set('callCenterCountMonth',$this->User->find('all',$arrparam3));
          $this->set('zonalHeadCount',$this->User->find('count',array('conditions'=>array('User.user_role_id'=>'2'))));
          $this->set('callCenterCount',$this->User->find('count',array('conditions'=>array('User.user_role_id'=>'3'))));
          $this->set('SalesCount',$this->User->find('count',array('conditions'=>array('User.user_role_id'=>'4'))));
          $this->set('dealerCount',$this->User->find('count',array('conditions'=>array('User.user_role_id'=>'5'))));
          $this->set('otheruserCount',$this->User->find('count',array('conditions'=>array('User.user_role_id'=>'6'))));
          $this->set('stateCount',$this->State->find('count'));
          $this->set('cityCount',$this->City->find('count'));
          $this->set('centerCount',$this->BusinessCenter->find('count'));*/
        }

         
}
