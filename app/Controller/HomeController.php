<?php 

/*MajorSpins
  Controller: Home
* Description: used for home contents  
* Created By: Naveen Joshi on 29/06/2017*/


App::uses('AppController', 'Controller');

class HomeController extends AppController {

	public $name = 'Home';
	public $components = array('Auth');
	public $helpers=array('Form','Session');
	public $layout='admin';
    public $uses=array('User','Price','Testimonial','Client','Cms','SubService');
	

	public function beforeFilter()
	{
	
		parent::beforeFilter();
		$this->Auth->allow(array('ajax_addcms','ajax_getForm','index'));
	}  
	
	public function index(){
		$this->layout = 'default';
		
		$about_content = $this->Cms->find('first',array('conditions'=>array('Cms.url_key'=>'about_us'))); 
		$this->set('about_content',$about_content);
		
		$this->Cms->bindModel(array('hasMany'=>array('SubPage'=>array('class'=>'SubPage','foreignKey'=>'cms_id','conditions'=>array('SubPage.show_at_home'=>1)))));
		$services = $this->Cms->find('first',array('conditions'=>array('Cms.url_key'=>'services'))); 
		$this->set('services',$services);
		
		$prices = $this->Price->find('all',array('conditions'=>array('Price.show_at_home'=>1))); 
		$this->set('prices',$prices);
		
		$testimonials = $this->Testimonial->find('all',array('conditions'=>array('Testimonial.show_at_home'=>1))); 
		$this->set('testimonials',$testimonials);
		
		$clients = $this->Client->find('all',array('conditions'=>array('Client.show_at_home'=>1))); 
		$this->set('clients',$clients);
		//echo '<pre>'; print_r($prices); die;
	} 

	function admin_add_price($id=null){
        
        if(!empty($this->request->data)){
            if($id){
                $this->Price->id = $id;
                if(!$this->Price->exists()){
                     $this->Session->setFlash(__('Invalid price id',true),'default',array('class'=>'alert alert-error'));
                     $this->redirect('prices');
                }else{
                    $this->request->data['Price']['modified'] = date('Y-m-d');
                    if($this->Price->save($this->request->data)){
                        $this->Session->setFlash(__('Price updated successfully',true),'default',array('class'=>'alert alert-success'));
                        $this->redirect('prices');
                    }else{  
                        $this->Session->setFlash(__('Price could not updated',true),'default',array('class'=>'alert alert-error'));
                        $this->redirect('prices');
                    }
                }
            }else{
                $this->Price->create();
                
                $this->request->data['Price']['created'] = date('Y-m-d H:i:s');
               
                if($rs = $this->Price->save($this->request->data)){
                   
                    $this->Session->setFlash(__('Price added successfully',true),'default',array('class'=>'alert alert-success'));
                    $this->redirect('prices');
                }else{
                    $this->Session->setFlash(__('Price could not added',true),'default',array('class'=>'alert alert-error'));
                    $this->redirect('prices');
                }
            }
        }

        if($id){
            $this->request->data = $this->Price->findById($id);
            $this->set('page','Edit Campaign');
			$this->set('title_for_layout','Edit Campaign');
        }else{
            $this->set('page','Add Campaign');
			$this->set('title_for_layout','Add Campaign');
        }
    }
		
	/**    
	 * Name : admin_prices
	 * Purpose : Home price listing 
	 * Created : 30 June 2017
	 * Author : Naveen joshi
	 */ 
    
    function admin_prices(){
        $this->set('title_for_layout','Manage Campaign');
        
        if(isset($this->request->query['limit'])){
            $this->limit=$this->request->query['limit'];
        }else{
            $this->limit = 10;
        }

        if($this->request->is(['post','put'])){
            $action = isset($this->request->data['option']) ? $this->request->data['option'] : '';
            $ids = isset($this->request->data['ids']) ? $this->request->data['ids'] : '';

            if(!empty($action)){
                if(!empty($ids)){
                    switch ($action) {
                        case 'delete':
                            $deletedIds = [];
                            foreach ($ids as $id){
                                $result = $this->Price->delete($id);
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Campaign';
                            if($deletedCount>1){
                                $userC = 'Campaigns';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' deleted',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('prices');
                            
                        break;
                        case 'show':
                            $deletedIds = [];
                            foreach ($ids as $id) {
                                $this->Price->id = $id;
                                $result = $this->Price->saveField('show_at_home','1');
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Campaign';
                            if($deletedCount>1){
                                $userC = 'Campaigns';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' updated',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('prices');

                        break;
                        case 'hide':
                            $deletedIds = [];
                            foreach ($ids as $id) {
                                $this->Price->id = $id;
                                $result = $this->Price->saveField('show_at_home','0');
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Campaign';
                            if($deletedCount>1){
                                $userC = 'Campaigns';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' updated',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('prices');
                        break;
                        
                    }
                }else
                {
                    $this->Session->setFlash(__('Select Campaign to complete process!',true),'default',array('class'=>'alert alert-danger'));
                }
            }else{
                
                $this->Session->setFlash(__('Select Action first to complete process!',true),'default',array('class'=>'alert alert-danger'));
            }
        }

        $this->paginate = array('limit'=>$this->limit);
        $prices = $this->paginate('Price');
       

        $keyword = '';
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $keyword = $_GET['keyword'];

            $cond = array('OR'=>array(
                        'Price.title LIKE'=> '%'.$keyword.'%',
                        'Price.price LIKE'=> '%'.$keyword.'%',
                       
                        ),
                       
            );
            
            $prices = $this->Price->find('all',array('conditions'=>$cond,'order'=>'Price.id DESC'));
            
        }
        
        $this->set('prices',$prices);
        $this->set('keyword',$keyword);
    }
	
	
	function admin_delete_price($id=null){
		if($id){
			$this->Price->id = $id;
			if(!$this->Price->exists()){
				$this->Session->setFlash(__('Price does not exists',true),'default',array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
				exit;
			}else{
				if($this->Price->delete($id)){
					$this->Session->setFlash(__('Price deleted successfully',true),'default',array('class'=>'alert alert-success'));
					$this->redirect($this->referer());
					exit;
				}else{
					$this->Session->setFlash(__('Price could not deleted',true),'default',array('class'=>'alert alert-danger'));
					$this->redirect($this->referer());
					exit;
				}
			}
		}
		
	}
	
	public function admin_add_testimonial($id=null){  

		if(!empty($this->request->data)){
            if($id){
                $this->Testimonial->id = $id;
                if(!$this->Testimonial->exists()){
                     $this->Session->setFlash(__('Invalid Testimonial id',true),'default',array('class'=>'alert alert-error'));
                     $this->redirect('testimonials');
                }else{
                    $this->request->data['Testimonial']['modified'] = date('Y-m-d');
					if(!empty($this->request->data['Testimonial']['user_image']['name'])){
					$pic = $this->request->data['Testimonial']['user_image']['name'];
					if(move_uploaded_file($this->request->data['Testimonial']['user_image']['tmp_name'], WWW_ROOT.'img/testimonialPics/'.$pic)){
						$this->request->data['Testimonial']['user_image'] = $pic;
					}else{  
						$this->Session->setFlash(__('Image could not uploaded, please try again',true),'default',array('class'=>'alert alert-error'));
						$this->redirect($this->referer());
					}
					}else{
							unset($this->request->data['Testimonial']['user_image']);
					}
                    if($this->Testimonial->save($this->request->data)){
                        $this->Session->setFlash(__('Testimonial updated successfully',true),'default',array('class'=>'alert alert-success'));
                        $this->redirect('testimonials');
                    }else{  
                        $this->Session->setFlash(__('Testimonial could not updated',true),'default',array('class'=>'alert alert-error'));
                        $this->redirect('testimonials');
                    }
                }
            }else{
                $this->Testimonial->create();
                
                $this->request->data['Testimonial']['created'] = date('Y-m-d H:i:s');
                if(!empty($this->request->data['Testimonial']['user_image']['name'])){
					$pic = $this->request->data['Testimonial']['user_image']['name'];
					if(move_uploaded_file($this->request->data['Testimonial']['user_image']['tmp_name'], WWW_ROOT.'img/testimonialPics/'.$pic)){
						$this->request->data['Testimonial']['user_image'] = $pic;
					}else{  
						$this->Session->setFlash(__('Image could not uploaded, please try again',true),'default',array('class'=>'alert alert-error'));
						$this->redirect($this->referer());
					}
					}else{
							unset($this->request->data['Testimonial']['user_image']);
					}
                if($rs = $this->Testimonial->save($this->request->data)){
                   
                    $this->Session->setFlash(__('Testimonial added successfully',true),'default',array('class'=>'alert alert-success'));
                    $this->redirect('testimonials');
                }else{
                    $this->Session->setFlash(__('Testimonial could not added',true),'default',array('class'=>'alert alert-error'));
                    $this->redirect('testimonials');
                }
            }
        }

        if($id){
            $this->request->data = $this->Testimonial->findById($id);
            $this->set('page','Edit Testimonial');
			$this->set('title_for_layout','Edit Testimonial');
        }else{
            $this->set('page','Add Testimonial');
			$this->set('title_for_layout','Add Testimonial');
        }
	}
		
	public function admin_testimonials(){
		
		$this->set('title_for_layout','Manage Testimonial');
        
        if(isset($this->request->query['limit'])){
            $this->limit=$this->request->query['limit'];
        }else{
            $this->limit = 10;
        }

        if($this->request->is(['post','put'])){
            $action = isset($this->request->data['option']) ? $this->request->data['option'] : '';
            $ids = isset($this->request->data['ids']) ? $this->request->data['ids'] : '';

            if(!empty($action)){
                if(!empty($ids)){
                    switch ($action) {
                        case 'delete':
                            $deletedIds = [];
                            foreach ($ids as $id){
                                $result = $this->Testimonial->delete($id);
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Testimonial';
                            if($deletedCount>1){
                                $userC = 'Testimonial';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' deleted',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('testimonials');
                            
                        break;
                        case 'show':
                            $deletedIds = [];
                            foreach ($ids as $id) {
                                $this->Testimonial->id = $id;
                                $result = $this->Testimonial->saveField('show_at_home','1');
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Testimonial';
                            if($deletedCount>1){
                                $userC = 'Testimonial';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' updated',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('testimonials');

                        break;
                        case 'hide':
                            $deletedIds = [];
                            foreach ($ids as $id) {
                                $this->Testimonial->id = $id;
                                $result = $this->Testimonial->saveField('show_at_home','0');
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Testimonial';
                            if($deletedCount>1){
                                $userC = 'Testimonial';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' updated',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('testimonials');
                        break;
                        
                    }
                }else
                {
                    $this->Session->setFlash(__('Select Testimonial to complete process!',true),'default',array('class'=>'alert alert-danger'));
                }
            }else{
                
                $this->Session->setFlash(__('Select Action first to complete process!',true),'default',array('class'=>'alert alert-danger'));
            }
        }

        $this->paginate = array('limit'=>$this->limit);
        $testimonials = $this->paginate('Testimonial');
       

        $keyword = '';
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $keyword = $_GET['keyword'];

            $cond = array('OR'=>array(
                        'Testimonial.name LIKE'=> '%'.$keyword.'%',
                        //'Testimonial.price LIKE'=> '%'.$keyword.'%',
                       
                        ),
                       
            );
            
            $testimonials = $this->Testimonial->find('all',array('conditions'=>$cond,'order'=>'Testimonial.id DESC'));
            
        }
        
        $this->set('testimonials',$testimonials);
        $this->set('keyword',$keyword);
	}
	
	
	function admin_delete_testimonial($id=null){
		if($id){
			$this->Testimonial->id = $id;
			if(!$this->Testimonial->exists()){
				$this->Session->setFlash(__('Testimonial does not exists',true),'default',array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
				exit;
			}else{
				if($this->Testimonial->delete($id)){
					$this->Session->setFlash(__('Testimonial deleted successfully',true),'default',array('class'=>'alert alert-success'));
					$this->redirect($this->referer());
					exit;
				}else{
					$this->Session->setFlash(__('Testimonial could not deleted',true),'default',array('class'=>'alert alert-danger'));
					$this->redirect($this->referer());
					exit;
				}
			}
		}
		
	}
	
	
	public function admin_add_client($id=null){  

		if(!empty($this->request->data)){
            if($id){
                $this->Client->id = $id;
                if(!$this->Client->exists()){
                     $this->Session->setFlash(__('Invalid Client id',true),'default',array('class'=>'alert alert-error'));
                     $this->redirect('clients');
                }else{
                    $this->request->data['Client']['modified'] = date('Y-m-d');
					if(!empty($this->request->data['Client']['logo']['name'])){
					$pic = $this->request->data['Client']['logo']['name'];
					if(move_uploaded_file($this->request->data['Client']['logo']['tmp_name'], WWW_ROOT.'img/clientsLogo/'.$pic)){
						$this->request->data['Client']['logo'] = $pic;
					}else{  
						$this->Session->setFlash(__('logo could not uploaded, please try again',true),'default',array('class'=>'alert alert-error'));
						$this->redirect($this->referer());
					}
					}else{
							unset($this->request->data['Client']['logo']);
					}
                    if($this->Client->save($this->request->data)){
                        $this->Session->setFlash(__('Client updated successfully',true),'default',array('class'=>'alert alert-success'));
                        $this->redirect('clients');
                    }else{  
                        $this->Session->setFlash(__('Client could not updated',true),'default',array('class'=>'alert alert-error'));
                        $this->redirect('clients');
                    }
                }
            }else{
                $this->Client->create();
                
                $this->request->data['Client']['created'] = date('Y-m-d H:i:s');
                if(!empty($this->request->data['Client']['logo']['name'])){
					$pic = $this->request->data['Client']['logo']['name'];
					if(move_uploaded_file($this->request->data['Client']['logo']['tmp_name'], WWW_ROOT.'img/clientsLogo/'.$pic)){
						$this->request->data['Client']['logo'] = $pic;
					}else{  
						$this->Session->setFlash(__('logo could not uploaded, please try again',true),'default',array('class'=>'alert alert-error'));
						$this->redirect($this->referer());
					}
				}else{
						unset($this->request->data['Client']['logo']);
				}
                if($rs = $this->Client->save($this->request->data)){
                   
                    $this->Session->setFlash(__('Client added successfully',true),'default',array('class'=>'alert alert-success'));
                    $this->redirect('clients');
                }else{
                    $this->Session->setFlash(__('Client could not added',true),'default',array('class'=>'alert alert-error'));
                    $this->redirect('clients');
                }
            }
        }

        if($id){
            $this->request->data = $this->Client->findById($id);
            $this->set('page','Edit Client');
			$this->set('title_for_layout','Edit Client');
        }else{
            $this->set('page','Add Client');
			$this->set('title_for_layout','Add Client');
        }
	}
		
	public function admin_clients(){
		
		$this->set('title_for_layout','Manage Clients');
        
        if(isset($this->request->query['limit'])){
            $this->limit=$this->request->query['limit'];
        }else{
            $this->limit = 10;
        }

        if($this->request->is(['post','put'])){
            $action = isset($this->request->data['option']) ? $this->request->data['option'] : '';
            $ids = isset($this->request->data['ids']) ? $this->request->data['ids'] : '';

            if(!empty($action)){
                if(!empty($ids)){
                    switch ($action) {
                        case 'delete':
                            $deletedIds = [];
                            foreach ($ids as $id){
                                $result = $this->Client->delete($id);
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Client';
                            if($deletedCount>1){
                                $userC = 'Client';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' deleted',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('clients');
                            
                        break;
                        case 'show':
                            $deletedIds = [];
                            foreach ($ids as $id) {
                                $this->Client->id = $id;
                                $result = $this->Client->saveField('show_at_home','1');
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Client';
                            if($deletedCount>1){
                                $userC = 'Client';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' updated',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('clients');

                        break;
                        case 'hide':
                            $deletedIds = [];
                            foreach ($ids as $id) {
                                $this->Client->id = $id;
                                $result = $this->Client->saveField('show_at_home','0');
                                if($result){
                                    $deletedIds[] = $id;
                                }
                            }
                            $deletedCount = count($deletedIds);
                            $userC = 'Client';
                            if($deletedCount>1){
                                $userC = 'Client';
                            }
                            $this->Session->setFlash(__('Selected '.$userC.' updated',true),'default',array('class'=>'alert alert-success'));
                            return $this->redirect('clients');
                        break;
                        
                    }
                }else
                {
                    $this->Session->setFlash(__('Select Client to complete process!',true),'default',array('class'=>'alert alert-danger'));
                }
            }else{
                
                $this->Session->setFlash(__('Select Action first to complete process!',true),'default',array('class'=>'alert alert-danger'));
            }
        }

        $this->paginate = array('limit'=>$this->limit);
        $clients = $this->paginate('Client');
       

        $keyword = '';
        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $keyword = $_GET['keyword'];

            $cond = array('OR'=>array(
                        'Client.name LIKE'=> '%'.$keyword.'%',
                        //'Testimonial.price LIKE'=> '%'.$keyword.'%',
                       
                        ),
                       
            );
            
            $clients = $this->Client->find('all',array('conditions'=>$cond,'order'=>'Client.id DESC'));
            
        }
        
        $this->set('clients',$clients);
        $this->set('keyword',$keyword);
	}
	

    function admin_delete_client($id=null){
		if($id){
			$this->Client->id = $id;
			if(!$this->Client->exists()){
				$this->Session->setFlash(__('Client does not exists',true),'default',array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
				exit;
			}else{
				if($this->Client->delete($id)){
					$this->Session->setFlash(__('Client deleted successfully',true),'default',array('class'=>'alert alert-success'));
					$this->redirect($this->referer());
					exit;
				}else{
					$this->Session->setFlash(__('Client could not deleted',true),'default',array('class'=>'alert alert-danger'));
					$this->redirect($this->referer());
					exit;
				}
			}
		}
		
	}         
	
}
