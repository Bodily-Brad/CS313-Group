<!--
5.02 Control
-->
<?php
    // Connect to database
    require_once('dbConnection.php');
    require_once('models/scriptures.php');
    
    $db = loadDB();
    
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "showaddscriptureform";
    }
    
    switch (strtolower($action))
    {
        case "addscripture":
            $scriptures = getAllScriptures();
            $message = "Insertion code coming...";
            include('views/displayAllScriptures.php');
            break;
        case "showaddscriptureform":
            $scriptures = getAllScriptures();
            $topics = getAllTopics();            
            include('views/addScriptureForm.php');
            break;
        // Show all Scriptures
        default:
            // Get all scriptures
            $scriptures = getAllScriptures();
            $message = "Showing All Scriptures";
            include('views/displayAllScriptures.php');
            break;
    }
    
 
    
?>