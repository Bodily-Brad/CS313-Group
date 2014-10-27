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
        // TO DO: Add code to create new user
        
        // IF SUCCESSFUL, show welcome page
        if (true)   // For now, just assume it worked
        {
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
        // Check if credentials are valid
        if (getCredentialsAreValid($username, $passwordHash))
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
function getCredentialsAreValid($username, $passwordHash)
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


?>