<?php

class User
{
    public const ADMIN = 2;
    public const STANDARD = 1;
    public const GUEST = 0;

    public $name;
    public $passsword;
    public $role;

    public function __construct(
        $name,
        $password,
        $role
    ) {
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
    }

    public function greet()
    {
        echo "Hello, " . $this->name . "\n";
    }

    public function priv()
    {
        switch ($this->role) {
            case(self::ADMIN):
                echo "I am an administrator\n";
                break;
            case(self::STANDARD):
                echo "I am a measly standard user\n";
                break;
            case(self::GUEST):
                echo "I am a guest\n";
                break;
            default:
                echo "Unknown\n";
                break;
        }
    }
}
