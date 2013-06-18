<?php

    abstract class Model{
        protected $datasource;
        
        public function __construct($datasource = 'database') {
            $this->db = $datasource;
        }
        
        public function __get($var) {
            return $this->$var;
        }
        
        public function __set($var, $value) {
            $this->$var = $value;
        }
        
        public function save() {
            // $this->datasource->save("dasushduih");
        }
        
        public function __toString() {
            return $this->datasource;
        }
    }