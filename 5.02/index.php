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
        $action = "none";
    }
    
    switch (strtolower($action))
    {
        // Show all Scriptures
        default:
            // Get all scriptures
            $scriptures = getAllScriptures();
            include('views/displayAllScriptures.php');
            break;
    }
    
 
    
?>