<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };
    // database
// $container['db'] = function ($c){
//     $settings = $c->get('settings')['db'];
//     $server = $settings['driver'].":host=".$settings['host'].";dbname=".$settings['dbname'];
//     //  $conn = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
//     //     $db['user'], $db['pass']);
//     $conn = new PDO($server, $settings["user"], $settings["pass"]);  
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     return $conn;
// };

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    // $conn = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
    //     $db['user'], 
    //     $db['pass']);
        $conn = new PDO("mysql:host=127.0.0.1;dbname=test",
        'doni','doni123');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $conn;
};


};
