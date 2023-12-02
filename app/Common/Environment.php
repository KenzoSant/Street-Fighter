<?php

namespace App\Common;

class Environment{
    
/**
 * @param  string $dir  Caminho absoluto
 */

    public static function load(){
        $dir = 'C:\xampp\htdocs\GamePHP';
        if(!file_exists($dir.'/.env')){
            return false;
        }
    


        $lines = file($dir.'/.env');
        foreach($lines as $line){
            putenv(trim($line));
        }
       }



}
?>