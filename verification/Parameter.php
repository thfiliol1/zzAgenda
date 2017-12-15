<?php

/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * Class which gets parameter from HTTP protocol
 */
class Parameter {
    public static function getParam($p_nomParam){
            if(!isset($_REQUEST[$p_nomParam])){
                   $param=NULL;
            }
            else{
                $param = $_REQUEST[$p_nomParam];
            }
            return $param;
    }
}
