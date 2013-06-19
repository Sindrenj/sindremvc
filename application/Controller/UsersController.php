<?php
    
    class UsersController extends Controller {
        public function __construct($name, $model, $action) {
            parent::__construct($name, $model, $action);
        }
        
        public function index () {
            $this->set('hello', 'Velkommen!');
            $this->set('content', 'Velkommen til min strålende applikasjon!');
            $this->render();
        }
        
        public function create () {
           $this->render();
        }
        
        public function delete () {
           $this->render();
        }
        
        public function get () {
             return "Du har kommet til get";
        }
        
        public function toString() {
            return get_class($this);
        }
    }