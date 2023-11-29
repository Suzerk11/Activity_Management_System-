<?php
require_once 'config.php';
// require_once './functions/Config.php';

// $host = 'localhost';
// $host = 'db';

// $port = '5432';
// $database = 'bzd7cx';
// $user = 'bzd7cx';
// $password = '_xXq1xyWZk0W';


// $dbHandle = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");



class Database
{
  private $dbConnector;

  /**
   * Reads configuration from the Config class above
   */
  public function __construct()
  {
    $host = Config::$db["host"];
    $user = Config::$db["user"];
    $database = Config::$db["database"];
    $password = Config::$db["password"];
    $port = Config::$db["port"];

    $this->dbConnector = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
    // if ($this->dbConnector) {
    //   echo "Success";
    // } else {
    //   echo "error";
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
