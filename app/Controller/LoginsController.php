<?php
/* Controller: Logins
	 * Description: Used for login/Authentication
	 * Created By: Naveen Joshi on 4/06/2016*/
	 
	 
App::uses('AppController', 'Controller');

class LoginsController extends AppController {

	public $components = array('Auth','Core');
	public $helpers=array('Form','Session');
	public $uses = array('User');
	public $layout='login';
	
	
	public function beforeFilter()
	{
		$this->Auth->allow( 'register','admin_login','fblogin','fb_login','logout','forgot_password','reset_password');
		parent::beforeFilter();
	}
	
	/* Method: register
	 * Description: Used to refister front end user
	 * Created By: Naveen Joshi on 4/06/2016*/
	 
	/* public function register(){
		 
		 if($this->request->is('post')){
			 $this->User->set($this->request->data);
			 if($this->User->validates()){ 
				 $this->request->data['User']['password']=$this->Auth->password($this->User->generate_password()); //auto generated password
				 $this->request->data['User']['user_role_id']='2';   //Chef role id=2;
				 $this->User->save($this->request->data);
				 $this->Session->setFlash(__('Thank you for registering, will get back to you soon'),'default',array('class'=>'success'), 'register');
			 }else{
				 $this->Session->write('RequestData',$this->request->data);
				 $this->Session->setFlash(__('Email id already registered'),'default',array('class'=>'error'), 'register');
			 }
			 $this->redirect(array('controller'=>'home','action'=>'index'));
		 }
		 
	 }*/

       public function register(){
		 $this->autorender = false;
		 $this->layout =false;
		 if($this->request->is('post')){
			 //echo '<pre>'; print_r($this->request->data);
			 $this->User->set($this->request->data);
			 $chkuser = $this->User->findByEmail($this->request->data['User']['email']);
			 if(empty($chkuser)){ 
				 $this->request->data['User']['password']=$this->Auth->password($this->request->data['User']['password']); //auto generated password
				 $this->request->data['User']['user_role_id']='3';   //Chef role id=2;
				 $this->request->data['User']['created']=date('Y-m-d H:i:s');
				 $this->User->save($this->request->data);
				 $this->Session->setFlash(__('Your account created successfully, thank you for registering.',true),'default',array('class'=>'alert alert-success'));
				 
			 }else{
				 $this->Session->write('RequestData',$this->request->data);
				 $this->Session->setFlash(__('Email id already registered',true),'default',array('class'=>'alert alert-danger'));
			 }
			 $this->redirect(array('controller'=>'home','action'=>'index'));
		 }
		 
	 }
	 
	 
       public function admin_index(){
          if ($this->request->is('post')) {
              $this->login($this->request->data);
	  }
        }
        
        
        
        private function login($arr){
            $this->request->data=$arr;
			//print_r($arr);
			//echo $pass = $this->Auth->password($arr['User']['password']); die;
             if ($this->Auth->login()) {
				
                /* --update access logs-- */
                $this->User->validation = null;
                $arrData = array('User' =>
                    array('last_login_ip' => $this->request->clientIp(),
                        'last_login_date' => date('Y-m-d H:i:s')
                ));
                $this->User->id = $this->Auth->user('user_id');
                $this->User->save($arrData, false);
                $this->Session->setFlash(__('Successfully logged In !'),'default',array('class'=>'alert alert-success'));
                $this->redirect($this->Auth->redirectUrl());
            }else{
                        $this->Session->setFlash(__('Invalid Username or Password, please try again'),'default',array('class'=>'alert alert-danger'));
                        $this->redirect($this->Auth->logout());
                }
            
        }
        public function admin_logout(){
            $this->Session->setFlash(__('Successfully logged out !'),'default',array('class'=>'alert alert-success'));
            $this->redirect($this->Auth->logout());
            $this->redirect(array('controller'=>'Logins','action'=>'index','admin'=>true));
	}

     

/* Method: forgot_password
	 * Description: Used to recover password
	 * Created By: Naveen Joshi on 08/07/2016*/

   
       public function forgot_password(){
            $this->User->set($this->request->data);
            if($this->User->validates(array('fieldList'=>array('email')))){
                    
            $this->layout='ajax';		

                    $rs=$this->User->findByEmail($this->request->data['User']['email']);
                    if($rs){

                            $email = $rs['User']['email'];
                            $name = $rs['User']['first_name'];
                            $newPass = $this->Core->generatePassword();
                            $from = "";
                            $to = $email;
                            /*Encrypt userid with encryption key****/
                                 $key=$this->User->mc_encrypt(ENCRYPTION_KEY,$rs['User']['user_id']);
                                /*Encrypt userid with encryption key****/
                            $link=SITE_URL.'/logins/reset_password/?authenticationKey='.$key;
				  /*-template asssignment if any*/
                           $this->loadModel('EmailTemplate');
				$template = $this->EmailTemplate->find('first',
				    array('conditions' => array(
					'email_identifier'=> 'reset_password_link'
					)
				    )
				);
				if($template){	
				    $arrFind=array('{{NAME}}','{{link}}');
				    $arrReplace=array($name,$link);
				    $from=$template['EmailTemplate']['from_email'];
				    $subject=$template['EmailTemplate']['subject'];
				    $content=str_replace($arrFind, $arrReplace,$template['EmailTemplate']['content']);
				    $mailResult=$this->sendEmail($to,$from,$subject,$content);
				}
                            				
                            if($mailResult){				
                                echo '<div class="alert alert-success">Reset link has been sent to your email address.</div>';
                                
                            }else{				
                                    echo "<div  class='alert alert-danger'>The email could not be sent.Please try again later.</div>";
                                    die;
                            }				

                    }else{
                            echo "<div  class='alert alert-danger'>User email does not exist</div>";
                    }
            }else{
                    echo "<div  class='alert alert-danger'>Please enter the email</div>";
            }
            die;
    }
        
   function reset_password(){
       if($this->request->is('post')){
           if($this->request->data['User']['password']){
               /* if authentication key is set on url then check for account authentication***/
                if(isset($this->request->query['authenticationKey'])){
                	 $authKey=$this->request->query['authenticationKey'];
                         $password=$this->request->data['User']['password'];
                         $encyptedPwd=$this->Auth->password($password);
                         /*decrypt userid with encryption key****/
                         $key=$this->User->mc_decrypt(ENCRYPTION_KEY,$authKey);
                        /*decrypt userid with encryption key****/
                          
                       $userArr=$this->User->findByUserId($key);
                       
                       if(!empty($userArr)){
                           $email=$userArr['User']['email'];
                           $to=$email;
                           $name=$userArr['User']['first_name'];
			   $this->User->id=$key;
                           $this->User->saveField('password',$encyptedPwd);
                            $this->loadModel('EmailTemplate');
				$template = $this->EmailTemplate->find('first',
				    array('conditions' => array(
					'email_identifier'=> 'forgot_password'
					)
				    )
				);
                            $link=SITE_URL.'/home/';
                           if($template){	
				    $arrFind=array('{{NAME}}','{{link}}','{{username}}','{{password}}');
				    $arrReplace=array($name,$link,$email,$password);
				    $from=$template['EmailTemplate']['from_email'];
				    $subject=$template['EmailTemplate']['subject'];
				    $content=str_replace($arrFind, $arrReplace,$template['EmailTemplate']['content']);
				    $mailResult=$this->sendEmail($to,$from,$subject,$content);
				}
                            				
                           $this->Session->setFlash(__('<strong>Success ! </strong> Your account credentials has been changed successfully.'),'default',array('class'=>'alert alert-success'));
                           $this->redirect(array('action'=>'reset_password'));
                       }else{
                          $this->Session->setFlash(__('Access Denied.'),'default',array('class'=>'alert alert-danger'));
                      
                      }

                }else{
                     $this->Session->setFlash(__('Invalid authentication code.'),'default',array('class'=>'alert alert-danger'));
                }
                /* if authentication key is set on url then check for account authentication***/
           }
       }
   } 

   function change_password(){
       $userRole=$this->Auth->user('user_role_id');
       if($this->request->is('post')){
	   $uid=$this->Auth->user('user_id');
           $rs=$this->User->findByUserId($uid);
           if(($this->Auth->password($this->request->data['User']['old_password'])) != $rs['User']['password']){
	   	$this->Session->setFlash(__('Invalid old password.'),'default',array('class'=>'alert alert-danger'));
           }else{
                $password=$this->request->data['User']['password'];
                $encyptedPwd=$this->Auth->password($password); 
	        $this->User->id=$uid;
		$this->User->saveField('password',$encyptedPwd);
		$this->Session->setFlash(__('<strong>Success ! </strong> Password changed successfully.'),'default',array('class'=>'alert alert-success'));
           }
       }
       if($userRole=='3')
            $this->render('/Tradesmen/change_password');
      if($userRole=='2')
            $this->render('/Clients/change_password');
   }   


}
