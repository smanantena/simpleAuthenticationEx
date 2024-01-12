<?php
namespace App\Database\Models;

class UsersModel
{
    private string $username;
    private int $user_id;
    private string $password;
    private int|string $role;

    public function __construct()
    {
        if (intval($this->role)) {
            switch ($this->role) {
                case 1 :
                    $this->role = 'admin';
                    break;
                case 2 :
                    $this->role = 'users';
                    break;
                default:
                    $this->role = 'unknown';
                    break;
            }
        }
    }
    
    public function get_user_id () : int
    {
        return $this->user_id;
    }

    public function get_username () : string
    {
        return $this->username;
    }

    public function get_password () : string
    {
        return $this->password;
    }

    public function get_role () : string
    {
        return $this->role;
    }

    public function check_password (string $toCheck) : bool
    {
        return password_verify($toCheck, $this->password);
    }
}