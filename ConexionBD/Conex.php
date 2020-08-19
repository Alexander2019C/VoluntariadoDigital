<?php
class conex
{
    public $db;
    private static $dns = "mysql:host=localhost;dbname=tschool";
    private static $user = "root";
    private static $pass = "alex";
    private static $instance;
    public function __construct()
    {
        $this->db = new PDO(self::$dns, self::$user, self::$pass);
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}

?>
