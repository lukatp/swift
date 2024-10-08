<?php

require "lib/RedBean.php";


class DbConnection {
    private static $isConnected = false;

    public static function connect()
    {
        $dbConfig = require __DIR__ . './../conf/db.php';
        R::setup("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
            $dbConfig['username'],
            $dbConfig['password']);

        // Enable developer mode (disable in production)
        //R::fancyDebug(true);

        self::$isConnected = true;

        // Register shutdown function to close connection
        register_shutdown_function([__CLASS__, 'close']);
    }

    public static function close(){
        if(self::$isConnected){
            R::close();
            self::$isConnected = false;

        }
    }

    public static function autoload()
    {
        // 启用 FUSE
        R::ext('xdispense', function($type) {

            $modelName = ucfirst($type);
            $modelFile = 'model/' . $modelName . '.php';
            if (file_exists($modelFile)) {
                require $modelFile;
            }
            return R::getRedBean()->dispense($type);
        });
    }
}