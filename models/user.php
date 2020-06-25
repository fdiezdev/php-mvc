<?php 

# Required packages:
require_once "bridge.php";

class UserModel {

    static public function read($item, $value) {
    
    
        $response = Connection::connect()->prepare("SELECT * FROM users WHERE $item = :$item");
        $response->bindParam(":".$item, $value, PDO::PARAM_STR);
        
        if($response->execute()) {
            return $response->fetch();
        } else {
            # On product mode do not return anything!!
            return $response;
        }
    
    }


}