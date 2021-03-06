<?php
    class View{
        protected $data = array();
        protected $controller = null;
        protected $action = null;
        
        public function __construct($controller, $action) {
            $this->controller = $controller;
            $this->action = $action;
        }
        
        public function __get($name) {
            return $this->data[$name];
        }
        
        public function __set($name, $value) {
            $this->data[$name] = $value;
        }
        
        public function render($type) {
            call_user_func('render' . $type);
        }
        
        private function renderNormal() {
            $viewPath = 'application/View/' . $this->controller  . '/' . $this->action . '.php';
            //Check if the views are created:
            if(is_file($viewPath)) {
               //Estract the data:
               extract($this->data);
               //Include html-document top:
               include 'application/Template/htmlTop.php';
               include 'application/Template/menu.php';
               include $viewPath;
               //Include html-document bottom:
               include 'application/Template/htmlBottom.php';
            } else {
                echo "The requested view does not exist";
            }
        }
        
        public function renderJSON() {
            include 'application/Template/json.php';
            extract($this->data);
            if (!$option) {
                echo json_encode($value);
            } else {
                echo json_encode($value, $option);
            }
        }
    }