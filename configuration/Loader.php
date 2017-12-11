<?php
/**
 * Classe permettant de charger les classes lorsqu'elles sont appelées 
 */
class Loader{
    private static $_instance = null;

    public static function load(){
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is running', __CLASS__));
        }
        self::$_instance = new self();
        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : it is not possible to run the loader', __CLASS__));
        }
    }

    public static function stop()    {
        if(null !== self::$_instance) {
            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('you can\'t stop the loader');
            }
            self::$_instance = null;
        }
    }

    private static function _autoload($class){
        global $rep;
        $filename = $class.'.php';
        $dir =array('./','actions/','configuration/','controllers/','models/','business/','persistence/','views/','verification/');
        foreach ($dir as $d){
            $file=$rep.$d.$filename; 
            if (file_exists($file)){
                include $file;
            }
        }
    }
}

