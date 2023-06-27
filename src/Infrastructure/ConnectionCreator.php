<?php

namespace Estudo\Projeto\Infrastructure;
use PDO;
class ConnectionCreator
{
    public static function Connection(): PDO
    {
        return $pdo= new PDO("mysql:host=localhost;dbname=bandocar", 'root', 'resplendor2014');

    }

}