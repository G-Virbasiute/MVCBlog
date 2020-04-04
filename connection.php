<?php

class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $config = parse_ini_file('../private/config.ini'); 
        self::$instance = new PDO("mysql:host=" . $config['servername'] . ";dbname=" . $config['dbname'], $config['username'], $config['password'], $pdo_options);
      }
      return self::$instance;
    }
}
