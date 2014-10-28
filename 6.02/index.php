<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Session support
session_start();

// Connect to database
require_once('dbConnection.php');

// Get Action
$action = getVariable("action");

switch (strtolower($action))
{
    case "createuser":
        // TO DO: CHRIS
        // TO DO: Add code to create new user
        // Get hash for the password
        // Insert the username/hash
        $success = insertUser("","");
        
        // IF SUCCESSFUL, show welcome page
        if ($success)   // For now, just assume it worked
        {
            // Set session variable
            // Show welcome page
            include('views/welcomePage.php');            
        }
        else
        {
            // (re)show sign up form
            include('views/createUserForm.php');
        }
        break;
    case "login":
        // TO DO: Brad
        // Check if credentials are valid
        if (getCredentialsAreValid($username, $passwordHash))
        {
            // Set username session variable
            // Show welcome page
            include('views/welcomePage.php');
        }
        // Otherwise, show login form
        else
        {
            include('views/loginForm.php');            
        }
        break;
    case "signup":
        include('views/createUserForm.php');
        break;
    default:
        // Check if user is already logged in
        if (getUserIsLoggedIn())
        {
            // Show welcome page
            include('views/welcomePage.php');
        }
        // Otherwise, show login form
        else
        {
            include('views/loginForm.php');
        }
        break;
}
    

// TO DO: Create a function that returns true if the specified username and
// password hash are valid; otherwise, false;
function getCredentialsAreValid($username, $password)
{
    // For now, just return true
    return true;
}

// TO DO: Create a function that returns true if a valid user is logged in;
// otherwise, false.
function getUserIsLoggedIn()
{
    // For now, just return false
    return false;
}

// Gets a passed variable
function getVariable($variableName)
{
    if (isset($_GET[$variableName])) {
        $return = $_GET[$variableName];
    } elseif (isset($_POST[$variableName])) {
        $return = $_POST[$variableName];
    } else {
        return NULL;
    }  

    return $return;
}

function insertUser($username, $hash)

{

    $db = loadDB();

    $query = $db->prepare('INSERT INTO users_db.user (user_name, password) VALUES (:username, :hash)');
 
    $array = array(
	 'username' => $username,
	 'hash' => $hash
    );
 
    return $query->execute($array);

}

?>