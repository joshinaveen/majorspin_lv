<?php

class CoreComponent extends Component  {
       //public $uses=array('Auth');
	function __construct($collection, $settings){
		$this->Controller = $collection->getController();
	}

	function generatePassword ($length = 6){ 
        // inicializa variables 
        $password = ""; 
        $i = 0; 
        $possible = "0123456789abcdefgh[]*()=";  
         
        // agrega random 
        while ($i < $length){ 
            $char = substr($possible, mt_rand(0, strlen($possible)-1), 1); 
             
            if (!strstr($password, $char)) {  
                $password .= $char; 
                $i++; 
            } 
        } 
        return $password; 
    } 


	//function userdata(){
           //return $this->Auth->user('user_id');
	//}
	
    
   
	
}
