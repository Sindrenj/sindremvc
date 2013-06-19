<?php
    class IndexController extends Controller{
        public function __construct($name, $model, $action) {
            parent::__construct($name, $model, $action);
        }
        
        public function index($input) {
            $this->set('document_title', 'Sindrenj.net - Welcome!');
            $this->set('hovedoverskrift', 'Welcome!');
            $this->set('innhold', 'Dette er innholdet! Ikke sant?');
            $this->set('dust', 'Dette er en dust');
            $this->set('input', $input);
            $this->render();
        }
        
        public function search($type, $string) {
           $this->set('document_title', 'Search');
           $this->set('type', $type);
           $this->set('string', $string);
           $this->render();
        }
    }