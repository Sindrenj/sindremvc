<?php
    class IndexController extends Controller{
        public function __construct($name, $model, $action) {
            parent::__construct($name, $model, $action);
        }
        
        public function index() {
            $this->set('document_title', 'Sindrenj.net - Welcome!');
            $this->set('hovedoverskrift', 'Welcome!');
            $this->set('innhold', 'Dette er innholdet! Ikke sant?');
            $this->set('dust', 'Dette er en dust');
            $this->render();
        }
    }