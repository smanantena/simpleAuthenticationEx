<?php
namespace App\Database\Basic;

use PDO;
use Exception;

class DatabaseManager
{
    public static function connect ()
    {
        try {
            return new PDO('sqlite:'. dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data.db');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
