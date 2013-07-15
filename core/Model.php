<?php
/**
 * Class Controller
 * Is the main "base"-class that all
 * the custom models must inherit from.
 */
    abstract class Model{
        protected $datasource;
        
        public function __construct($datasource = 'Database') {
            try{
            $this->db = new $datasource();
            } catch (Exception $e) {
                echo "En feil oppstod.<br>" . $e;
            }
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
        
        public function update() {}
        
        public function updateAll() {}
        
        public function delete() {}
        
        public function deleteAll() {}
        
        public function __toString() {
            return $this->datasource;
        }
    }