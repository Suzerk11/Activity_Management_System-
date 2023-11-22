<?php

require_once('./database.php');
class UserController
{
    private $user;

    private $input = [];

    private $db;
    private $errorMessage = "";
    /**
     * Constructor
     */
    public function __construct($input)
    {
        session_start();
        $this->db = new Database();

        $this->input = $input;
    }

    /**
     * Run the server
     * 
     * Given the input (usually $_GET), then it will determine
     * which command to execute based on the given "command"
     * parameter.  Default is the welcome page.
     */
    public function run()
    {
        $command = " ";
        // $command = $this->input["command"];

        // echo $command;

        if (isset($this->input["command"]))
            $command = $this->input["command"];

        // echo $command;

        switch ($command) {
            case "login_page":
                $this->login_page();
                break;

            case "register_page":
                $this->register_page();
                break;

            case "login":
                $this->login();
                break;
            case "register":
                $this->register();
                break;

            case "homepage":
                $this->homepage();
                break;

            case "logout":
                $this->logout();
            default:
                // echo $command;
                $this->showWelcome();
                // break;  
        }
    }

    /**
     * Show the welcome page to the user.
     */
    public function showWelcome()
    {
        $message = "";
        if (!empty($this->errorMessage))
            $message .= "<p class='alert alert-danger'>" . $this->errorMessage . "</p>";
        // web\www\UvaAct_sp3\templates\welcome.php    
        include("./templates/welcome.php");
    }

    public function login_page($message = "")
    {
        $message = "";
        if (!empty($this->errorMessage))
            $message .= "<p class='alert alert-danger'>" . $this->errorMessage . "</p>";

        include("./templates/login.php");
    }

    public function register_page($message = "")
    {
        $message = "";
        // (int)empty($res) == 0
        if (!empty($this->errorMessage))
            $message .= "<p class='alert alert-danger'>" . $this->errorMessage . "</p>";


        include("./templates/register.php");
    }

    public function homepage()
    {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_name"];
        include("./homepage.php");
    }

    public function login()
    {
        // echo "login() ok!";

        $message = "";
        if (!empty($this->errorMessage))
            $message .= "<p class='alert alert-danger'>" . $this->errorMessage . "</p>";

        // echo $_POST["user_id"];

        // need a id and password
        if (
            isset($_POST["user_id"]) && !empty($_POST["user_id"]) &&
            isset($_POST["passwd"]) && !empty($_POST["passwd"])
        ) {

            // Check if user is in database
            $res = $this->db->query("select * from users where user_id = $1;", $_POST["user_id"]);
            // echo "select ok!";
            if (empty($res)) {

                // header("Location: ?command=login");
                // return;
                $this->errorMessage = "Please register first";
            } else {
                // User was in the database, verify password
                // password_verify($_POST["passwd "], $res[0]["passwd"])
                if ($_POST["passwd"] == $res[0]["passwd"]) {
                    // Password was correct
                    $_SESSION["user_id"] = $res[0]["user_id"];
                    // $_SESSION["user_email"] = $res[0]["user_email"];
                    $_SESSION["user_name"] = $res[0]["user_name"];
                    // $_SESSION["invite_code"] = $res[0]["invite_code"];
                    // $_SESSION["activity_list"] = $res[0]["activity_list"];
                    // $_SESSION["enroll_list"] = $res[0]["enroll_list"];
                    // $_SESSION["favo_list"] = $res[0]["favo_list"];

                    // header("Location: ?command=homepage");
                    $this->homepage();
                    return;
                } else {
                    $this->errorMessage = "Incorrect password.";
                }
            }
        } else {
            $this->errorMessage = "ID and password are required.";
        }
        // If something went wrong, show the welcome page again
        $this->login_page($message);
    }


    public function register()
    {
        $message = "";
        if (!empty($this->errorMessage))
            $message .= "<p class='alert alert-danger'>" . $this->errorMessage . "</p>";

        if (
            isset($_POST["user_name"]) && !empty($_POST["user_name"]) &&
            isset($_POST["user_id"]) && !empty($_POST["user_id"]) &&
            isset($_POST["passwd"]) && !empty($_POST["passwd"])
        ) {

            // regex pression
            if (!preg_match("/^[0-9]+$/", $_POST["user_id"])) {
                $this->errorMessage = "Invalid user_id format. please enter numeric string.";
                $this->register_page($message);
                return;
            }
            // echo $_POST["user_id"];

            // Check if user is in the database
            $res = $this->db->query("select * from users where user_id = $1;", $_POST["user_id"]);

            // echo (int)empty($res); //0

            if (empty($res)) {
                // echo "here before insert";
                // User was not there, so insert them
                $this->db->query(
                    "insert into users (user_name, user_id, passwd) values ($1, $2, $3);",
                    $_POST["user_name"],
                    $_POST["user_id"],
                    $_POST["passwd"]
                );

                $_SESSION["user_name"] = $_POST["user_name"];
                $_SESSION["user_id"] = $_POST["user_id"];

                // Redirect to the login page
                $this->login_page();
                // header("Location: ?command=login");
                return;
            } else {
                $message = "User with the same ComputingID already exists.";
            }
        } else {
            $message = "Username, ComputingID, and password are required.";
        }

        // If something went wrong, show the registration page again
        $this->register_page($message);
    }


    /**
     * Log out the user
     */
    public function logout()
    {
        // Udate the user's score before they log out, just in case
        // $this->db->query("update users set score = $1 where email = $2;", $_SESSION["score"], $_SESSION["email"]);
        session_destroy();
        session_start();
    }
}
