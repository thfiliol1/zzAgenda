<?php
/**
 * Classe permettant de charger les classes lorsqu'elles sont appelées 
 */
class Chargeur{
    private static $_instance = null;

    public static function charger(){
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s est en cours d\'éxécution', __CLASS__));
        }
        self::$_instance = new self();
        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : impossible de démarrer le chargeur', __CLASS__));
        }
    }

    public static function arreter()    {
        if(null !== self::$_instance) {
            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('vous ne pouvez pas arrêter le chargeur');
            }
            self::$_instance = null;
        }
    }

    private static function _autoload($class){
        global $rep;
        $filename = $class.'.php';
        $dir =array('./','actions/','configuration/','controleurs/','modeles/','metiers/','persistance/','vues/','verification/');
        foreach ($dir as $d){
            $fichier=$rep.$d.$filename; 
            //echo $fichier."</br>";
            if (file_exists($fichier)){
                //echo $fichier."</br>";
                include $fichier;
            }
        }
    }
}

