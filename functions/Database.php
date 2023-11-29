<?php
require_once('Config.php');
require_once('./functions/Config.php');
// echo('imported Config');
class Database
{
    private $dbConnector;

    /**
     * Reads configuration from the Config class above
     */

    public function __construct()
    {
        // echo('Config::$db');
        $host = Config::$db["host"];
        $user = Config::$db["user"];
        $database = Config::$db["database"];
        $password = Config::$db["password"];
        $port = Config::$db["port"];

        // echo('before pg connect');
        $this->dbConnector = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
        // if ($this->dbConnector) {
        //     echo "Success";
        // } else {
        //     echo "error";
        // }
    }

    public function query($query, ...$params)
    {
        // Use safe querying
        $res = pg_query_params($this->dbConnector, $query, $params);

        // If there was an error, print it out
        if ($res === false) {
            echo pg_last_error($this->dbConnector);
            return false;
        }
        // Return an array of associative arrays (the rows
        // in the database)
        return pg_fetch_all($res);
    }
}
$db = new Database();
// echo('created new database');
