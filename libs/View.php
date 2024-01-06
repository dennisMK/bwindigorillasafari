<?php

class View {

    function __construct() {
        Session::init();
        $this->db = new Database();
    }

    public function render($name, $noInclude = false) {       
        require 'views/header.php';
        require 'views/' . $name . '.php';
        require 'views/footer.php';
    }
    
    public function renderLess($name, $noInclude = true) {
            require 'views/' . $name .'.php';
    }
    
}
