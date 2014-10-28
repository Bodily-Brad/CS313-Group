<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Session support
session_start();

// Password functions
require_once('password.php');

// Connect to database
require_once('dbConnection.php');
$db = loadDB();

// Get Action
$action = getVariable("action");

switch (strtolower($action))
{
    case "createuser":
        // TO DO: CHRIS
      $success = FALSE;
      $newName = getVariable("name");
      $newPass = getVariable("pass");
      $checkPass = getVariable("check");
      if (is_null($newName) || 
          is_null($newPass) || 
          is_null($checkPass) || 
          $newPass != $checkPass) {
           echo '<script type="text/javascript"> alert("Error creating user, please check that passwords match");</script>';         
      } else {
         $query = "SELECT * FROM user WHERE user_name = '" . $newName . "'";
         $stmt = $db->prepare($query);
         $stmt->execute();
         //There can only be one.
         if($stmt->rowCount() == 0){
            $passwordHash = password_hash($newPass, PASSWORD_BCRYPT);
            $success = insertUser($newName, $passwordHash);
         } else {
            echo '<script type="text/javascript"> alert(""That username already existed, please enter a new one"");</script>';         
         }         
      }
        
        // IF SUCCESSFUL, show welcome page
        if ($success)   // For now, just assume it worked
        {
            // Set session variable
            // Show welcome page
            loginUser($newName);
            $username = $newName;
            include('views/welcomePage.php');            
        }
        else
        {
            // (re)show sign up form
            include('views/createUserForm.php');
        }
        break;
    case "login":
        // Get username/password from form
        $username = getVariable("name");
        $password = getVariable("pass");
        
        // Get password hash, using BCRYPT
        //$passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if credentials are valid
        if (getCredentialsAreValid($username, $password))
        {
            // TO DO: Set username session variable
            // Show welcome page
            loginUser($username);
            include('views/welcomePage.php');
        }
        // Otherwise, show login form
        else
        {
            $message = "Invalid username or password";
            include('views/loginForm.php');            
        }
        break;
    case "logout":
        logoutUser();
        include('views/loginForm.php');
        break;
    case "signup":
        include('views/createUserForm.php');
        break;
    default:
        // Check if user is already logged in
        if (getUserIsLoggedIn())
        {
            $username = getCurrentUser();
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
        global $db;

        // Query String
        $query = "
            SELECT *
            FROM     user
            WHERE    user_name = :username";
                
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);            
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            // If user doesn't exist, return false
            if (empty($result))
            {
                echo "didn't find anything<br>";
                return false;
            }
            
            return (password_verify($password, $result['password']));
            
            //return ($result['password'] == $passwordHash);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }        
    }

function getCurrentUser()
{
    return $_SESSION["currentUser"];
}
    
function loginUser($username)
{
    $_SESSION["currentUser"] = $username;
}

function logoutUser()
{
    unset($_SESSION["currentUser"]);
}
   
function getUserIsLoggedIn()
{
    // Check session variable
    if (isset($_SESSION["currentUser"])) return true;
    
    // else
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

    global $db;    
//$db = loadDB();


   $query = $db->prepare('INSERT INTO users_db.user (user_name, password) VALUES ("'. 
           $username . '" , "' . $hash .'")');

    return $query->execute();
}

?>
