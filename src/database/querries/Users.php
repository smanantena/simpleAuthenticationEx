<?php
namespace App\Database\Querries;

use PDO;
use App\Database\Models\UsersModel;
use App\Database\Basic\DatabaseManager;
use Exception;

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

class Users
{
    private static function pdo () : ?object
    {
        return DatabaseManager::connect();
    }
    
    public static function getAllUsers () : array
    {
        $pdo = self::pdo();
        $query = $pdo->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_CLASS, 'App\Database\Models\UsersModel');
    }

    public static function getUsersByUsername (string $usernameToSearch) : mixed
    {
        try {
            $pdo = self::pdo();
            $query = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $query->execute(["username" => htmlentities($usernameToSearch)]);
            return $query->fetchAll(PDO::FETCH_CLASS, 'App\Database\Models\UsersModel') ?? null;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function createUser (string $username, string $password, string $role) : bool
    {
        try {
            $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
            $pdo = self::pdo();
            $pdo->query("INSERT INTO users(username, password, role) VALUES('{$username}', '{$passwordEncrypted}', '{$role}')");
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

