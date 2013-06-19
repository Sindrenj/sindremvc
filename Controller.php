<?php
   
    class Controller{
        protected $name;
        protected $model;
        protected $action;
        protected $view;
    
        public function __construct($name, $model, $action) {
            $this->model = $model;
            $this->action = $action;
            $this->name = $name;
            $this->view = new View($name , $action);
        }
        
        public function __get($var) {
            return $this->$var;
        }
        
        public function set($var, $value) {
            $this->view->__set($var, $value);
        }
        
        public function getName() {
            return get_class($this);
        }
        
        public function render() {
            $this->view->render();
        }
        
        public function __toString() {
            return $this->model;
        }
    }