<?php
    class IndexController extends Controller{
        public function __construct($name, $model, $action) {
            parent::__construct($name, $model, $action);
        }
        
        public function index() {
            $this->set('document_title', 'Nettside - Welcome!');
            $this->set('hovedoverskrift', 'Welcome!');
            $this->set('innhold', 'Dette er innhold');
            $this->set('dust', 'Dette er innhold2');
            $this->render();
        }
        
        public function search($type, $string) {
           $this->set('document_title', 'Search');
           $this->set('type', $type);
           $this->set('string', $string);
           $this->render();
        }
    }