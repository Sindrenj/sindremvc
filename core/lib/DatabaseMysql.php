<?php
/**
 * Description of DatabaseMysql
 *
 * @author Sindre
 */
class DatabaseMysql {
    private $db;
    public function DatabaseMysql($host = '', $dbName = '', $user = '', $password = '') {
        if(!$this->db = mysql_connect($host, $user, $password)) 
                throw new Exception("Error: Wrong connectiondetails." . mysql_error());
        if(!mysql_select_db($dbName))
                throw new Exception("Error: Couldn't not select db. ");
    }
    
    public function select($sql) {
        //Select from db:
        $res = mysql_query($sql);
        //Check for errors:
        if(!$res) throw new Exception("Couldn't select from db:" . mysql_error());
        //return result:
        return $res;
    }
    
    public function query($sql) {
        //Execute query:
        return mysql_query($this->clean($sql));
    }
    
    
    public function insert($sql) {
        //Insert:
        $res = mysql_query($this->clean($sql));
        //return true/false:
        return $res;
    }
    
    public function clean($data){
        $cleaned = null;
        //Check if array:
        if( is_array($data) ) { //$data is an array
            $cleaned = array();
            //Clean all the data:
            foreach($data as $pos => $val) {
                $cleaned[$pos] = mysql_real_escape_string($val);
            }
        } else { // $data is not an array
          $cleaned = mysql_real_escape_string($data);
        }
        
        //Cleaned data:
        return $cleaned;
    }
    
    public function nRows($res) {
        return mysql_num_rows($res);
    }
    
//    function __destruct(){
//       mysql_close($this->db);
//    }
}

?>
