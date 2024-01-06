<?php

class Bwindi extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render('forms/home');
    }
	
	function birds(){
        $this->view->render('forms/birding');
    }
	
	function contact(){
        $this->view->render('forms/contactus');
    }
	
	function bwindinationalpark(){
        $this->view->render('forms/bwindinationalpark');
    }
	
	function sendmail(){
		$this->model->SendUserEmail();
	}
	
	function mgahinga(){
		$this->view->render('forms/mgahinga');
	}
    

}

