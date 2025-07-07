<?php
require 'vendor/autoload.php';
require 'db.php';
require 'routes/clients_route.php';

// Autoriser les requêtes CORS
Flight::route('OPTIONS *', function(){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    exit;
});

// Ajouter les headers CORS aux vraies réponses
Flight::before('start', function(&$params, &$output){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type');
});


Flight::start();
?>