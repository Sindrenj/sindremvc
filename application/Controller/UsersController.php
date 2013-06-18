<?php
    
    class UsersController extends Controller {
        public function __construct($model, $action) {
            parent::__construct($model, $action);
        }
        
        public function index () {
            $this->set('hello', 'Velkommen!');
            $this->set('content', 'Velkommen til min strålende applikasjon!');
        }
        
        public function create () {
             return "Du har kommet til create";
        }
        
        public function delete () {
             return "Du har kommet til delete";
        }
        
        public function get () {
             return "Du har kommet til get";
        }
    }