<?php


namespace Oshop;

use PDO;

// Design Pattern : Singleton
class Database 
{
     /** @var PDO */
     private $dbh;
     private static $_instance;
     private function __construct() 
     {

         $configFile = __DIR__.'/../config.ini';
         if (!file_exists($configFile)){
             die("Oups 💩 ! Il faut créer un fichier config.ini à la racine du projet !");
         }
         $configData = parse_ini_file($configFile);
         
         try {
             $this->dbh = new PDO(
                 "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};port=3306;charset=utf8",
                 $configData['DB_USERNAME'],
                 $configData['DB_PASSWORD'],
                 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
             );
         }
         catch(\Exception $exception) {
             echo 'Erreur de connexion...<br>';
             echo $exception->getMessage().'<br>';
             echo '<pre>';
             echo $exception->getTraceAsString();
             echo '</pre>';
             exit;
         }
     }

    public static function getPDO() {
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->dbh;
    }
}