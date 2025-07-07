<?php
require_once __DIR__ . '/../models/Client.php';

class ClientControllers
{
    public static function getAll(){
        Flight::json(Client::getAll());
    }
    public static function create(){
        $data=Flight::request()->data;
        $id=Client::create($data);
        Flight::json(["message"=>"Client Ajouter","id"=>$id]);
    }
}
