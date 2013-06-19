<?php
/**
 * Class Controller
 * Is the main "base"-class that all
 * the custom controllers must inherit from.
 */
    abstract class Controller{
        protected $name;
        protected $model;
        protected $action;
        protected $view;
    
        public function __construct($name, $model, $action) {
            $this->name = $name;
            $this->model = $model;
            $this->action = $action;
            $this->view = new View($this->name , $action);
        }
        
        public function __get($var) {
            return $this->$var;
        }
        
        public function __set($name, $value) {
            $this->$name = $value;
        }
        
        public function set($var, $value) {
            $this->view->__set($var, $value);
        }
        
        public function getName() {
            return $this->name;
        }
        
        public function loadModel($modelName) {
            $modelPath = '../application/Model/' . $modelName;
            if( !is_file($modelPath) ) {
                throw new Exception("The model were not found");
            }
            
            //Include the file
            include $modelPath;
        }
        
        public function render() {
            $this->view->render();
        }
        
        public function __toString() {
            return $this->model;
        }
    }