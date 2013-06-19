<?php

/**
 * Description of Database
 * This class provides access to the database
 * Every database operation should be done through this class.
 * @author Sindre
 */
class Database {
   public $type;
   private $host;
   private $dbName;
   private $user;
   private $password;
   private $db;
   
   //Add the databaseinformation here or override the parameters in the constructor with your own details:
   public function __construct($type = "mysql", $host = "127.0.0.1", $dbName = "sindrenj", $user = "root", $password = "") {
       //Set the values:
       $this->type = $type;
       $this->host = $host;
       $this->dbName = $dbName;
       $this->user = $user;
       $this->password = $password;
       
       //Create the connections-string:
       $details = "$this->type:dbname=$this->dbName;host=$this->host";
       //Create the PDO-object:
       try {
        $this->db = new PDO($details, $user, $password);
        //Set errormode:
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $dbE) {
           throw $dbE;
       }
       
   }
  
   public function insert($sql, $data) 
   {
      try {
           //Prepare the statement: 
           $stmt = $this->db->prepare($sql);
           //Execute the query with the data:
            $stmt->execute($data);
      } catch(PDOException $e) {
          throw $e;
      }
   }
   
   public function select($sql, $data) 
   {
      try {
           //Prepare the statement: 
           $stmt = $this->db->prepare($sql);
           //Execute the query with the data and return:
           var_dump($stmt->execute($data));
      } catch(PDOException $e) {
          throw $e;
      }
   }
   
   public function query($sql) {
       return $this->db->query($sql);
   }
      
   public function update($sql, $data) 
   {
       return null;
   }
   
   public function delete($sql, $data)
   {
       return null;
   }
   
           
   public function __toString() {
       //Calling this function may reveal your password if you use it the wrong way.
       return "$this->type,  $this->host, $this->dbName, $this->user, $this->password";
   }
}

?>