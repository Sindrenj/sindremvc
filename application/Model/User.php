<?php 
    
    class User extends Model {
        private $id;
        private $firstname;
        private $lastname;
        private $tlf;
        
        public function __construct($id, $firstname, $lastname, $tlf, $datasource) {
            parent::__construct($datasource); 
            $this->id = $id;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->tlf = $tlf;
        }
        
        public function getFirstName() {
            return $this->firstname;
        }
        
        public function getAll() {
            $sql = 'SELECT * FROM user';
            $result = $this->datasource->getAll($sql);
            return $result;
        }
        
        public function __toString() {
            return $this->id . ", " . $this->firstname . ", " . $this->lastname . ", " . $this->tlf;
        }
    }