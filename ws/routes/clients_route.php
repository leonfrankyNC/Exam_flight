<?php
require_once __DIR__ . "/../controllers/ClientControllers.php";

Flight::route("GET /clients",["ClientControllers","getAll"]);
Flight::route("POST /client",["ClientControllers","create"]);