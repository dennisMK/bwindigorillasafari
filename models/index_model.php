<?php

class Index_model extends Model{

    function __construct() {
        $this->db = new Database();
		$this->mailer = new MailClient();
    }
    
	function SendUserEmail(){
		$data = $_POST;
		$message = $data['name'];
		$Email = $data['email'];
		$subject = $data['name'];
		$this->mailer->SendEmail($message,$Email,$subject);
		header('Location: ' . URL);
	}
}