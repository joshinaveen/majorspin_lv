<?php 

/*MajorSpins
  Controller: Cms
* Description: used for contents 
* Created By: Naveen Joshi on 29/06/2017*/


App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
class CmsController extends AppController {

	public $components = array('Auth');
	public $helpers=array('Form','Session');
	public $layout='admin';
    public $uses=array('User','Cms','SubPage');
	

	public function beforeFilter()
	{
	
		parent::beforeFilter();
		$this->Auth->allow(array('ajax_addcms','ajax_getForm','ajax_addservice'));
	}
	
	function admin_add_cms(){
        $this->set('title_for_layout','Add CMS');
    	$this->loadModel('Cms');
    	if(!empty($this->request->data)){
    		$this->Cms->create();
    		$this->request->data['Cms']['created'] = date('Y-m-d H:i:s');
    		if($this->Cms->save($this->request->data['Cms'])){
    			$this->Session->setFlash(__('Cms added successfully',true),'default',array('class'=>'alert alert-success'));
    			$this->redirect('admin_index');
    		}else{
    			$this->Session->setFlash(__('Cms could not be added',true),'default',array('class'=>'alert alert-danger'));
    			$this->redirect('admin_index');
    		}
    	}
    	$this->set('page', 'Add Cms');
    }

    public function admin_edit_cms($id = null) {
            $this->set('title_for_layout','Edit CMS');
            $this->loadModel('Cms');
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Cms->id = $id;
                $this->Cms->save($this->data);
                $this->Session->setFlash(__('Cms page updated',true),'default',array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'admin_index'));
            }
            $options = array('conditions' => array('Cms.' . $this->Cms->primaryKey => $id));
            $this->request->data = $this->Cms->find('first', $options);

            $this->set('page', 'Edit Cms');
            $this->render('admin_add_cms');
    }

	function admin_index(){
        $this->set('title_for_layout','Manage CMS');
    	
        if(isset($this->request->query['limit'])){
            $this->limit=$this->request->query['limit'];
        }else{
            $this->limit = 10;
        }
        $this->paginate = array(
                            'limit' => $this->limit
                            );
    	$contents = $this->paginate('Cms');
    	
        if($this->request->is(['post','put'])){
    		$action = isset($this->request->data['option']) ? $this->request->data['option'] : '';
    		$ids = isset($this->request->data['ids']) ? $this->request->data['ids'] : '';

    		if(!empty($action)){
    			if(!empty($ids)){
    				switch ($action) {
    					case 'delete':
    						$deletedIds = [];
    						foreach ($ids as $id){
    							$result = $this->Cms->delete($id);
    							if($result){
    								$deletedIds[] = $id;
    							}
    						}
    						$deletedCount = count($deletedIds);
    						$userC = 'Content';
    						if($deletedCount>1){
    							$userC = 'Contents';
    						}
    						$this->Session->setFlash(__('Selected '.$userC.' deleted',true),'default',array('class'=>'alert alert-success'));
    						return $this->redirect('index');
    						
    					break;
    					case 'active':
    						$deletedIds = [];
    						foreach ($ids as $id) {
    							$this->Cms->id = $id;
    							$result = $this->Cms->saveField('status','Active');
    							if($result){
    								$deletedIds[] = $id;
    							}
    						}
    						$deletedCount = count($deletedIds);
    						$userC = 'Content';
    						if($deletedCount>1){
    							$userC = 'Contents';
    						}
    						$this->Session->setFlash(__('Selected '.$userC.' Activated',true),'default',array('class'=>'alert alert-success'));
    						return $this->redirect('index');

    					break;
    					case 'deactive':
    						$deletedIds = [];
    						foreach ($ids as $id) {
    							$this->Cms->id = $id;
    							$result = $this->Cms->saveField('status','Inactive');
    							if($result){
    								$deletedIds[] = $id;
    							}
    						}
                            $deletedCount = count($deletedIds);
    						$userC = 'Content';
    						if($deletedCount>1){
    							$userC = 'Contents';
    						}
    						$this->Session->setFlash(__('Selected '.$userC.' Deactivated',true),'default',array('class'=>'alert alert-success'));
    						return $this->redirect('index');
    					break;
    					
    				}
    			}else
				{
					$this->Session->setFlash(__('Select Content to complete process!',true),'default',array('class'=>'alert alert-danger'));
				}
    		}else{
    			
				$this->Session->setFlash(__('Select Action first to complete process!',true),'default',array('class'=>'alert alert-danger'));
    		}
    	}

    	$keyword = '';
    	if(isset($_GET['keyword']) && $_GET['keyword']!=''){
    		$keyword = $_GET['keyword'];

    		$cond = array('OR'=>array(
    					'Cms.page_name LIKE'=> '%'.$keyword.'%',
    					'Cms.url_key LIKE' => '%'.$keyword.'%'
    			));

    		$contents = $this->Cms->find('all',array('conditions'=>$cond,'order'=>'Cms.id DESC'));
    	}
    	$this->set(compact(['keyword', 'contents']));
    } 


 	function admin_add_subpage($id=null){
        $this->set('title_for_layout','Add Page Section');
    	
    	if(!empty($this->request->data)){
    		$this->SubPage->create();
			if(!empty($this->request->data['SubPage']['image']['name'])){
				$pic = $this->request->data['SubPage']['image']['name'];
				if(move_uploaded_file($this->request->data['SubPage']['image']['tmp_name'],WWW_ROOT.'img/services/'.$pic)){
					$this->request->data['SubPage']['image'] = $pic;
				}else{
					$this->Session->setFlash(__('Image could not uploaded',true),'default',array('class'=>'alert alert-danger'));
					$this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$id));
				}
			}else{
				unset($this->request->data['SubPage']['image']);
			}
    		$this->request->data['SubPage']['created'] = date('Y-m-d H:i:s');
			$this->request->data['SubPage']['cms_id'] = $id;
    		if($this->SubPage->save($this->request->data['SubPage'])){
    			$this->Session->setFlash(__('SubPage added successfully',true),'default',array('class'=>'alert alert-success'));
    			$this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$id));//$this->redirect('page_section',$id);
    		}else{
    			$this->Session->setFlash(__('SubPage could not be added',true),'default',array('class'=>'alert alert-danger'));
    			$this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$id));//$this->redirect('page_section',$id);
    		}
    	}
    	$this->set('page', 'Add SubPage');
    }

    public function admin_edit_subpage($id = null,$cms_id=null) {
            $this->set('title_for_layout','Edit Page Section');
            
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->SubPage->id = $id;
				$cms_id = $this->request->data['SubPage']['cms_id'];
				if(!empty($this->request->data['SubPage']['image']['name'])){
					$pic = $this->request->data['SubPage']['image']['name'];
					if(move_uploaded_file($this->request->data['SubPage']['image']['tmp_name'],WWW_ROOT.'img/services/'.$pic)){
						$this->request->data['SubPage']['image'] = $pic;
					}else{
						$this->Session->setFlash(__('Image could not uploaded',true),'default',array('class'=>'alert alert-danger'));
						$this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$cms_id));
					}
				}else{
					unset($this->request->data['SubPage']['image']);
				}
				$this->request->data['SubPage']['modified'] = date('Y-m-d H:i:s');
					if($this->SubPage->save($this->request->data['SubPage'])){
					$this->Session->setFlash(__('SubPage updated successfully',true),'default',array('class'=>'alert alert-success'));
					$this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$cms_id));
				}else{
					$this->Session->setFlash(__('SubPage could not be updated',true),'default',array('class'=>'alert alert-danger'));
					$this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$cms_id));
				}
            }
            $options = array('conditions' => array('SubPage.' . $this->SubPage->primaryKey => $id));
            $this->request->data = $this->SubPage->find('first', $options);

            $this->set('page', 'Edit SubPage');
            $this->render('admin_add_subpage');
    }

	function admin_page_section($id=null){
        $this->set('title_for_layout','Manage SubPage');
    	if($id){
			$this->Cms->id = $id;
			if(!$this->Cms->exists()){
				$this->Session->setFlash(__('Cms does not exists',true),'default',array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
				exit;
			}
		}
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
    							$result = $this->SubPage->delete($id);
    							if($result){
    								$deletedIds[] = $id;
    							}
    						}
    						$deletedCount = count($deletedIds);
    						$userC = 'SubPage';
    						if($deletedCount>1){
    							$userC = 'SubPages';
    						}
    						$this->Session->setFlash(__('Selected '.$userC.' deleted',true),'default',array('class'=>'alert alert-success'));
    						return $this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$id));
    						
    					break;
    					case 'show':
    						$deletedIds = [];
    						foreach ($ids as $id) {
    							$this->SubPage->id = $id;
    							$result = $this->SubPage->saveField('show_at_home',1);
    							if($result){
    								$deletedIds[] = $id;
    							}
    						}
    						$deletedCount = count($deletedIds);
    						$userC = 'SubPage';
    						if($deletedCount>1){
    							$userC = 'SubPages';
    						}
    						$this->Session->setFlash(__('Selected '.$userC.' Activated',true),'default',array('class'=>'alert alert-success'));
    						return $this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$id));

    					break;
    					case 'hide':
    						$deletedIds = [];
    						foreach ($ids as $id) {
    							$this->SubPage->id = $id;
    							$result = $this->SubPage->saveField('show_at_home',0);
    							if($result){
    								$deletedIds[] = $id;
    							}
    						}
                            $deletedCount = count($deletedIds);
    						$userC = 'SubPage';
    						if($deletedCount>1){
    							$userC = 'SubPages';
    						}
    						$this->Session->setFlash(__('Selected '.$userC.' Deactivated',true),'default',array('class'=>'alert alert-success'));
    						return $this->redirect(array('controller'=>'cms','action'=>'page_section','admin'=>true,$id));
    					break;
    					
    				}
    			}else
				{
					$this->Session->setFlash(__('Select SubPage to complete process!',true),'default',array('class'=>'alert alert-danger'));
				}
    		}else{
    			
				$this->Session->setFlash(__('Select Action first to complete process!',true),'default',array('class'=>'alert alert-danger'));
    		}
    	}
		$this->SubPage->bindModel(array('belongsTo'=>array('Cms'=>array('class'=>'Cms','foreignKey'=>'cms_id'))));
    	$this->paginate = array('conditions'=>array('SubPage.cms_id'=>$id),
                            'limit' => $this->limit
                            );
    	$subpages = $this->paginate('SubPage');
		if($subpages){
			$this->set('subpages',$subpages);
		}
    }  
	
	function admin_delete_section($id=null){
		if($id){
			$this->SubPage->id = $id;
			if(!$this->SubPage->exists()){
				$this->Session->setFlash(__('Subpage does not exists',true),'default',array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
				exit;
			}else{
				if($this->SubPage->delete($id)){
					$this->Session->setFlash(__('Subpage deleted successfully',true),'default',array('class'=>'alert alert-success'));
					$this->redirect($this->referer());
					exit;
				}else{
					$this->Session->setFlash(__('Subpage could not deleted',true),'default',array('class'=>'alert alert-danger'));
					$this->redirect($this->referer());
					exit;
				}
			}
		}
		
	}
	
	

   
}
