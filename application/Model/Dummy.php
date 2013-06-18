<?php
    
    class Dummy extends Model{
        public function __construct() {
            parent::__construct();
        }
        
        public function welcome() {
            return 'Velkommen';
        }
        
        public function innhold() {
            return 'Velkommen til sindrenj.net';
        }
        
        public function __toString() {
            return 'Dummy';
        }
    }