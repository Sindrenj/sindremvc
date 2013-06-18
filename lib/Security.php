<?php
/**
 * Description of Security
 *
 * @author Sindre
 */

class Security {    
    /* =============================================================
    * Clean
    * =============================================================
    */
    public static function cleanUrl($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    
    public static function cleanHTML($input) {
        return filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
    }
    
    public static function cleanEmail($input) {
         return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
    
    public static function cleanInt($input) {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }
    
   /* =============================================================
    * Validate:
    * =============================================================
    */
    public static function checkEmail($input) {
        return filter_var($input, FILTER_VALIDATE_EMAIL );
    }
    
    
    /*=============================================================
    * Logging:
    * =============================================================
    */
    public static function logEvent($code, $type, $event, $file, $db) {
        $sql = "INSERT INTO log(code, type, event, file) " .
            "values('" . $code . "', '" . $type . "', '" . self::$logs[$code][$type][$event] . "' ,'" . $file . "')";
        //Insert into the log:
        return $db->insert($sql);    
    }
}

?>
