<?php

class Index extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render('forms/home');
    }
	
	function sendmail(){
		$this->model->SendUserEmail();
	}
    

}

